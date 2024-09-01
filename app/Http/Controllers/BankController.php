<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBankRequest;
use App\Http\Requests\CreateIncomeRequest;
use App\Models\Bank;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{

    // ---- CREATE AND STORE A NEW BANK ----
    public function store(CreateBankRequest $request,)
    {
        Bank::create($request->validated());
        return redirect()
            ->route("home")
            ->with('confirmMess', "Pridali ste banku do zoznamu.");
    }


    // ---- UPDATE BANK ----
    public function update(Request $request, Bank $bank)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'goal'=>'',
        ], [
            'name.required' => "Meno nie je zadané.",
            'name.numeric' => "Meno je v zlom formáte.",
        ]);
        $bank->update($data);

        return redirect()
            ->route('home');
    }


    // ---- UPDATE MONEY AND CREATE A PAYMENT ----
    public function updateBankMoney(Request $request, Bank $bank)
    {
        $data = $request->validate([
            'money' => 'nullable|numeric',
            'note'=>'',
        ], [
            'money.numeric' => "Suma je v zlom formáte.",
        ]);
        // ak su vyplnene peniaze
        if (isset($data['money'])) {
            $paymentMoney = $data['money'];
            $activeMoney = $bank->money;
            $money = $activeMoney + $data['money'];
            $data['money'] = $money;

            if($bank->update($data)){
                Bank::create([
                    'name' => $bank->name,
                    'money' => $paymentMoney,
                    'payment' => true,
                    'user_id' => Auth::id(),
                ]);
            }
        }
        // ak je vyplnene note
        if (isset($data['note'])) {
            $bank->update([
                'note' => $data['note'],
            ]);
        }

        return redirect()
            ->route('home');
    }


    // ---- GENERATING EDIT SCREEN ----
    public function edit(Bank $bank)
    {
        
        $banks = Bank::where('user_id', Auth::id())
            ->where('id', '!=', $bank->id)
            ->whereNull('payment')
            ->get();

        return view('bank.edit', compact('bank', 'banks'));
    }


    // ---- GENERATING EDIT-MONEY SCREEN ----
    public function editMoney(Bank $bank)
    {
        if (!is_null($bank->goal) && !is_null($bank->money)) {
            $goal = $bank->goal - $bank->money;
            if($goal < 0){
                $goal = null;
            }
        } else {
            $goal = null;
        }

        $payments = Bank::whereNotNull('payment')
            ->where('user_id', Auth::id())
            ->where('name', $bank->name)
            ->orderBy('created_at', 'desc')
            ->get();
        $user_id = Auth::id();
        return view('bank.edit-money', compact('bank', 'payments', 'goal', 'user_id'));
    }


    // ---- DELETING BANK ----
    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()
            ->route('home')
            ->with('confirmMess', 'Banka bola úspešne odstránená.');
    }
}
