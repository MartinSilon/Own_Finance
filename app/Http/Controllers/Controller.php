<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use App\Models\Payment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // ---- COUNT PAID EXPENSES ----
    protected function paidExpenses()
    {
        return $paidExpensesCount = Expense::whereNotNull('paid')->count('name');
    }


    // ---- GET 3 MOST OFTEN PAYMENTS ----
    protected function mostOftenPayments()
    {
        return $topPayments = Payment::select('name', DB::raw('count(*) as count'), DB::raw('sum(price) as total_price'))
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->groupBy('name')
            ->orderBy('count', 'desc')
            ->limit(3)
            ->get();
    }


    // ---- SUM OF MONEY WHICH ARE LEFT ----
    protected function moneyLeft()
    {
        $income = Income::sum('income');
        $expense = Expense::sum('price');
        $moneyLeft = Payment::where('created_at', '>=', Carbon::now()->startOfMonth())
            ->sum('price');
        return $income - $moneyLeft - $expense;
    }


    // ---- SUM OF MONEY WHICH ARE SPENT ----
    protected function moneySpent()
    {
        return $moneyLeft = Payment::where('created_at', '>=', Carbon::now()->startOfMonth())
            ->sum('price');
    }


    // ---- GENERATING INDEX ----
    public function index()
    {
        // Payments
        $payments = Payment::where('created_at', '>=', Carbon::now()->startOfMonth())->get();
        $topPayments = $this->mostOftenPayments();

        // Money
        $moneyLeft = $this->moneyLeft();
        $moneySpent = $this->moneySpent();

        // Expenses
        $expensesStartDate = Carbon::parse('2024-06-04');
        $expenses = Expense::where('created_at', '>=', $expensesStartDate)->get();
        $expensesSum = Expense::where('created_at', '>=', $expensesStartDate)->sum('price');
        $paidExpensesCount = $this->paidExpenses();
        $allExpensesCount = Expense::count();

        // Income
        $income = Income::all();
        $incomeCount = Income::count();
        $incomeSum = Income::sum('income');

        return view('home', compact(
            'topPayments', 'moneyLeft', 'expenses', 'expensesSum',
            'income', 'incomeCount', 'incomeSum', 'paidExpensesCount', 'allExpensesCount',
            'payments', 'moneySpent'
        ));
    }

}
