<div id="nav">
    <div class="container-fluid py-lg-3 pb-0 pt-2">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <a href="{{  route('home') }}"><img class="img-fluid logo" src="{{ asset('/images/logo.svg') }}"></a>
            </div>
        </div>
    </div>
    <div class="errors fixed-top">
        @include('components/errors')
    </div>
</div>

