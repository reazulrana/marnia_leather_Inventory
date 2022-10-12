<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\brand;
use Illuminate\Support\Facades\DB;
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
    $cb=brand::select('*')->where('Brand_Name','=',$req->brand)->where('category_id','=',$req->ctype)->first();

// $cb=brand::where('Brand_Name','=',$req->brand,'and','category_id','=',$req->ctype)->first();
//  return $cb;
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

$brand=brand::find($req->del_brand_id);

if(isset($brand))
{
$brand->delete();
}
else
{
    return redirect()->back()->with(['msg'=>'Brand.id Not Found To Delete','type'=>'danger']);
}
return redirect()->back()->with(['msg'=>'Brand.id Not Found To Delete','type'=>'success']);
}


}
