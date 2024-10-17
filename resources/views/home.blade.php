@extends('components.head')

@section('body')
    <?php
    $foodLimitKC = 1900;
    $foodLimitEURO = 1900/25;
    ?>
    @include('components/nav')
    @include('components/details')
    @include('components/controls')
    @include('plannedPayments/show')
    @include('payment/paymentsLimit')
    @include('expense/show')
    @include('payment/show')
    @include('bank/sum')
@endsection



