<!-- Form Modal -->
<div class="modal fade" id="editcategoryr" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFormTitle">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- form section --}}
      <form action='{{route('category.update')}}' method="POST">
        @csrf
      <div class="modal-body">
                 <div class="form-group mb-4">
                    <label>Previous Category</label>
                    <input type="text" class="form-control Previous_ctype @error('Previous_ctype') is-invalid @enderror" id="Previous_ctype" name="Previous_ctype" readonly>
                    <input type="hidden" class="form-control cat_id @error('cat_id') is-invalid @enderror" id="cat_id" name="cat_id">
                                    
                </div>

                  <div class="form-group mb-4">
                    <label for="ctype">Change Category</label>
                    <input type="text" class="form-control @error('ctype') is-invalid @enderror" id="ctype" name="ctype" placeholder="enter Category">
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