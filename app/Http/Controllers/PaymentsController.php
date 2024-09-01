<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentRequest;
use App\Models\Bank;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{

    // ---- CREATE AND STORE A NEW PAYMENT ----
    public function sent(CreatePaymentRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['price'] = -$validatedData['price'];

        Payment::create($validatedData);

        return redirect()
            ->route("home");
    }

    public function recieve(CreatePaymentRequest $request)
    {
        $validatedData = $request->validated();
        Payment::create($validatedData);

        return redirect()
            ->route("home");
    }


    // ---- DELETING PAYMENT ----
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()
            ->route('home')
            ->with('confirmMess', 'Platba bola odstránená.');
    }

}
