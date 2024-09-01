{{-- ---- SAVE ACCOUNTS FOR MD---- --}}
@if($banks->isNotEmpty())
<div class="controls">
    <div class="modal" id="bank" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg m-0 h-100">
            <div class="modal-content h-100">
                <div class="modal-header border-0">
                    <h4 class="w-100 pink mt-4" id="exampleModalLabel">

                    </h4>
                    <button class="rounded" type="button" data-bs-dismiss="modal" aria-label="Close" >
                        <i class="fa-solid fa-xmark fa-xl" style="color: #000000;"></i>
                    </button>
                </div>
                <div class="modal-body pt-0 mx-2" >
                    <div class="row align-items-center justify-content-center d-flex">
                        @foreach($banks as $item)
                            <a href="{{ route('editBankMoney', $item->id) }}" class="col-md-6 col-12 p-0 px-1 py-1 mb-2">
                                <div class="w-100 rounded p-3 d-flex justify-content-between align-items-center">
                                    <h6 class="text-uppercase">
                                        @if($item->goal < $item->money)
                                            <svg height="25px" class="mb-2 me-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 16.0909V11.0975C21 6.80891 21 4.6646 19.682 3.3323C18.364 2 16.2426 2 12 2C7.75736 2 5.63604 2 4.31802 3.3323C3 4.6646 3 6.80891 3 11.0975V16.0909C3 19.1875 3 20.7358 3.73411 21.4123C4.08421 21.735 4.52615 21.9377 4.99692 21.9915C5.98402 22.1045 7.13673 21.0849 9.44216 19.0458C10.4612 18.1445 10.9708 17.6938 11.5603 17.5751C11.8506 17.5166 12.1494 17.5166 12.4397 17.5751C13.0292 17.6938 13.5388 18.1445 14.5578 19.0458C16.8633 21.0849 18.016 22.1045 19.0031 21.9915C19.4739 21.9377 19.9158 21.735 20.2659 21.4123C21 20.7358 21 19.1875 21 16.0909Z" stroke="#ffffff" stroke-width="1.5"></path> <path d="M15 6H9" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                        @else
                                            <svg height="25px" class="mb-2 me-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M21 11.0975V16.0909C21 19.1875 21 20.7358 20.2659 21.4123C19.9158 21.735 19.4739 21.9377 19.0031 21.9915C18.016 22.1045 16.8633 21.0849 14.5578 19.0458C13.5388 18.1445 13.0292 17.6938 12.4397 17.5751C12.1494 17.5166 11.8506 17.5166 11.5603 17.5751C10.9708 17.6938 10.4612 18.1445 9.44216 19.0458C7.13673 21.0849 5.98402 22.1045 4.99692 21.9915C4.52615 21.9377 4.08421 21.735 3.73411 21.4123C3 20.7358 3 19.1875 3 16.0909V11.0975C3 6.80891 3 4.6646 4.31802 3.3323C5.63604 2 7.75736 2 12 2C16.2426 2 18.364 2 19.682 3.3323C21 4.6646 21 6.80891 21 11.0975ZM8.25 6C8.25 5.58579 8.58579 5.25 9 5.25H15C15.4142 5.25 15.75 5.58579 15.75 6C15.75 6.41421 15.4142 6.75 15 6.75H9C8.58579 6.75 8.25 6.41421 8.25 6Z" fill="#ffffff"></path> </g></svg>
                                        @endif

                                        {{ $item->name }}
                                    </h6>
                                    <h4 class="">{{ $item->money !== NULL ? $item->money : '0.00' }} €</h4>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endif







