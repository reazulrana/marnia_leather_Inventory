@extends('backend.admin_master')

@section('content')

    <!-- Table Product -->
    <div class="row">
        <div class="col-12">
          <x-message.success/>
          <x-message.error/> 
          <div class="card card-default">
            <div class="card-header">
              <h2>Category</h2>
         
              <button type="button" style="height: 40px; line-height:10px" class="btn btn-primary" data-toggle="modal" data-target="#createmodel">
                <i class="mdi mdi-18px mdi-account-plus mr-1"></i> Create Models
              </button>    
            </div>
            <div class="card-body">
              <table id="productsTable" class="table table-hover table-product" style="width:100%">
                <thead>
                  <tr>
                    <th>SL NO</th>
                    <th>Product Category</th>

                  </tr>
                </thead>
                <tbody>




@foreach ($categories as $category)

  <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $category->ctype }}</td>
  
      <td>

        <a href="" class="text-info text-info"title="Details">
          <i class="mdi mdi-24px mdi-eye-outline"></i>
        </a>

        <a href="return javascript:void(0)" data-toggle="modal" data-target="#editcategoryr" class="text-success ml-2 category-edit-button" title="Edit"
        >
          <i class="mdi mdi-24px mdi-account-edit"></i>
        </a>

        <a href="return javascript:void(0)" data-toggle="modal" data-target="#categorydelete"  class="text-danger ml-2 category-delete-button" title="Delete"
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
{{-- @include("Backend.category.modal.category-edit")
@include("Backend.category.modal.category-delete") --}}


@endsection





@section("js")
<script>
  $(document).ready(function(){

$('.ctype').change(function(){

  var id=$(this).val()
  var url='{{ route("brand.get.by.id",":id") }}' 
  url=url.replace(":id",id);

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
          let dropdown=$('#brand');
          // alert( $(dropdown).html())
          $(dropdown).empty();
          $(dropdown).append('<option value="">Select Brand</option>')
            $(response.brand).each(function(index,item){
              let option='<option value="' + item.id + '">'+ item.Brand_Name +'</option>'
              $(dropdown).append(option)
            })
        },
        error:function(err)
        {
          alert(error)
        }
    })
})
$('.category-edit-button').click(function()
{
  let element=$(this);

 $('.cat_id').val(element.data("id"));
 $('.Previous_ctype').val(element.data("ctype"));
  
})


$(".category-delete-button").click(function()
{
  // alert("ok")

let element=$(this)
// $('.del_user_id').val(element.data('id')); 
$('.del_cat_id').val(element.data('id'))
$('.cat_name').val(element.data('ctype'))



})



  })
</script>
@endsection