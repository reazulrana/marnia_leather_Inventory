<!-- Form Modal -->
<div class="modal fade" id="editbrand" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFormTitle">Edit Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- form section --}}
      <form action='{{route('brand.update')}}' method="POST">
        @csrf
      <div class="modal-body">
                  <div class="form-group mb-4">
                    <input type="hidden" class="form-control brand-id @error('brand') is-invalid @enderror" id="id" name="id">

                <select class="form-control" name="edit-ctype" id="edit-ctype">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->ctype }} </option>
                    @endforeach
                </select>
                  </div>

                  <div class="form-group mb-4">
                    <input type="text" class="form-control brand-edit @error('brand') is-invalid @enderror" id="brand" name="brand" placeholder="enter brand">
                  </div>
      </div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-pill">Update</button>
      </div>
    </form>

    </div>
  </div>
</div>