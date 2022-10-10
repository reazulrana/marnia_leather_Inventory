@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
    <h4 class="alert-heading">Errors!</h4>
    
    @foreach ($errors->all() as $error)
    <p>{{  $error }}</p>
    
    @endforeach
  </div>



   

@endif


