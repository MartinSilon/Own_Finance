 <div class="row paymentsShow mt-5 mx-3">
        @if($payments->isNotEmpty())
            @foreach($payments as $item)

                <div class="col-12 swipe-container">
                    <div class="item mb-2 swipe-item">
                        <div class="d-flex align-items-center justify-content-between position-relative">

                            {{-- Obsah karty --}}
                            <div class="card-content w-100">
                                <div class="card-body p-0 px-3 py-1">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5>{{ $item->name }}</h5>
                                        <h6 class="m-0">{{ \Carbon\Carbon::parse($item->created_at)->format('j.n.Y') }}</h6>

                                    </div>
                                    <h6 class="">
                                        <span class=" {{ $item->price > 0 ? 'pink' : 'pink' }}">
                                            {{ $item->price }} €
                                        </span>
                                    </h6>
                                </div>
                            </div>

                            {{-- Tlačidlo zmazania --}}
                            <form action="{{ route('deletePayment', $item->id) }}" method="post" class="d-inline delete-form">
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
        @else
            <div class="item py-4">
                <p class="text-center">Tento týždeň neprebehli žiadne platby.</p>
            </div>

        @endif

    </div>

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
