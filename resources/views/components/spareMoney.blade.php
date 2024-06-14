{{-- ---- SPARE MONEY  ---- --}}
<div class="header container bg-white rounded shadow mt-2">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 col-12 py-5">
            <div class="text-center">
                <h5 class="m-md-0 text-uppercase">Zostatok na míňanie:</h5>
                <h1 class="m-md-0 my-2 number">{{ $moneyLeft }} €</h1>
                <h5><span class="text-danger">-{{ $moneySpent }} €</span></h5>
            </div>
        </div>
    </div>
</div>

{{-- ---- LIST OF MONTHLY EXPENSES ---- --}}
@include('expense.show')

{{-- ---- DETAILS ---- --}}
<div class="spareMoney container bg-white rounded px-md-5 px-2 py-3 mt-1 shadow">
    <div class="row">
        <div class="col-12">
            <h5 class="m-0 text-uppercase mb-2 title">Podrobnosti:</h5>
        </div>
    </div>

    {{-- ---- DETAILS CONTENT ---- --}}
    <div class="row">
        <div class="col-12 ms-2">
            <h5>Celkový príjem: {{ $incomeSum }} €</h5>
            <h5>Počet príjmov: {{ $incomeCount }}</h5>
            <h5>Mesačné výdavky: {{ $expensesSum }} €</h5>
            <h5>Počet výdavkov: {{ $allExpensesCount }}</h5>
        </div>
    </div>
</div>

{{-- ---- RECENT PAYMENTS ---- --}}
@include('payment.show')
