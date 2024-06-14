{{-- ---- LIST OF MONTHLY EXPENSES ---- --}}
<div class="spareMoney container bg-white rounded px-md-5 px-2 py-3 mt-1 shadow">
    <div class="row">
        <div class="col-12">
            <h5 class="m-0 text-uppercase mb-2 title">Mesačné výdavky: ({{$paidExpensesCount}}/{{$allExpensesCount}})</h5>
        </div>
    </div>

    {{-- ---- ROW FOR CARDS ---- --}}
    <div class="row">
        @foreach($expenses as $item)
            <form class="col-sm-4 mb-2 {{ $item->paid ? 'd-none d-md-block' : "" }}" action="{{ route('payExpense', $item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="paid" value="0">
                <button type="submit" class="w-100 h-100 nonBtn">
                    <div class="card expense-card text-center pt-3 pb-1 px-4 h-100 {{ $item->paid ? 'active_card' : "" }}">
                        <h3 class="card-title">{{ $item->name }}</h3>
                        <h5 class="number">{{ $item->price }} €</h5>
                        <h6 class="pt-3">
                            {{ $item->paid ? $item->paid : "Nezaplatene" }}
                        </h6>
                    </div>
                </button>
            </form>
        @endforeach
    </div>
</div>
