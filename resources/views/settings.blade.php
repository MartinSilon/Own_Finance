@extends('components.head')

@section('body')
    @include('components/nav')

    @include('expense.form')
    <div class="pt-3"></div>
    @include('income.form')
    <div class="pt-3"></div>
    @include('bank.form')
@endsection
