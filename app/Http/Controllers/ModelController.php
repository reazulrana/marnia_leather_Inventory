<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\brand;
use App\Models\tbl_model;
use App\Models\color;
use App\Models\size;

class ModelController extends Controller
{
    //
function Show()
{
    $data=category::all();
    return view("backend.model.model-list",["categories"=>$data]);
}

//create model
function create(Request $req)
{
  


    $req->validate([
        "ctype"=>"required",
        "brand"=>"required",
        "model"=>"required",
        "color"=>"required",
        "size"=>"required",
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

//get brand by id
function get_brand_by_id($id)
{
    $data=brand::where(["category_id"=>$id])->get();
    return response()->json
    ([
    'brand'=>$data,
    ]);
}
}
