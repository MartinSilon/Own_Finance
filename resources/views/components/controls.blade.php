<section class="controls d-flex justify-content-between mt-5 mx-3">

    <div class="text-center" data-bs-toggle="modal" data-bs-target="#odoslat">
        <i class="fa-solid fa-arrow-up-long fa-xl" style="color: #ffffff;"></i>
        <p class="text-white mt-4 text-uppercase mb-0">Odoslať</p>
    </div>

    <div class="text-center" data-bs-toggle="modal" data-bs-target="#prijat">
        <i class="fa-solid fa-arrow-down-long fa-xl" style="color: #ffffff;"></i>
        <p class="text-white mt-4 text-uppercase mb-0">Prijať</p>
    </div>

    <div class="text-center" data-bs-toggle="modal" data-bs-target="#bank">
        <i class="fa-solid fa-piggy-bank fa-xl" style="color: #ffffff;"></i>
        <p class="text-white mt-4 text-uppercase mb-0">Sporenie</p>
    </div>

    <div class="text-center" data-bs-toggle="modal" data-bs-target="#plannedPayment">
        <i class="fa-regular fa-clock fa-xl" style="color: #ffffff;"></i>
        <p class="text-white mt-4 text-uppercase mb-0">P. Platba</p>
    </div>

</section>


