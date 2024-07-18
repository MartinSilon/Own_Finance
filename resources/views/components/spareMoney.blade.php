{{-- ---- SPARE MONEY  ---- --}}
<div class="header container bg-white rounded shadow mt-2">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 col-12 py-5">
            <div class="text-center">
                <h5 class="m-md-0 text-uppercase text-center">Zostatok na míňanie:</h5>
                <h1 class="m-md-0 my-2 number text-center">{{ $moneyLeft < 0 ? '0' : $moneyLeft }} €</h1>
                <h5>
                    <span class="{{ $moneySpent > 0 ? 'text-success' : 'text-danger' }}">
                        {{ $moneySpent > 0 ? '+' : '' }}{{ $moneySpent }} €
                    </span>
                    |
                    <span class="{{ $moneyEarned > 0 ? 'text-success' : 'text-danger' }}">
                        {{ $moneyEarned > 0 ? '+' : '' }}{{ $moneyEarned }} €
                    </span>
                </h5>
            </div>
        </div>
    </div>
</div>
