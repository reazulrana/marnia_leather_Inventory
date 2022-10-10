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
         
              <button type="button" style="height: 40px; line-height:10px" class="btn btn-primary" data-toggle="modal" data-target="#createcategoryr">
                <i class="mdi mdi-18px mdi-account-plus mr-1"></i> Create Category
              </button>
              {{-- <a  class="btn btn-primary"  href="register">
                <i class="mdi mdi-plus mr-1"></i> New User Without jquery
              </a> --}}
              {{-- <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false"> Yearly Chart
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div> --}}
       
         
              
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

        <a href="" class="text-info text-info"title="Details"

        >
          <i class="mdi mdi-24px mdi-eye-outline"></i>
        </a>

        <a href="return javascript:void(0)" data-toggle="modal" data-target="#editcategoryr" class="text-success ml-2 category-edit-button" title="Edit"
data-id="{{ $category->id  }}"
data-ctype="{{ $category->ctype  }}"

        >
          <i class="mdi mdi-24px mdi-account-edit"></i>
        </a>

        <a href="return javascript:void(0)" data-toggle="modal" data-target="#categorydelete"  class="text-danger ml-2 category-delete-button" title="Delete"
        data-id="{{ $category->id  }}"
data-ctype="{{ $category->ctype  }}"

        >
          <i class="mdi mdi-24px mdi-delete"></i>
        </a>
        
      </td>

  </tr>
@endforeach 
{{-- @dd($users) --}}
               </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> 

@include("Backend.category.modal.category-create")
@include("Backend.category.modal.category-edit")
@include("Backend.category.modal.category-delete")


@endsection





@section("js")
<script>
  $(document).ready(function(){


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