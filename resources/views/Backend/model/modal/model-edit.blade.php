<!-- Form Modal -->
<div class="modal fade" id="editemodel" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFormTitle">Edit Model</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- form section --}}
      <form action='{{route('model.update')}}' method="POST">
        @csrf
      <div class="modal-body">
        <input type="hidden" name="old_model_id" class="old_model_id" name="old_model_id">

          <div class="form-group mb-4">
          <select class="form-control edit_ctype_model" name="edit_ctype_model" id="edit_ctype_model" title="category">
          <option value="">Select Category</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}"> {{ $category->ctype }} </option>
          @endforeach
          </select>
          </div>

          <div class="form-group mb-4">
          <select class="form-control edit_brand_model" name="edit_brand_model" id="edit_brand_model" title="brand">
            <option value="">Select Brand</option>
          </select>
          </div>

          <div class="form-group mb-4">
          <input type="text" class="form-control edit_model" name="edit_model" id="edit_model" placeholder="Enter Model" title="model">
          </div>

          <div class="form-group mb-4">
          <input type="hidden" name="old_model_color" class="old_model_color" name="old_model_color">

          <input type="text" class="form-control edit_color" name="edit_color" id="edit_color" placeholder="Enter color" title="color">
          <span><small class="text-muted">Each Color will separate by ";"</small></span>
          </div>

          
          <div class="form-group mb-4">
            
            <select class="form-control edit_modeltype" name="edit_modeltype" id="edit_modeltype" title="Measurement">
            <option value="">Select Type</option>
            <option value="size">Size</option>
            <option value="dimension">Dimension</option>

            </select>
          </div>
            
          <div class="form-group mb-4">
          <input type="hidden" name="old_model_size" class="old_model_size" name="old_model_size">

          <input type="text" class="form-control edit_size" name="edit_size" id="edit_sizesize" placeholder="Enter size" title="size">
          <span><small class="text-muted">Each size will separate by ";"</small></span>
          </div>
          <div class="form-group mb-4">
            <textarea class="form-control edit_comments" rows="5" cols="50" name="edit_comments" id="edit_comments" placeholder="Enter comments" title="comments"></textarea>
          </div>
      </div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-pill">Save</button>
      </div>
    </form>

    </div>
  </div>
</div>