<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    //


    function getUsers()
    {



$data=user::all();
// $data=DB::select("Select * from Users");

// $msg=message("Successfully Work Custom Function");
// return message($msg);
//  dd('getUsers');

return view('backend.user.all_user',['users'=>$data]);
    }


function resgisterform()
{
return view('Backend.user.register');
}


function CreateUser(Request $req)
{
    // dd('CreateUser');

        $req->validate([
            "name"=>'required',
            "email"=>'required',
            "phone"=>'required',
            "password"=>'required|confirmed|min:8',
            'image'=> 'nullable'
            
                   ]);
       $data=$req->input();

//store image in variable
$img=$req->file('image');
$store="";
$path=get_photo_path();
if(isset($img))
{

    $store="user-file_" . time() . "." . $img->extension();
    
    if (!$img->move($path,$store)) {
        return 'Error saving the file.';
    }
}
else{
    $store="0";
}

$user=new User();

$user->name=$data['name'];
$user->email=$data['email'];
$user->password=Hash::make($data['password']);
$user->phone=$data['phone'];
$user->photo=$store;
$user->save();

    return redirect()->back()->with(['msg'=>'Data Save Successfully','type'=>'success']);
}

// getuser list from database for update
    function updateuser()
{
$data =User::all();

return view("backend.user.updateuser",['users'=>$data]);
}

// get user by id for update user
function showdatabyid($id)
{
 $data=User::find($id);
return view('Backend.user.showdata',['user'=>$data]);
}


    //edit user
 function edituser(Request $req)
{
$req->validate([
    "name"=>'required',
    "email"=>'required',
    "phone"=>'required',
    'oldimg'=>'nullable',
    'image'=> 'nullable'

]);

$user=User::find($req->id);
$imgpath=get_photo_path();
$data=$req->input();
$imgnew=$req->image;
$saveimg="";

        if(isset($imgnew))
        {
            if(isset($data['oldimg']) && $data['oldimg'] !=0)
            {
                $fullpath=$imgpath . $data['oldimg'];
                File::delete($fullpath);
            }

            $saveimg= getUniquefilename($imgpath,$imgnew);

        }
        else
        {
            if(isset($data['oldimg']))
            {
                $saveimg= $data['oldimg'];
            }
            else
            {
                $saveimg="0";
            }
        }
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->phone=$data['phone'];
        $user->photo=$saveimg;
        $user->save();
return redirect()->back()->with(['msg'=>'data update successfully','type'=>'success']);


}

//delete User
function Delete_User(Request $req)
{
$user=User::find($req->id);
if(isset($user))
{
$user->delete();
}
    return redirect()->back()->with(['msg'=>'Record Delete Successfully']);
}
}
