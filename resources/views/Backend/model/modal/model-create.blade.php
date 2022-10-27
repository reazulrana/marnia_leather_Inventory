<!-- Form Modal -->
<div class="modal fade" id="createmodel" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFormTitle">Create Model</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- form section --}}
      <form action='{{route('model.create')}}' method="POST">
        @csrf
      <div class="modal-body">
          <div class="form-group mb-4">
          <select class="form-control ctype" name="ctype" id="ctype" title="category">
          <option value="">Select Category</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}"> {{ $category->ctype }} </option>
          @endforeach
          </select>
          </div>

          <div class="form-group mb-4">
          <select class="form-control brand" name="brand" id="brand" title="brand">
            <option value="">Select Brand</option>
          </select>
          </div>

          <div class="form-group mb-4">
          <input type="text" class="form-control" name="model" id="model" placeholder="Enter Model" title="model">
          </div>

          <div class="form-group mb-4">
          <input type="text" class="form-control" name="color" id="color" placeholder="Enter color" title="color">
          <span><small class="text-muted">Each Color will separate by ";"</small></span>
          </div>

          <div class="form-group mb-4">
            <select class="form-control model_type" name="model_type" id="model_type" title="Measure Type">
            <option value="">Select Type</option>
            <option value="size">Size</option>
            <option value="dimension">Dimension</option>

            </select>
          </div>
            
          <div class="form-group mb-4">
          <input type="text" class="form-control" name="size" id="size" placeholder="Enter size" title="size">
          <span><small class="text-muted">Each size will separate by ";"</small></span>
          </div>
          <div class="form-group mb-4">
            <textarea class="form-control" rows="5" cols="50" name="comments" id="comments" placeholder="Enter comments" title="comments"></textarea>
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