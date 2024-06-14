{{-- ---- RECENT PAYMENTS ---- --}}
<div class="spareMoney container bg-white rounded px-md-5 px-2 py-3 mt-1 shadow">
    <div class="row">
        <div class="col-12">
            <h5 class="m-0 text-uppercase mb-2 title">Posledné platby:</h5>
        </div>
    </div>

    {{-- ---- ROW FOR CARDS ---- --}}
    <div class="row">
        @foreach($payments as $item)
            <div class="col-12">
                <div class="card mb-2">
                    <div class="card-header">
                        <h6 class="m-0">{{ \Carbon\Carbon::parse($item->created_at)->format('j.n.Y') }}</h6>
                    </div>
                    <div class="card-body p-0 px-3 py-1">
                        <h5 class="text-danger">{{ $item->name }}</h5>
                        <h6 class="">Suma: {{ $item->price }} €</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