<section class="controls">
    <!-- Modal for OUT payment-->
    <div class="modal fade" id="odoslat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mx-0">
            <form id="paymentForm" action="{{ route('sentPayment') }}" method="post" enctype="multipart/form-data">

            <div class="modal-content">
                <div class="modal-header border-0 mb-3">
                    <h5 class="w-100 mb-0 mt-2" id="exampleModalLabel">
                        <svg height="25px" class="mb-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12" stroke="#000000" stroke-width="1.5"></path> <path d="M2 14C2 11.1997 2 9.79961 2.54497 8.73005C3.02433 7.78924 3.78924 7.02433 4.73005 6.54497C5.79961 6 7.19974 6 10 6H14C16.8003 6 18.2004 6 19.27 6.54497C20.2108 7.02433 20.9757 7.78924 21.455 8.73005C22 9.79961 22 11.1997 22 14C22 16.8003 22 18.2004 21.455 19.27C20.9757 20.2108 20.2108 20.9757 19.27 21.455C18.2004 22 16.8003 22 14 22H10C7.19974 22 5.79961 22 4.73005 21.455C3.78924 20.9757 3.02433 20.2108 2.54497 19.27C2 18.2004 2 16.8003 2 14Z" stroke="#000000" stroke-width="1.5"></path> <path d="M12 17L12 11M12 11L14.5 13.5M12 11L9.5 13.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        Platba
                    </h5>
                    <button class="rounded" type="button" data-bs-dismiss="modal" aria-label="Close" >
                        <i class="fa-solid fa-xmark fa-xl" style="color: #000000;"></i>
                    </button>
                </div>
                <div class="modal-body " >
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user_id }}">

                    <label class="ms-2">Názov:</label>
                    <input class="form-control mb-3 date" type="text" id="name" name="name" placeholder="" value="{{ old('name') }}" required>

                    <label class="ms-2">Suma:</label>
                    <input class="form-control mb-3 date" type="text" name="price" placeholder="" value="{{ old('price') }}" required>

                    <div class="form-check ms-2">
                        <input class="form-check-input" type="checkbox" name="currency" value="kc" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked" style="margin-top: 3px">
                            Platba v českých korunách
                        </label>
                    </div>
                </div>
                <div class="modal-footer border-0 justify-content-center mb-5 pb-5">
                    <button type="submit" class="text-uppercase btn d-flex align-items-center gap-2 py-2 px-3">
                        <svg height="25px" class="mb-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12" stroke="#000000" stroke-width="1.5"></path> <path d="M2 14C2 11.1997 2 9.79961 2.54497 8.73005C3.02433 7.78924 3.78924 7.02433 4.73005 6.54497C5.79961 6 7.19974 6 10 6H14C16.8003 6 18.2004 6 19.27 6.54497C20.2108 7.02433 20.9757 7.78924 21.455 8.73005C22 9.79961 22 11.1997 22 14C22 16.8003 22 18.2004 21.455 19.27C20.9757 20.2108 20.2108 20.9757 19.27 21.455C18.2004 22 16.8003 22 14 22H10C7.19974 22 5.79961 22 4.73005 21.455C3.78924 20.9757 3.02433 20.2108 2.54497 19.27C2 18.2004 2 16.8003 2 14Z" stroke="#000000" stroke-width="1.5"></path> <path d="M12 17L12 11M12 11L14.5 13.5M12 11L9.5 13.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        <span class="">Zaplatiť</span>
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Modal for OUT payment-->
    <div class="modal fade" id="prijat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mx-0">
            <form id="paymentForm" action="{{ route('recievePayment') }}" method="post" enctype="multipart/form-data">

                <div class="modal-content">
                    <div class="modal-header border-0 mb-3">
                        <h5 class="w-100 mb-0 mt-2" id="exampleModalLabel">
                            <svg height="25px" class="mb-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12" stroke="#000000" stroke-width="1.5"></path> <path d="M2 14C2 11.1997 2 9.79961 2.54497 8.73005C3.02433 7.78924 3.78924 7.02433 4.73005 6.54497C5.79961 6 7.19974 6 10 6H14C16.8003 6 18.2004 6 19.27 6.54497C20.2108 7.02433 20.9757 7.78924 21.455 8.73005C22 9.79961 22 11.1997 22 14C22 16.8003 22 18.2004 21.455 19.27C20.9757 20.2108 20.2108 20.9757 19.27 21.455C18.2004 22 16.8003 22 14 22H10C7.19974 22 5.79961 22 4.73005 21.455C3.78924 20.9757 3.02433 20.2108 2.54497 19.27C2 18.2004 2 16.8003 2 14Z" stroke="#000000" stroke-width="1.5"></path> <path d="M12 11L12 17M12 17L14.5 14.5M12 17L9.5 14.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            Platba
                        </h5>
                        <button class="rounded" type="button" data-bs-dismiss="modal" aria-label="Close" >
                            <i class="fa-solid fa-xmark fa-xl" style="color: #000000;"></i>
                        </button>
                    </div>
                    <div class="modal-body " >
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id }}">

                        <label class="ms-2">Názov:</label>
                        <input class="form-control mb-3 date" type="text" id="name" name="name" placeholder="" value="{{ old('name') }}" required>

                        <label class="ms-2">Suma:</label>
                        <input class="form-control mb-3 date" type="text" name="price" placeholder="" value="{{ old('price') }}" required>

                    </div>
                    <div class="modal-footer border-0 justify-content-center mb-5 pb-5">
                        <button type="submit" class="text-uppercase btn d-flex align-items-center gap-2 py-2 px-3">
                            <svg height="25px" class="mb-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12" stroke="#000000" stroke-width="1.5"></path> <path d="M2 14C2 11.1997 2 9.79961 2.54497 8.73005C3.02433 7.78924 3.78924 7.02433 4.73005 6.54497C5.79961 6 7.19974 6 10 6H14C16.8003 6 18.2004 6 19.27 6.54497C20.2108 7.02433 20.9757 7.78924 21.455 8.73005C22 9.79961 22 11.1997 22 14C22 16.8003 22 18.2004 21.455 19.27C20.9757 20.2108 20.2108 20.9757 19.27 21.455C18.2004 22 16.8003 22 14 22H10C7.19974 22 5.79961 22 4.73005 21.455C3.78924 20.9757 3.02433 20.2108 2.54497 19.27C2 18.2004 2 16.8003 2 14Z" stroke="#000000" stroke-width="1.5"></path> <path d="M12 11L12 17M12 17L14.5 14.5M12 17L9.5 14.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            <span>Prijať</span>

                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Modal for PlannedPayment-->
    <div class="modal fade" id="plannedPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mx-0">
            <form action="{{ route('expenses.store') }}" method="post" enctype="multipart/form-data">

                <div class="modal-content">
                    <div class="modal-header border-0 mb-3">
                        <h5 class="w-100 mb-2 mt-3" id="exampleModalLabel">
                            <i class="fa-regular fa-clock" style="color: #000000;"></i>
                            Plánovaná platba
                        </h5>
                        <button class="rounded" type="button" data-bs-dismiss="modal" aria-label="Close" >
                            <i class="fa-solid fa-xmark fa-xl" style="color: #000000;"></i>
                        </button>
                    </div>
                    <div class="modal-body " >
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <input type="hidden" name="only_once" value="1">

                        <input class="form-control mb-3 date" type="text" name="name" placeholder="Netflix" value="{{ old('name') }}" required>

                        <div class="form-group d-flex gap-2">
                            <div class="w-100">
                                <label class="ms-2">Cena:</label>
                                <input class="form-control" type="text" name="price" placeholder="8.99" value="{{ old('price') }}" required>
                            </div>
                            <div class="w-100">
                                <label class="ms-2">Deň v mesiaci:</label>
                                <input class="form-control " type="number" name="date" value="null" min="0" max="30" placeholder="10">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 justify-content-center mb-5 pb-5">
                        <button type="submit" class="text-uppercase btn d-flex align-items-center gap-2 py-2 px-3">
                            <i class="fa-thin fa-plus"></i>
                            <span class="">Vytvoriť</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>
