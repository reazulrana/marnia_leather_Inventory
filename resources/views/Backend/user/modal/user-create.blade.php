<!-- Form Modal -->
<div class="modal fade" id="createuser" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFormTitle">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- form section --}}
      <form action='{{route('user.create')}}' method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
                  <div class="form-group mb-4">
                    <label for="name">name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="enter name">
                    {{-- @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
                  </div>

                  <div class="form-group mb-4">
                    <label for="email">email</label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="enter email">
                    {{-- @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
                  </div>

                  <div class="form-group mb-4">
                    <label for="phone">phone</label>
                    <input type="text" class="form-control  @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="enter Phone No">
                    {{-- @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
                  </div>
        
                  <div class="form-group mb-4">
                    <label for="password">password</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="type password">
                    {{-- @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
        
                  </div>
                  <div class="form-group mb-4">
                    <label for="password_confirmation">Confirm password</label>
                    <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="type password">
                  </div>

                  <div class="form-group mb-4">
                    <label for="password_confirmation">Photo</label>
                    <input type="file" class="form-control" id="image" name="image">
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