<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\brand;
use App\Models\tbl_model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class BrandController extends Controller
{
    //

function Show()
{
        $data=DB::select("Select categories.id as cat_id, brands.id, categories.ctype,brands.Brand_Name from categories inner join brands on categories.id=brands.category_id");
        $cat=category::all();
        return view('backend.brand.brand-list',['categories'=>$cat,'brands'=>$data]);
}

function create(Request $req)
{


$cb=brand::where(['Brand_Name'=>$req->brand,'category_id'=>$req->ctype])->first();


if(isset($cb))
{

    return redirect()->back()->with(['msg'=>'Brand Already Existed Under This Category in Database','type'=>'warning']);

}


$req->validate([
'ctype'=>'required',
'brand'=>'required'
]);
$data=$req->input();
$brand=new brand();
$brand->Brand_Name=$data['brand'];
$brand->category_id=$data['ctype'];
$brand->save();


return redirect()->back()->with(['msg'=>'Brand Created Successfully','type'=>'success']);


}


function update(Request $req)
{

$req->validate([
                'id'=>'required',
                'edit-ctype'=>'required',
                'brand'=>'required'
               ]);

$data=$req->input();
$brand=brand::find($req->id);


$brand->category_id=$data['edit-ctype'];
$brand->Brand_Name=$data['brand'];

$brand->update();
return redirect()->back()->with(['msg'=>'Brand Update Successfully','type'=>'success']);
}

//Delete Brand Function
function delete(Request $req)
{

$req->validate([
    'del_brand_id'=>'required'
]);

// $model=tbl_model::where(['brand_id'=> $req->del_brand_id])->first();

// if(isset($model))
// {

//     return redirect()->back()->with(['msg'=>'Brand Contains Model So Delete from tbl_model table in database Before Delete Brand Successfully','type'=>'danger']);
// }


$brand=brand::find($req->del_brand_id)->first();

if(isset($brand))
{
    try
    {
        $brand->delete();
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
    return redirect()->back()->with(['msg'=>'Brand Not Found To Delete','type'=>'danger']);
}
return redirect()->back()->with(['msg'=>'Brand Deleted Successfully','type'=>'success']);
}


}
