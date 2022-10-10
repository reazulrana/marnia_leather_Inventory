@extends('backend.admin_master')

@section('content')

    <!-- Table Product -->
    <div class="row">
        <div class="col-12">
          <x-message.success/>
          <x-message.error/> 
          <div class="card card-default">
            <div class="card-header">
              <h2>User Information</h2>
         
              <button type="button" style="height: 40px; line-height:10px" class="btn btn-primary" data-toggle="modal" data-target="#createuser">
                <i class="mdi mdi-18px mdi-account-plus mr-1"></i> New User
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Photo</th>
                  </tr>
                </thead>
                <tbody>
            
@foreach ($users as $user)

  <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->Phone }}</td>
      <td>
        <img height="100" src="/Uploads/Users/{{ $user->Photo }}"/>
        
      </td>
      <td>

        <a href="" class="text-info text-info"title="Details"
        data-id="{{ $user->id }}"
        data-name="{{ $user->name }}"
        data-email="{{ $user->email }}"
        data-Phone="{{ $user->Phone }}"
        data-Photo="{{ $user->Photo }}"

        >
          <i class="mdi mdi-24px mdi-eye-outline"></i>
        </a>

        <a href="return javascript:void(0)" data-toggle="modal" data-target="#edituser" class="text-success ml-2 text-edit-button" title="Edit"
        data-id="{{ $user->id }}"
        data-name="{{ $user->name }}"
        data-email="{{ $user->email }}"
        data-Phone="{{ $user->Phone }}"
        data-Photo="{{ $user->Photo }}"
        >
          <i class="mdi mdi-24px mdi-account-edit"></i>
        </a>

        <a href="return javascript:void(0)" data-toggle="modal" data-target="#Delete_Confirmation"  class="text-danger ml-2 text-delete-button" title="Delete"
        data-id="{{ $user->id }}"
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


      @include('backend.user.modal.user-create')
@include('backend.user.modal.user-edit')
@include('components.message.delete_confirmation')
@endsection





@section("js")
<script>
  $(document).ready(function(){


$('.text-edit-button').click(function()
{
  let element=$(this);
  // var a = ; 
 let url="Uploads/Users/";
 let img=element.data("photo")
 $('.user_id').val(element.data("id"));
  $('.user_name').val(element.data("name"));
  $('.user_email').val(element.data("email"));
  $('.user_phone').val(element.data("phone"));
  $('.user_image').attr('src',url+img);
$('.oldimg_class').val(img);

// if(img!=0){
//   $('.oldimg_class').val(img);
// }
})


$(".text-delete-button").click(function()
{
  // alert("ok")

let element=$(this)
// $('.del_user_id').val(element.data('id')); 
$('.del_user_id').val(element.data('id'))


})



  })
</script>
@endsection