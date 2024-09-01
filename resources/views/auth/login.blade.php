@extends('components.head')

@section('body')
    <section id="login">
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
                            <label class="text-center">Email:</label>
                            <input class="form-control shadow" type="email" name="email" value="{{ old('email') }}" required>

                            <label class="text-center mt-2">Heslo:</label>
                            <input class="form-control shadow" type="password" name="password" id="myInput" maxlength="8" required>

                            <div class="d-none">
                                <button type="submit"></button>
                            </div>

                        </form>
                        <p class="text-center mt-5 pt-5">Pre registráciu kliknite tu <a href="/register">Registrovať sa</a></p>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
