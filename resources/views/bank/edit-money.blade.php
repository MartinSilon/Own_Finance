@extends('components.head')

@section('body')
    @include('components/nav')
    <section id="home" class="pt-1 formulars">

        <div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-12 w-100">
                    {{-- ---- LIST OF SAVE ACCOUNTS ---- --}}
                    <div class="container rounded px-md-5 px-2 py-3 mt-1 shadow">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="m-0 text-uppercase mb-2 title text-center text-white">Úspory spolu:</h5>
                                <h1 class="text-center text-white">{{ $bank->money !== NULL ? $bank->money : '0.00' }} €</h1>
                                @if($goal != NULL)
                                    <h5 class="text-center ">ostáva ešte <span class="" style="color: green">{{ $goal }} €</span></h5>
                                @endif

                            </div>
                        </div>
                    </div>

                    {{-- ---- LIST OF SAVE ACCOUNTS ---- --}}
                    <div class="container rounded px-md-5 px-2 py-3 mt-1 shadow">

                        {{-- ---- ROW FOR FORM---- --}}
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <h5 class="text-white text-uppercase mb-2 text-center">Pridať / Minúť financie:</h5>

                                {{-- FORM --}}
                                <form action="{{ route('updateBankMoney', $bank->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                                    <input type="hidden" name="name" value="{{ $bank->name }}">
                                    <input class="form-control mb-4" type="number" name="money" placeholder="+120" value="{{ old('money') }}" required>

                                    <button class="btn w-100 text-uppercase" type="submit">Odoslať</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- ---- ADD NOTE TO BANK ---- --}}
                    <div class="container rounded px-md-5 px-2 py-3 mt-1 shadow">

                        {{-- ---- ROW FOR FORM---- --}}
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <h5 class="text-white text-uppercase mb-2 text-center">Poznámky k banke:</h5>

                                {{-- FORM --}}
                                <form action="{{ route('updateBankMoney', $bank->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <textarea class="form-control mb-4" name="note" rows="10" class="w-100">{{ $bank->note }}</textarea>
                                    <button class="btn w-100 text-uppercase" type="submit">Upraviť</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- ---- ADD NOTE TO BANK ---- --}}
                    <div class="container rounded px-md-5 px-2 py-3 mt-1 shadow paymentsShow">

                        {{-- ---- ROW FOR FORM---- --}}
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-uppercase mb-2 text-center text-white">Platby:</h5>
                            </div>
                            @if($payments->isNotEmpty())
                                @foreach($payments as $item)
                                    <div class="col-12 swipe-container ">
                                        <div class="card mb-2 swipe-item item">
                                            <div class="d-flex align-items-center justify-content-between position-relative">

                                                {{-- Obsah karty --}}
                                                <div class="card-content w-100">
                                                    <div class="card-header">
                                                        <h6 class="m-0">{{ \Carbon\Carbon::parse($item->created_at)->format('j.n.Y') }}</h6>
                                                    </div>
                                                    <div class="card-body p-0 px-3 py-1">
                                                        <h5 class="mt-2 {{ $item->money > 0 ? 'text-success' : 'text-danger' }}">
                                                            {{ $item->money }} €
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @else
                                <p class="fs-5 text-center">Tento mesiac neprebehli žiadne platby.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        let startX;
        let currentX;
        let threshold = 100; // Minimálna vzdialenosť pre swipe
        let swipeItems = document.querySelectorAll('.swipe-item');

        swipeItems.forEach(function(swipeItem) {
            swipeItem.addEventListener('touchstart', function (e) {
                startX = e.touches[0].pageX;
                currentX = startX;
            });

            swipeItem.addEventListener('touchmove', function (e) {
                currentX = e.touches[0].pageX;
                let deltaX = currentX - startX;
                if (deltaX < 0) { // Swipe doľava
                    swipeItem.style.transform = `translateX(${deltaX}px)`;
                }
            });

            swipeItem.addEventListener('touchend', function (e) {
                let deltaX = currentX - startX;
                if (deltaX < -threshold) {
                    swipeItem.classList.add('swiped');
                    swipeItem.style.transform = `translateX(-50px)`;
                } else {
                    swipeItem.classList.remove('swiped');
                    swipeItem.style.transform = `translateX(0)`;
                }
            });
        });
    });

</script>
