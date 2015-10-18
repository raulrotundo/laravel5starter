@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('flash_message'))
    <div class="alert {{ Session::get('flash_type') ?: 'alert-success' }}">
        {{ Session::get('flash_message') }}
        <button class="close" data-dismiss="alert">&times;</button>
    </div>
@endif