<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{

    // ---- CREATE AND STORE A NEW PAYMENT ----
    public function store(CreatePaymentRequest $request)
    {
        Payment::create($request->validated());
        return redirect()
            ->route("home");
    }

}
