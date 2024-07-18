
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
            <h5>Denný príjem:
                <span class="{{ $averagePlus > 0 ? 'text-success' : 'text-danger' }}">
                    {{ $averagePlus }}€
                </span> / deň
            </h5>
            <h5>Celkový príjem: {{ $incomeSum }} €</h5>
            <h5>Počet príjmov: {{ $incomeCount }}</h5>
            <h5>Mesačné výdavky: {{ $expensesSum }} €</h5>
            <h5>Počet výdavkov: {{ $allExpensesCount }}</h5>
        </div>
    </div>
</div>

