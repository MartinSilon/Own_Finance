
{{-- ---- DETAILS ---- --}}
<section id="home" class="">
    @include('components/spareMoney')

    <div class="container details d-flex justify-content-center">

{{--        <div class="box d-flex justify-content-center align-items-center gap-3 active">--}}
{{--            <div class="icon d-flex justify-content-center align-items-center rounded-circle p-3">--}}
{{--                <i class="fa-solid fa-hippo fa-xl" style="color: #b3baff;"></i>--}}
{{--            </div>--}}
{{--            <h5 class="m-0">--}}
{{--                <span class="pink" id="dynamic-text ">{{ $averagePlus > 0 ? '+' : '' }}{{ $averagePlus }} €</span> / deň--}}
{{--            </h5>--}}
{{--        </div>--}}

        <div class="box d-flex justify-content-center align-items-center gap-3 active">
            <div class="icon d-flex justify-content-center align-items-center rounded-circle p-3">
                <i class="fa-solid fa-face-smile-beam fa-xl" style="color: #b3baff;"></i>
            </div>
            <h5 class="m-0">
                <span class="pink" id="dynamic-text">+{{ $incomeSum }} €</span> / mesiac
            </h5>
        </div>

        <div class="box d-flex justify-content-center align-items-center gap-3 ">
            <div class="icon d-flex justify-content-center align-items-center rounded-circle p-3">
                <i class="fa-solid fa-fire fa-xl" style="color: #b3baff;"></i>
            </div>
            <h5 class="m-0">
                <span class="pink" id="dynamic-text">-{{ $expensesSum}} €</span> / mesiac
            </h5>
        </div>

    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const boxes = document.querySelectorAll('.box');
        let currentIndex = 0;

        setInterval(() => {
            boxes[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % boxes.length;
            boxes[currentIndex].classList.add('active');
        }, 5000);
    });
</script>
