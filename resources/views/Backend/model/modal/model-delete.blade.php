<!-- Form Modal -->
<div class="modal fade" id="modeldelete" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalFormTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFormTitle">Delete Model</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- form section --}}
      <form action='{{ route('model.delete') }}' method="POST">
        @csrf
      <div class="modal-body">
        <h2>Do You Want Delete Model</h2>

        <div class="form-group mb-4">
            <input type="hidden" id="del_model_id" class="del_model_id" name="del_model_id" >
    
          </div>
        <div class="form-group mb-4">
        <input type="text" class="form-control del_cat_name @error('del_cat_name') is-invalid @enderror" id="del_cat_name" name="del_cat_name" readonly>
        </div>
        <div class="form-group mb-4">
            <input type="text" class="form-control del_brand_name @error('del_brand_name') is-invalid @enderror" id="del_brand_name" name="del_brand_name" readonly>
         </div>

         <div class="form-group mb-4">
            <input type="text" class="form-control del_model_name @error('del_model_name') is-invalid @enderror" id="del_model_name" name="del_model_name" readonly>
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