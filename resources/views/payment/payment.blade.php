{{-- ---- NEW PAYMENT  ---- --}}
<div class="container bg-white rounded px-md-5 px-2 py-5 payment shadow mt-2">
    <div class="row justify-content-start">
        <div class="col-md-6 text-center">
            <form action="{{ route("storePayment") }}" method="post" enctype="multipart/form-data">
                @csrf
                <input class="form-control mb-3 date" type="text" name="name" placeholder="Potraviny COOP" value="{{ old('name') }}" required>
                <input class="form-control mb-3 date" type="text" name="price" placeholder="6.50" value="{{ old('price') }}" required>
                <textarea class="form-control mb-3 date" rows="7" type="text" name="note" placeholder="Poznámka k platbe">{{ old('note') }}</textarea>

                <button class="btn w-100 mt-3 text-uppercase" type="submit">Odoslať</button>
            </form>
        </div>
        <div class="col-md-6 d-md-block d-none">
            <h5 class="text-uppercase">Najčastejšie platby:</h5>
            @foreach($topPayments as $payment)
                <div class="lastPayment w-100 rounded card pt-3 pb-1 px-4 mb-3">
                    <h4>{{ $payment['name'] }} <span class="date fs-6">( {{ $payment['count'] }} ) </span></h4>
                    <h6 class="">Spolu tento mesiac:<span class="number"> {{ $payment['total_price'] }}€</span></h6>
                </div>
            @endforeach
        </div>
    </div>
</div>
