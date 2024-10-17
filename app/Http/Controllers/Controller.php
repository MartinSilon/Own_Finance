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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    // ---- GET 3 MOST OFTEN PAYMENTS ----
    protected function mostOftenPayments()
    {
        return $topPayments = Payment::select('name', DB::raw('count(*) as count'), DB::raw('sum(price) as total_price'))
            ->where('user_id', Auth::id())
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->where('name', 'not like', '%Príjem%')
            ->where('name', 'not like', 'Mesačný príkaz%')
            ->groupBy('name')
            ->orderBy('count', 'desc')
            ->limit(3)
            ->get();
    }


    // ---- SUM OF MONEY WHICH ARE LEFT ----
    protected function moneyLeft()
    {
        $income = Income::where('user_id', Auth::id())->sum('income');

        $payments = Payment::where('user_id', Auth::id())
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->where('name', 'not like', 'Mesačný príkaz%')
            ->where('name', 'not like', 'Príjem%')
            ->sum('price');

        $expense = Expense::where('user_id', Auth::id())
            ->where('only_once' , false)
            ->sum('price');

        $plannedPayments = Expense::where('user_id', Auth::id())
            ->where('only_once', true)
            ->whereNull('paid')
            ->sum('price');

        $money = $income - $expense + $payments - $plannedPayments; // -za jedlo
        return number_format($money, 2);
    }



    // ---- SUM OF MONEY WHICH ARE SPENT ----
    protected function moneySpent()
    {
        return $moneyLeft = Payment::where('user_id', Auth::id())
            ->where('created_at', '>=', Carbon::now()
                ->startOfMonth())->where('price', '<=', '0')
            ->sum('price');
    }
    protected function moneyEarned()
    {
        return $moneyEarned = Payment::where('user_id', Auth::id())
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->where('price', '>=', '0')
            ->sum('price');
    }


    // ---- GENERATING INDEX ----
    public function index()
    {
        $user_id = Auth::id();
        $currentDate = Carbon::now();
        $notFullDate = $currentDate->format('.m.Y');

        // Payments
        $payments = Payment::where('user_id', Auth::id())->where('created_at', '>=', Carbon::now()->startOfMonth())->orderBy('created_at', 'desc')->get();
        $paymentsLimit = Payment::where('user_id', Auth::id())->where('name', 'Jedlo')->where('created_at', '>=', Carbon::now()->startOfMonth())->sum('price');

        // Payments
        $banks = Bank::where('user_id', Auth::id())->whereNull('payment')->get();

        // Money
        $moneyLeft = $this->moneyLeft();
        $moneySpent = $this->moneySpent();
        $moneyEarned = $this->moneyEarned();

        // Expenses
        $expensesStartDate = Carbon::now()->startOfMonth();
        $expensesSum = Expense::where('user_id', Auth::id())->where('only_once' , false)->sum('price');

        $expenses = Expense::where('user_id', Auth::id())
            ->where('only_once', false)
            ->orderBy('paid', 'asc')
            ->get();

        // PlannedOrder
        $plannedPayments = Expense::where('user_id', Auth::id())->where('only_once', true)->whereNull('paid')->get();

        // Income
        $incomeSum = Income::where('user_id', Auth::id())->sum('income');


        return view('home', compact(
            'moneyLeft',  'incomeSum', 'expensesSum',
            'moneySpent', 'moneyEarned',
            'plannedPayments',  'expenses', 'paymentsLimit',
            'payments', 'banks',
            'notFullDate', 'user_id',
        ));
    }

    public function settings()
    {
        $user_id = Auth::id();

        // Payments
        $banks = Bank::where('user_id', Auth::id())->whereNull('payment')->get();

        // Expenses
        $expenses = Expense::where('user_id', Auth::id())->where('only_once', false)->get();

        // Income
        $income = Income::where('user_id', Auth::id())->get();

        $user_id = Auth::id();

        return view('settings', compact(
            'expenses',
            'income',
            'banks', 'user_id'

        ));
    }

    public function indexCharts()
    {
        return view('chart');
    }

}
