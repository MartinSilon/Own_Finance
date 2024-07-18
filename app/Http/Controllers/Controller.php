<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Note;
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
            ->where('name', 'not like', '%Príjem%')
            ->where('name', 'not like', 'Mesačný príkaz%')
            ->groupBy('name')
            ->orderBy('count', 'desc')
            ->limit(3)
            ->get();
    }

    // ---- AVERAGE SPENDING PER DAY ----
    protected function averagePlus()
    {
        $currentDate = Carbon::now();
        $income = Income::sum('income');
        $paymentsPlus = Payment::where('price', '>', 0)
            ->where('name', 'not like', '%Príjem%')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('price');
        $paymentsMinus = Payment::where('price', '<', 0)
            ->where('name', 'not like', '%Príjem%')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('price');

        $expense = Expense::sum('price');
        $average = ($paymentsPlus + $income - $expense + $paymentsMinus) / $currentDate->daysInMonth;
        return number_format($average, 2);
    }


    // ---- SUM OF MONEY WHICH ARE LEFT ----
    protected function moneyLeft()
    {
        $income = Income::sum('income');
        $expense = Expense::sum('price');
        $moneyLeft = Payment::where('created_at', '>=', Carbon::now()->startOfMonth())
            ->where('name', 'not like', 'Mesačný príkaz%')
            ->where('name', 'not like', 'Príjem%')
            ->sum('price');
        $money = $moneyLeft - $expense + $income;
        return number_format($money, 2);
    }


    // ---- SUM OF MONEY WHICH ARE SPENT ----
    protected function moneySpent()
    {
        return $moneyLeft = Payment::where('created_at', '>=', Carbon::now()->startOfMonth())->where('price', '<=', '0')
            ->sum('price');
    }
    protected function moneyEarned()
    {
        return $moneyEarned = Payment::where('created_at', '>=', Carbon::now()->startOfMonth())->where('price', '>=', '0')
            ->sum('price');
    }


    // ---- GENERATING INDEX ----
    public function index()
    {

        // Payments
        $payments = Payment::where('created_at', '>=', Carbon::now()->startOfWeek())->orderBy('created_at', 'desc')->get();
        $topPayments = $this->mostOftenPayments();
        $saving = Payment::where('name', 'like', 'Konto ->%')->sum('price');

        // Payments
        $banks = Bank::whereNull('payment')->get();

        // Note
        $note = Note::first();

        // Money
        $moneyLeft = $this->moneyLeft();
        $moneySpent = $this->moneySpent();
        $moneyEarned = $this->moneyEarned();

        // Expenses
        $expensesStartDate = Carbon::parse('2024-06-04');
        $expenses = Expense::where('created_at', '>=', $expensesStartDate)->get();
        $expensesSum = Expense::where('created_at', '>=', $expensesStartDate)->sum('price');
        $paidExpensesCount = $this->paidExpenses();
        $allExpensesCount = Expense::count();

        $currentDate = Carbon::now();
        $notFullDate = $currentDate->format('.m.Y');

        // Income
        $income = Income::all();
        $incomeCount = Income::count();
        $incomeSum = Income::sum('income');

        // Average
        $averagePlus = $this->averagePlus();

        return view('home', compact(
            'topPayments', 'moneyLeft', 'expenses', 'expensesSum', 'notFullDate',
            'income', 'incomeCount', 'incomeSum', 'paidExpensesCount', 'allExpensesCount',
            'payments', 'moneySpent', 'moneyEarned', 'saving',
            'banks',
            'averagePlus',
            'note'
        ));
    }

    public function indexCharts()
    {
        return view('chart');
    }

}
