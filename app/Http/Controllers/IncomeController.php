<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIncomeRequest;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{

    // ---- CREATE AND STORE A NEW INCOME ----
    public function store(CreateIncomeRequest $request)
    {
        Income::create($request->validated());
        return redirect()
            ->route("home")
            ->with('confirmMess', "Zdroj sa úspešne zadal do systému.");
    }


    // ---- GENERATING EDIT SCREEN ----
    public function edit(Income $income)
    {
        $allIncome = Income::where('id', '!=', $income->id)->get();
        return view('income.edit', compact('income', 'allIncome'));
    }


    // ---- EDIT INCOME ----
    public function update(CreateIncomeRequest $request, Income $income)
    {
        $income->update($request->validated());
        return redirect()
            ->route("home")
            ->with('confirmMess', "Príjem sa úspešne upravil.");
    }


    // ---- DELETING INCOME ----
    public function destroy(Income $income)
    {
        $income->delete();
        return redirect()
            ->route('home')
            ->with('confirmMess', 'Príjem bol úspešne odstránený.');
    }
}
