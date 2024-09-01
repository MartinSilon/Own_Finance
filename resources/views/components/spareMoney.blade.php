{{-- ---- SPARE MONEY  ---- --}}
<div class="spareMoney container pt-5">
    <div>
        <h1 class="number text-center">{{ $moneyLeft < 0 ? '0' : $moneyLeft }} €</h1>
        <p class="rounded-pill p-2 px-3">
                    <span class='text-white'>
                        {{ $moneySpent > 0 ? '+' : '' }}{{ $moneySpent }} €
                    </span>
            |
            <span class="text-white">
                        {{ $moneyEarned > 0 ? '+' : '' }}{{ $moneyEarned }} €
                    </span>
        </p>
    </div>
</div>
