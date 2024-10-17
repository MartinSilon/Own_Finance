<div class="row paymentsShow my-5 mx-3">
    <div class="col-12">
        <h5 class="pink text-center">
            <i class="fa-solid fa-burger pe-2"></i>
            STRAVA
            <i class="fa-solid fa-burger ps-2"></i>
        </h5>
        <div class="item mb-2 swipe-item py-3 px-3 text-center">
            <h5 class="m-0">

                {{ $paymentsLimit * (-25)  }} / {{$foodLimitKC}} kč
                @if( $paymentsLimit * (-25) > 1250)
                   <span class="pink">( - {{ $paymentsLimit * (-25) - $foodLimit }} kč)</span>
                @endif
            </h5>
        </div>
    </div>

</div>
