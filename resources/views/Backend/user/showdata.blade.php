

@extends('backend.admin_master')

@section('content')
<div class="card  mb-5">
    <div class="card-header">
        <h3 class="card-title">Edit User</h3>
    </div>
    <div class="card-body">
        <form>
            <div class="form-group row">
              <div class="col-sm-12">
              <label for="staticEmail" class="col-form-label">User Name</label>

                <input type="text" class="form-control border-success @error('name') is-invalid @enderror" value="{{ old('name',$user['name']) }}" id="name" placeholder="First name" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
                @enderror
              </div>
            </div>
          
            <div class="form-group row">
              <div class="col-sm-12">
              <label for="staticEmail" class="col-form-label">Email</label>

                <input type="email" class="form-control border-info @error('email') is-invalid @enderror" value="{{ old('email',$user['email']) }}" id="email" placeholder="Email" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-12">
              <label for="staticEmail" class="col-form-label">Old Password</label>

                <input type="text" class="form-control border-info @error('oldpassword') is-invalid @enderror" name="oldpassword" id="oldpassword" placeholder="Old Password" required>
             @error('oldpassword')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
             @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-12">
              <label for="staticEmail" class="col-form-label">New Password</label>

                <input type="text" class="form-control border-info" id="newpassword" name="newpassword" placeholder="First name" required>
                @error('newpassword')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-12">
              <label for="staticEmail" class="col-form-label">Confirm Passowrd</label>

                <input type="text" class="form-control border-info" id="password_confirmation" name="password_confirmation" placeholder="First name" required>
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
                @enderror
              </div>
            </div>
          
       
          
            <button class="btn btn-primary btn-pill mr-2" type="submit">Submit</button>
            <button class="btn btn-light btn-pill" type="submit">Cancel</button>
          </form>
    </div>
  </div>




@endsection

