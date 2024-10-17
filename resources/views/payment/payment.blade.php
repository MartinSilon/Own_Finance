{{-- ---- NEW PAYMENT  ---- --}}
<div class="container bg-white rounded px-md-5 px-2 py-5 payment shadow mt-2">
    <div class="row justify-content-start">
        <div class="col-md-6 text-center">
            <form id="paymentForm" action="{{ route('sentPayment') }}" method="post" enctype="multipart/form-data">
                <p class="warning text-danger text-start"></p>
                @csrf
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <input class="form-control mb-3 date" type="text" id="name" name="name" placeholder="Potraviny COOP" value="{{ old('name') }}" required>
                <input class="form-control mb-3 date" type="text" name="price" placeholder="6.50" value="{{ old('price') }}" required>


                <button class="btn w-100 mt-3 text-uppercase" type="submit">Odoslať</button>
            </form>
        </div>
        <div class="col-md-6 d-md-block d-none">
            <h5 class="text-uppercase">Najčastejšie platby:</h5>
            @if($topPayments->isNotEmpty())
                @foreach($topPayments as $payment)
                    <div class="lastPayment w-100 rounded card pt-3 pb-1 px-4 mb-3">
                        <h4>{{ $payment['name'] }} <span class="date fs-6">( {{ $payment['count'] }} ) </span></h4>
                        <h6 class="">Spolu tento mesiac:<span class="number"> {{ $payment['total_price'] }}€</span></h6>
                    </div>
                @endforeach
            @else
                <p class="fs-5">Tento mesiac neprebehli žiadne platby.</p>
            @endif

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var paymentForm = document.getElementById('paymentForm');
        var nameInput = document.querySelector('input[name="name"]');
        var warningElement = document.querySelector('.warning');

        nameInput.addEventListener('input', function() {
            if (nameInput.value === 'Revolut' || nameInput.value === 'Tatra Banka' || nameInput.value === 'Prima Banka' || nameInput.value === 'Trading 212') {
                warningElement.textContent = "Platba na sporiaci účet!";
            } else {
                warningElement.textContent = "";
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const swipeElements = document.querySelectorAll('.swipe-to-delete');

        swipeElements.forEach(element => {
            let touchstartX = 0;
            let touchendX = 0;

            element.addEventListener('touchstart', function (event) {
                touchstartX = event.changedTouches[0].screenX;
            });

            element.addEventListener('touchend', function (event) {
                touchendX = event.changedTouches[0].screenX;
                handleSwipe(event.currentTarget);
            });

            function handleSwipe(element) {
                if (touchendX < touchstartX - 50) { // ak je swipe viac ako 50px doľava
                    element.classList.add('swiped');
                }
                if (touchendX > touchstartX + 50) { // ak je swipe viac ako 50px doprava
                    element.classList.remove('swiped');
                }
            }

            // Pridanie event listenera na delete tlačidlo
            element.querySelector('.delete-btn').addEventListener('click', function () {
                element.remove();
                // Sem môžete pridať AJAX request na odstránenie položky zo servera
            });
        });
    });

</script>
