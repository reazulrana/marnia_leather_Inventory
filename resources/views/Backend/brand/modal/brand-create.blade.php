<!-- Form Modal -->
<div class="modal fade" id="createbrand" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFormTitle">Create Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- form section --}}
      <form action='{{route('brand.create')}}' method="POST">
        @csrf
      <div class="modal-body">
                  <div class="form-group mb-4">
                <select class="form-control" name="ctype" id="ctype">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->ctype }} </option>
                    @endforeach
                </select>
                  </div>

                  <div class="form-group mb-4">
                    <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" placeholder="enter brand">
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