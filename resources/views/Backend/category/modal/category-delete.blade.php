<!-- Form Modal -->
<div class="modal fade" id="categorydelete" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalFormTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFormTitle">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- form section --}}
      <form action='{{ route('category.delete') }}' method="POST">
        @csrf
      <div class="modal-body">
        <h2>Do You Want Delete Category</h2>

        <div class="form-group mb-4">
            <input type="hidden" id="del_cat_id" class="del_cat_id" name="del_cat_id" >
    
          </div>
                  <div class="form-group mb-4">
                    <input type="text" class="form-control cat_name @error('cat_name') is-invalid @enderror" id="cat_name" name="cat_name" readonly>
                  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-pill" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger btn-pill">Delete</button>
      </div>
    </form>

    </div>
  </div>
</div>