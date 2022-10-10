<!-- Form Modal -->
<div class="modal fade" id="createcategoryr" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFormTitle">Create Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- form section --}}
      <form action='{{route('category.create')}}' method="POST">
        @csrf
      <div class="modal-body">
                  <div class="form-group mb-4">
                    <label for="ctype">Category</label>
                    <input type="text" class="form-control @error('ctype') is-invalid @enderror" id="ctype" name="ctype" placeholder="enter Category">
                    {{-- @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
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