<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\brand;
use App\Models\tbl_model;
use App\Models\color;
use App\Models\size;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class ModelController extends Controller
{
    //
function Show()
{
   
    $data=DB::select("Select categories.id as cat_id, categories.ctype,Brands.id as brd_id,Brands.Brand_Name,tbl_models.id as modelid , tbl_models.model,tbl_models.color,tbl_models.size,tbl_models.type,tbl_models.comments from categories inner join brands on categories.id=brands.category_id inner join tbl_models on brands.id=tbl_models.brand_id");;
    $cat=category::get();
    return view("backend.model.model-list",["models"=>$data,"categories"=>$cat]);
}

//create model
function create(Request $req)
{
  


    $req->validate([
        "ctype"=>"required",
        "brand"=>"required",
        "model"=>"required",
        "color"=>"required",
        "type"=>"required",
        "size"=>"required",
        "modeltype"=>"required",
        "comments"=>"nullable"
    ]);
    //check is model exist under brand id or not
    $checkmodel=tbl_model::where(["brand_id"=>$req->brand,"model"=>$req->model])->first();

    if(isset($checkmodel))
    {
        return redirect()->back()->with(['msg'=>'Model Is Exist Under This Brand. You Cannot Insert Same Model into Same Brand','type'=>'danger']);

    }

    $model=new tbl_model();
    $data=$req->input();
    
    $model->Brand_id=$data['brand'];
    $model->Model=$data['model'];
    $model->color=$data['color'];
    $model->size=$data['size'];
    $model->type=$data['modeltype'];
    $model->Comments=$data['comments'] ? $data['comments'] : "0";
    $model->save();
    $modelid=$model->id;

    $arrycolor=explode(";",$data["color"]);
    $arrysize=explode(";",$data["size"]);
   
foreach($arrycolor as $coloritem)
{
    $color=new color();
    if($coloritem!="")
    {
        $color->model_id=$modelid;
        $color->Color=$coloritem;
        $color->save();
    }
}
foreach($arrysize as $sizeitem)
{
    $size=new size();
    if($sizeitem!="")
    {
        $size->model_id=$modelid;
        $size->size=$sizeitem;
        $size->save();
    }
}


    return redirect()->back()->with(['msg'=>'Model Save Successfully','type'=>'success']);
}

// update modelid by id
function update(Request $req)
{
    // $data=$req->input();
    // return $req->input();
    $req->validate([
        "edit_ctype_model"=>"required",
        "edit_brand_model"=>"required",
        "edit_model"=>"required",
        "edit_color"=>"nullable",
        "edit_size"=>"nullable",
        "edit_modeltype"=>"required",
        "edit_comments"=>"nullable"
    ]);
$data=$req->input();



$model=tbl_model::find($data['old_model_id']);

$model->brand_id=$data['edit_brand_model'];
$model->model=$data['edit_model'];
$model->color=$data['edit_color'] ? $data['edit_color'] : $data['old_model_color'];
$model->size=$data['edit_size'] ? $data['edit_size'] : $data['old_model_size']; 
$model->type=$data['edit_modeltype'];
$model->comments=$data['edit_comments'] ? $data['edit_comments']:"0";
$model->update();

$modelid=$data['old_model_id'];
if(isset($data['edit_color']))
{
    DB::select("delete from colors where model_id=:modelid",[':modelid'=>$modelid]);
    $arrycolor=explode(";",$data["edit_color"]);

    foreach($arrycolor as $coloritem)
{
    $color=new color();
    if($coloritem!="")
    {
        $color->model_id=$modelid;
        $color->Color=$coloritem;
        $color->save();
    }
}
}
if(isset($data['edit_size']))
{
    DB::select("delete from sizes where model_id=:modelid",[':modelid'=>$modelid]);
    // DB::table("sizes")->whereIn('model_id',$modelid)->delete();
    // dd($modelid);
    // size::whereIn("model_id",$modelid)->delete();

$arrysize=explode(";",$data["edit_size"]);    
foreach($arrysize as $sizeitem)
{
    $size=new size();
    if($sizeitem!="")
    {
        $size->model_id=$modelid;
        $size->size=$sizeitem;
        $size->save();
    }
}
}

return redirect()->back()->with(['msg'=>'Model update Successfully','type'=>'success']);



}
//get brand by id
function get_brand_by_id($id)
{
    $data=brand::where(["category_id"=>$id])->get();
    return response()->json
    ([
    'brand'=>$data,
    ]);
}


//delete model by id
function delete(Request $req)
{

  $req->validate([
    'del_model_id'=>'required',
  ]);

$size=size::where(['model_id'=> $req->del_model_id])->first();

if(isset($size))
{
  return redirect()->back()->with(['msg'=>'Model Contains Size So Delete from Size table in database Before Delete Model Successfully','type'=>'danger']);

}

// $color=color::find($req->del_model_id);
$color=color::where(['model_id'=> $req->del_model_id])->first();

if(isset($color))
{
  return redirect()->back()->with(['msg'=>'Model Contains color So Delete color from color table in database Before Delete Model Successfully','type'=>'danger']);

}
  $model=tbl_model::find($req->del_model_id)->get();

  $model->delete();
  return redirect()->back()->with(['msg'=>'Model Deleted Successfully','type'=>'success']);


}
}
