<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExpenseRequest;
use App\Models\Bank;
use App\Models\Expense;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{

    // ---- CREATE AND STORE A EXPENSE ----
    public function store(CreateExpenseRequest $request)
    {
        Expense::create($request->validated());
        return redirect()
            ->route("home")
            ->with('confirmMess', "Vytvorili ste nový mesačný príkaz.");
    }


    // ---- GENERATING EDIT SCREEN ----
    public function edit(Expense $expense)
    {
        $allExpenses = Expense::where('user_id', Auth::id())->where('id', '!=', $expense->id)->get();
        return view('expense.edit', compact('expense', 'allExpenses'));
    }


    // ---- EDIT EXPENSE ----
    public function update(CreateExpenseRequest $request, Expense $expense)
    {
        $expense->update($request->validated());
        return redirect()
            ->route("home")
            ->with('confirmMess', "Mesačná platba sa úspešne upravila.");
    }


    // ---- DELETING EXPENSE ----
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()
            ->route('home')
            ->with('confirmMess', 'Mesačná platba bola odstránená.');
    }


    // ---- MAKE EXPENSE PAID ----
    public function pay(Expense $expense, Request $request)
    {
        $incomingFields = $request->validate([
            'paid' => 'required',
        ]);

        $bank = Bank::where('user_id', Auth::id())->where('name', $expense->name)->first();

        if($bank && $expense->name == $bank->name){
            $activeMoney = $bank->money;
            $money = $activeMoney + $expense->price;
            $bank->update(['money' => $money]);
        }

        $incomingFields['paid'] = date('Y-m-d');
        $expense->update($incomingFields);

        //Vytvorenie Platby
        $paymentPrice = -$expense->price;
        Payment::create([
            'name' => 'Mesačný príkaz: ' . $expense->name,
            'price' => $paymentPrice,
            'user_id' => Auth::id(),
        ]);


        return redirect()
            ->route('home');
    }


    // ---- RESET ALL EXPENSES ----
    public function setAllPaidToNull()
    {
        Expense::query()->update(['paid' => null]);

        return redirect()
            ->route('home')
            ->with('confirmMess', 'Všetky záznamy boli aktualizované.');
    }
}
