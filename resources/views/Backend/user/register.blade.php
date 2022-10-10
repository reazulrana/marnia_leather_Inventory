@extends('Backend.admin_master')

@section('content')
<div class="card">
<div class="card-header align-items-center">
    <h3>New User</h3>

</div>
<form action='create' method="POST">
    @csrf
<div class="card-body">
  
              

          <div class="form-group mb-4">
            <label for="name">name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="enter name">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
          </div>

          <div class="form-group mb-4">
            <label for="email">email</label>
            <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="enter email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
          </div>

          <div class="form-group mb-4">
            <label for="password">password</label>
            <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="type password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

          </div>
          <div class="form-group mb-4">
            <label for="password_confirmation">Confirm password</label>
            <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="type password">
         

          </div>

     

          <div class="d-flex justify-content-end mt-6">
            <button type="submit" class="btn btn-primary mb-2 btn-pill">create</button>
          </div>

</div>

<div class="card-footer">
    
</div>

</form>
</div>
@endsection