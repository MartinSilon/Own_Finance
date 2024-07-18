{{-- ---- SAVE ACCOUNTS FOR MD---- --}}
<div class="spareMoney container rounded px-md-5 px-md-2 py-md-3 py-1 my-2 px-3 shadow d-none d-md-block" id="sumBanks">
    <div class="row d-none d-md-flex">
        <div class="col-12">
            <h5 class="m-0 text-uppercase mb-2 text-center">Sporenie</h5>
        </div>
    </div>

    {{-- ----  ---- --}}
    <div class="row align-items-center justify-content-center d-flex">
        @foreach($banks as $item)
            <a href="{{ route('editBankMoney', $item->id) }}" class="col-md-3 col-6 p-0 px-1 py-1">
                <div class="w-100 rounded card p-3">
                    <h5 class="m-0 text-uppercase text-center">{{ $item->name }}</h5>
                    <h2 class="my-2 text-center"><span>{{ $item->money !== NULL ? $item->money : '0.00' }} €</span></h2>
                </div>
            </a>
        @endforeach
    </div>
</div>

{{-- ---- SAVE ACCOUNTS FOR SM ---- --}}
<div class="spareMoney container rounded px-0 mt-1 shadow d-md-none d-block" id="sumBanks">
    <div class="row d-none d-md-flex">
        <div class="col-12">
            <h5 class="m-0 text-uppercase mb-2 text-center">Sporenie</h5>
        </div>
    </div>

    <div class="accordion" id="banksAccordion">
        @foreach($banks as $index => $item)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $index }}">
                    <button class="accordion-button py-3 fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                        {{ $item->name }}
                    </button>
                </h2>
                <div id="collapse{{ $index }}" class="accordion-collapse collapse " aria-labelledby="heading{{ $index }}" data-bs-parent="#banksAccordion">
                    <div class="accordion-body">
                        <a href="{{ route('editBankMoney', $item->id) }}" class="text-decoration-none">
                            <h2 class="my-2 text-center"><span>{{ $item->money !== NULL ? $item->money : '0.00' }} €</span></h2>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>





