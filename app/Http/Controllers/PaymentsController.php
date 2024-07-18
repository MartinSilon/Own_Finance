<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentRequest;
use App\Models\Bank;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{

    // ---- CREATE AND STORE A NEW PAYMENT ----
    public function store(CreatePaymentRequest $request)
    {
        $validatedData = $request->validated();

        if (strpos($validatedData['price'], '+') !== false) {
            $this->attributes['price'] = floatval($validatedData['price']);
        } else {
            $validatedData['price'] = -abs(floatval($validatedData['price']));
        }

        $banks = Bank::all();
        $bankFound = false;
        foreach ($banks as $bank) {
            if ($validatedData['name'] == $bank->name) {
                $activeMoney = $bank->money;

                //Vytvorenie prevodu do banky (priratanie do banky)
                $money = $activeMoney + $validatedData['price'];
                $data['money'] = $money;
                $bank->update($data);

                Bank::create([
                    'name' => $bank->name,
                    'money' => $validatedData['price'],
                    'payment' => true,
                ]);

                //Vytvorenie prevodu z učtu (odratanie od účtu)
                $validatedData['price'] = -floatval($validatedData['price']);

                if($validatedData['price'] < 0){

                    $validatedData['name'] = 'Konto -> '.$bank->name;

                }elseif ($validatedData['price'] > 0){

                    $validatedData['name'] = $bank->name. ' -> Konto';
                }

                Payment::create($validatedData);

                $bankFound = true;
                break;
            }
        }
        if (!$bankFound) {
            Payment::create($validatedData);
        }

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
