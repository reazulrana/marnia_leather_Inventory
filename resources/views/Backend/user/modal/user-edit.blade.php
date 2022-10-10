<!-- Form Modal -->
<div class="modal fade" id="edituser" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalFormTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFormTitle">User Edit Mode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- form section --}}
      <form action='{{ route('user.edit') }}' method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="form-group mb-4">
            <input type="hidden" id="id" class="user_id" name="id" >
    
          </div>
                  <div class="form-group mb-4">
                    <label for="name">name</label>
                    <input type="text" class="form-control user_name @error('name') is-invalid @enderror" id="name" name="name" placeholder="enter name">
              
                  </div>

                  <div class="form-group mb-4">
                    <label for="email">email</label>
                    <input type="text" class="form-control user_email  @error('email') is-invalid @enderror" id="email" name="email" placeholder="enter email">
                 
                  </div>
        
                  <div class="form-group mb-4">
                    <label for="password">Phone</label>
                    <input type="text" class="form-control user_phone @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="type Phone">
              
        
                  </div>
   
                  <div class="form-group mb-4">
                   <img class="user_image" src="" height="80px" />
                   <input type="hidden" value="" name="oldimg" class="oldimg_class"/>
                  </div>


                  <div class="form-group mb-4">
                    <label for="image">Photo</label>
                    <input type="file" class="form-control user_Photo" id="image" name="image">
                  </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-pill">Save Changes</button>
      </div>
    </form>

    </div>
  </div>
</div>


{{-- @section("js")

$(document).ready(function(){




})
@endsection --}}