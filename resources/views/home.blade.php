@extends('components.head')

@section('body')
    @include('components/nav')
    <section id="home" class="pt-1">

        <div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-12 w-100">

                    {{-- ---- NAVIGATION TABS ---- --}}
                    <ul class="nav nav-tabs mb-1 shadow" id="myTab0" role="tablist">
                        <!-- Home Tab -->
                        <li class="nav-item home shadow-sm text-md-start text-center" role="presentation">
                            <a class="nav-link active py-3 text-uppercase" id="home-tab0" data-bs-toggle="tab"
                               href="#home0" role="tab" aria-controls="home0" aria-selected="true">
                                <h5 class="m-0">Domov</h5>
                            </a>
                        </li>
                        <!-- Payment Tab -->
                        <li class="nav-item not-home shadow-sm text-md-start text-center" role="presentation">
                            <a class="nav-link py-3 text-uppercase" id="payment-tab0" data-bs-toggle="tab"
                               href="#payment0" role="tab" aria-controls="payment0" aria-selected="false">
                                <h5 class="m-0">Platba</h5>
                            </a>
                        </li>
                        <!-- Settings Tab -->
                        <li class="nav-item not-home shadow-sm text-md-start text-center" role="presentation">
                            <a class="nav-link py-3 text-uppercase" id="settings-tab0" data-bs-toggle="tab"
                               href="#settings0" role="tab" aria-controls="settings0" aria-selected="false">
                                <h5 class="m-0">Nastavenia</h5>
                            </a>
                        </li>
                    </ul>

                    {{-- ---- TAB CONTENT ---- --}}
                    <div class="tab-content" id="myTabContent0">
                        <!-- Home Content -->
                        <div class="tab-pane fade show active" id="home0" role="tabpanel" aria-labelledby="home-tab0">
                            @include('components.spareMoney')
                        </div>
                        <!-- Payment Content -->
                        <div class="tab-pane fade" id="payment0" role="tabpanel" aria-labelledby="payment-tab0">
                            @include('payment.payment')
                        </div>
                        <!-- Settings Content -->
                        <div class="tab-pane fade" id="settings0" role="tabpanel" aria-labelledby="settings-tab0">
                            @include('expense.form')
                            @include('income.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
