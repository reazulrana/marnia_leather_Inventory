<!-- Form Modal -->
<div class="modal fade" id="Delete_Confirmation" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalFormTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFormTitle">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- form section --}}
      <form action='{{ route('User.Delete') }}' method="POST">
        @csrf
      <div class="modal-body">
        <div class="form-group mb-4">
            <input type="text" id="id" class="del_user_id" name="id" >
    
          </div>
                  <div class="form-group mb-4">
                    <label for="name">name</label>
                    <input type="text" class="form-control user_name @error('name') is-invalid @enderror" id="name" name="name" placeholder="enter name">
              
                  </div>
                  <h2>Do You Want Delete User</h2>

          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-pill" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger btn-pill">Delete</button>
      </div>
    </form>

    </div>
  </div>
</div>