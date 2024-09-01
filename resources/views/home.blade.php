@extends('components.head')

@section('body')
    @include('components/nav')
    @include('components/details')
    @include('components/controls')
    @include('expense/show')
    @include('payment/show')
    @include('bank/sum')
@endsection



