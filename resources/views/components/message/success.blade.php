
@if(Session::get('msg'))

    <div class="alert alert-{{ Session('type')}}" role="alert">
        {{ Session('msg') }};
    </div>
@endif