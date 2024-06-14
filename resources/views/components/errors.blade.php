@if($errors->any())
    <div class="mt-1 alerts alert-danger px-3 py-2 rounded" role="alert">
        {{ $errors->first() }}
    </div>
@endif

@if(session('confirmMess'))
    <div class="mt-1 alerts alert-success px-3 py-2 rounded" role="alert">
        {{ session('confirmMess') }}
    </div>
@endif
