@extends('backend.admin_master')

@section('content')

    <!-- Table Product -->
    <div class="row">
        <div class="col-12">
          <x-message.success/>
          <x-message.error/> 
          <div class="card card-default">
            <div class="card-header">
              <h2>Brand</h2>
         
              <button type="button" style="height: 40px; line-height:10px" class="btn btn-primary" data-toggle="modal" data-target="#createbrand">
                <i class="mdi mdi-18px mdi-account-plus mr-1"></i> Create Brand
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
                    <th>Category</th>
                    <th>Brand</th>

                  </tr>
                </thead>
                <tbody>
          
@foreach ($brands as $brand)

  <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $brand->ctype }}</td>
      <td>{{ $brand->Brand_Name }}</td>

  
      <td>

        <a href="" class="text-info text-info"title="Details"

        >
          <i class="mdi mdi-24px mdi-eye-outline"></i>
        </a>

        <a href="return javascript:void(0)" data-toggle="modal" data-target="#editbrand" class="text-success ml-2 brand-edit-button" title="Edit"
            data-id="{{ $brand->id  }}"
            data-cat_id="{{ $brand->cat_id  }}"
            data-brand="{{ $brand->Brand_Name  }}"


        >
          <i class="mdi mdi-24px mdi-account-edit"></i>
        </a>

        <a href="return javascript:void(0)" data-toggle="modal" data-target="#branddelete"  class="text-danger ml-2 brand-delete-button" title="Delete"
            data-id="{{ $brand->id  }}"
            data-ctype="{{ $brand->ctype  }}"
            data-brand="{{ $brand->Brand_Name  }}">
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

@include("Backend.brand.modal.brand-create",['categories'=>$categories])
@include("Backend.brand.modal.brand-edit",['categories'=>$categories])
@include("Backend.brand.modal.brand-delete")


{{-- @include("Backend.brand.modal.brand-edit")
@include("Backend.brand.modal.brand-delete") --}}


@endsection





@section("js")
<script>
  $(document).ready(function(){

$('.brand-edit-button').click(function()
{
let element=$(this);
let cat=element.data('cat_id') // store category_id

//if value matched with dropdown list option value then selected true to the matched value
$("#edit-ctype option").filter(function() {
  //may want to use $.trim in here
  return $(this).val() == cat;
}).prop('selected', true);

 $('.brand-id').val(element.data("id"));
 $('.brand-edit').val(element.data("brand"));
  
})


$(".brand-delete-button").click(function()
{
  // alert("ok")
let element=$(this)
// $('.del_user_id').val(element.data('id')); 
$('.del_brand_id').val(element.data('id'))
$('.cat_delete_name').val(element.data('ctype'))
$('.brand_name').val(element.data('brand'))

})



  })
</script>
@endsection