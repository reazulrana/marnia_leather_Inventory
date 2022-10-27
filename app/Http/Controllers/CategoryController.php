<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\brand;
use Illuminate\Database\QueryException;
class CategoryController extends Controller
{
    //

function Show_Category_List()
{
    $data=category::all();

    return view("Backend.category.category-list",['categories'=>$data]);
}

function create(Request $req)
{
$req->validate
([
'ctype'=>'required'
]);
try{
$data=$req->input();
$cat=new category();
$cat->ctype=$data['ctype'];
$cat->save();
}
catch(\Exception  $e)
{
 $err=$e->errorInfo[1];
if($err==1062)
{
    return view('errors.1062');
}
else
{
return redirect()->back()->with(['msg'=>$e->getMessage(),'type'=>'danger']);
}

}
return redirect()->back()->with(['msg'=>'Category Inserted Successfully','type'=>'success']);
}

//update category by id
function update(Request $req)
{

// $d= $this->delete();

// return $d;

    $req->validate
    ([
    'ctype'=>'required'
    ]);

if(isset($req->cat_id))
{
    $cat=category::find($req->cat_id);
    $cat->ctype=$req->ctype;
    $cat->update();
}
else
{
    return redirect()->back()->with(['msg'=>'Category "Id" Not Found To Update','type'=>'danger']);
}

return redirect()->back()->with(['msg'=>'Category Update Successfully' ,'type'=>'success']);
}


//delete category by id
public function delete(Request $req)
{


//check category in Brand table
// $brand=brand::where('category_id','=',$req->del_cat_id)->first();

//If category found in Brand Table Then Throw msg 
// if(isset($brand))
// {
//     return redirect()->back()->with(['msg'=>'You Cannot Delete Category Because Category Exist in Brands Table' ,'type'=>'danger']);
// }
//get Category by id if found
$cat=category::find($req->del_cat_id);
if(isset($cat))
{
// dd($cat);
try
{

    $cat->delete();
}
catch(QueryException $e)
{
// dd($e->errorInfo[0]);
if($e->errorInfo[0]=="23000")
{
    return redirect()->back()->with(['msg'=>"Record Cannot Delete Due to foreign key data exist" ,'type'=>'danger']);
}
else{
    return redirect()->back()->with(['msg'=>$e->getMessage() ,'type'=>'danger']);

}   
}
}
else
{
    return redirect()->back()->with(['msg'=>'Category id Not Found To Delete' ,'type'=>'danger']);

}

return redirect()->back()->with(['msg'=>'Category Deleted Successfully' ,'type'=>'success']);

}

}
