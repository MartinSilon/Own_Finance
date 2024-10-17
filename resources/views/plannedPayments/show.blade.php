@if($plannedPayments->isNotEmpty())
    <div class="row plannedPaymentsShow mt-5 mx-3">
        @foreach($plannedPayments as $payment)

            <div class="col-12 swipe-container mb-2" >
                <div class="item swipe-item nonBtn">
                    <div class="d-flex align-items-center justify-content-between position-relative">

                        {{-- Obsah karty --}}
                        <form action="{{ route('payExpense', $payment->id) }}" method="post" enctype="multipart/form-data" style="background-color: transparent" class="w-100">
                            @csrf
                            <input type="hidden" name="paid" value="0">
                            <button class="nonBtn w-100 px-3 py-2">
                                <div class="card-body p-0 px-1 py-1 d-flex align-items-center gap-2">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="12" r="10" stroke="#b3baff" stroke-width="1.5"></circle> <path d="M12 8V12L14.5 14.5" stroke="#b3baff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                    <div class="d-flex justify-content-between w-100">
                                        <p class="m-0">{{ $payment->name }}
                                            @if($payment->date)
                                                ( {{ $payment->date . ($notFullDate ?? '') }} )
                                            @endif
                                        </p>
                                        <p class="m-0">{{ $payment->price }} €</p>
                                    </div>
                                </div>
                            </button>
                        </form>

                        {{-- Tlačidlo zmazania --}}
                        <form action="{{ route('expenses.destroy', $payment->id) }}" method="post" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" border-0 delete-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endif
