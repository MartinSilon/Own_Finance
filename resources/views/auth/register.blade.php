@extends('components.head')

@section('body')
    <section id="login">
        {{--        @include('components/nav')--}}
        <div class="container-fluid con-window">
{{--            <div class="logo-login fixed-top">--}}
{{--                @include('components/nav')--}}
{{--            </div>--}}

            <div class="row justify-content-center">

                <div class="col-12 d-flex justify-content-center align-items-center">
                    <div class="window px-md-5 px-0 py-3 rounded">

                        {{-- FORM --}}
                        <form id="myForm" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label class="text-center">Name:</label>
                            <input class="form-control shadow" type="text" name="name" required>

                            <label class="text-center mt-2">Email:</label>
                            <input class="form-control shadow" type="email" name="email" required>

                            <label class="text-center mt-2">Password:</label>
                            <input class="form-control shadow" type="password" name="password" id="passwordInput" minlength="8" required>

                            <div class="">
                                <button class="mt-4 form-control shadow" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
