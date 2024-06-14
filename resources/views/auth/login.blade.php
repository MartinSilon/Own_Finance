@extends('components.head')

@section('body')
    <section id="login">
{{--        @include('components/nav')--}}
        <div class="container-fluid con-window">
            <div class="logo-login fixed-top">
                @include('components/nav')
            </div>

            <div class="row justify-content-center">

                <div class="col-12 d-flex justify-content-center align-items-center">
                    <div class="window px-md-5 px-0 py-3 rounded">

                        {{-- FORM --}}
                        <form id="myForm" action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label class="">Heslo:</label>
                            <input class="form-control shadow" type="password" name="password" id="myInput" maxlength="8" required>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
