@extends('backend.admin_master')

@section('content')

  <!-- Table Product -->
  <div class="row">
      <div class="col-12">
        <x-message.success/>
        <x-message.error/> 
        <div class="card card-default">
          <div class="card-header">
            <h2>Model</h2>
        
            <button type="button" style="height: 40px; line-height:10px" class="btn btn-primary" data-toggle="modal" data-target="#createmodel">
              <i class="mdi mdi-18px mdi-account-plus mr-1"></i> Create Models
            </button>    
          </div>
          <div class="card-body">
            <table id="productsTable" class="table table-hover table-product table-responsive" >
              <thead>
                <tr>
                  <th>SL NO</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Color</th>
                  <th>Size</th>
                  <th>Measure Type</th>
                  <th>Action</th>
                </tr>
              </thead>
<tbody>
@foreach ($models as $model)

<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $model->ctype }}</td>
    <td>{{ $model->Brand_Name }}</td>
    <td>{{ $model->model }}</td>
    <td>{{ $model->color }}</td>
    <td>{{ $model->size }}</td>
    <td>{{ $model->type }}</td>
    <td>
      <a href="return javascript:void(0)" data-toggle="modal" data-target="#editemodel" class="text-success ml-2 model-edit-button" title="Edit"
      data-cat_id="{{ $model->cat_id }}"
      data-brd_id="{{ $model->brd_id }}"
      data-modelid="{{ $model->modelid }}"
      data-model="{{ $model->model }}"
      data-color="{{ $model->color }}"
      data-size="{{ $model->size }}"
      data-type="{{ $model->type }}"
      data-comments="{{ $model->comments }}"
      >
        <i class="mdi mdi-24px mdi-account-edit"></i>
      </a>

      <a href="return javascript:void(0)" data-toggle="modal" data-target="#modeldelete"  class="text-danger ml-2 model-delete-button" title="Delete"
      data-modelid="{{ $model->modelid }}"
      data-del_cat_name="{{ $model->ctype }}"
      data-del_brand_name="{{ $model->Brand_Name }}"
      data-del_model_name="{{ $model->model }}"
      
      >
        <i class="mdi mdi-24px mdi-delete"></i>
      </a>
      
    </td>

</tr>
@endforeach 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div> 

@include("Backend.model.modal.model-create")
@include("Backend.model.modal.model-edit")
@include("Backend.model.modal.model-delete")


{{-- @include("Backend.category.modal.category-edit")
@include("Backend.category.modal.category-delete") --}}


@endsection





@section("js")
<script>
$(document).ready(function(){
// Model create Form js code

$('.ctype').change(function(){

var id=$(this).val()
var url='{{ route("brand.get.by.id",":id") }}' 
url=url.replace(":id",id);
load_dropdown(id,url,"#brand")

})

// Model Edit Form js code

$(".model-edit-button").click(function()
{
let element=$(this);
let catid=element.data('cat_id')
let brd_id=element.data('brd_id')
let type=element.data('type')
$("#edit_ctype_model option").filter(function() {
//may want to use $.trim in here
return $(this).val() == catid;
}).prop('selected', true);

// $("#edit_modeltype option").filter(function() {
//   //may want to use $.trim in here
//   return $(this).val() == type;
// }).prop('selected', true);

//load brand dropdown
loadborand(catid,brd_id);


$(".old_model_id").val(element.data("modelid"))
$(".old_model_color").val(element.data("color"))
$(".old_model_size").val(element.data("size"))

$(".edit_model").val(element.data("model"))
$(".edit_color").val(element.data("color"))
$(".edit_size").val(element.data("size"))
$(".edit_comments").val(element.data("comments"))



// $("#edit_brand_model option").filter(function() {
//   //may want to use $.trim in 
//   alert($(this).val())
//   return $(this).val() == brd_id;
// }).prop('selected', true);




})

$('.edit_ctype_model').change(function(){

let id=$(this).val();
loadborand(id);
})

function loadborand(id,brd_id=null)
{
var catid=id
var url='{{ route("brand.get.by.id",":id") }}' 
url=url.replace(":id",id);
brd_id? load_dropdown(catid,url,"#edit_brand_model",brd_id) : load_dropdown(catid,url,"#edit_brand_model")
if(brd_id==null)
{

}
else
{


}

}


//Brand dropdown load from id 
function load_dropdown(dataid,url,dropdownid,brd_id=null)
{

$.ajaxSetup
({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
$.ajax({
    url:url,
    type:'GET',
    // data:{id:$(this).val()},
    dataType:'json',
    success:function(response)
    {
      let dropdown=$(dropdownid);
      // alert( $(dropdown).html())
      $(dropdown).empty();
      $(dropdown).append('<option value="">Select Brand</option>')
        $(response.brand).each(function(index,item){
          let option="";
          if(brd_id!=null)
          {
            option='<option value="' + item.id + '" selected>'+ item.Brand_Name +'</option>'

          }else
          {
            option='<option value="' + item.id + '">'+ item.Brand_Name +'</option>'

          }
          
          $(dropdown).append(option)
        })
    },
    error:function(err)
    {
      alert(error)
    }
})
}
//end of load dropdown


// Model Delete Form js code

//delete modal form appear
$(".model-delete-button").click(function()
{
let element=$(this);

$('.del_model_id').val(element.data('modelid'))
$('.del_cat_name').val(element.data('del_cat_name'))
$('.del_brand_name').val(element.data('del_brand_name'))
$('.del_model_name').val(element.data('del_model_name'))


})



})
</script>

@endsection