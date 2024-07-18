<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Schedule extends Controller
{
    protected function daily()
    {

        $currentDate = Carbon::now();
        $currentDay = $currentDate->day;
        // TVORENIE PAYMENTOV NA ZAKLADE INCOME DATUMU
        $income = Income::all();
        foreach ($income as $item) {
            if ($currentDay == $item->date) {
                Payment::create([
                    'name' => 'Príjem: '.$item->name,
                    'price' => $item->income,
                ]);
            }
        }

        // TVORENIE PAYMENTOV NA ZAKLADE EXPENSE DATUMU
        $expenses = Expense::whereNull('paid')->get();
        $banks = Bank::all();

        foreach ($expenses as $item) {
            if ($currentDay == $item->date) {
                $found = false;
                $bank = null;

                foreach ($banks as $thebank) {
                    if ($thebank->name == $item->name) {
                        $found = true;
                        $bank = $thebank;
                        break;
                    }
                }

                if ($found) {
                    // Update the expense's paid date
                    $item->update(['paid' => $currentDate]);

                    // Update the bank's money
                    $activeMoney = $bank->money;
                    $newMoney = $activeMoney + 50;
                    $bank->update(['money' => $newMoney]);
                }else{
                    $item->update(['paid' => $currentDate]);
                }

                $price = -floatval($item->price);
                Payment::create([
                    'name' => 'Mesačný príkaz: ' . $item->name,
                    'price' => $price,
                ]);
            }
        }

        return redirect('/');

    }

    protected function hourly()
    {
        $currentDate = Carbon::now();
        $currentMonth = $currentDate->month;
        $currentYear = $currentDate->year;

        // RESET EXPENSES
        Expense::whereMonth('paid', '!=', Carbon::now()->month)
            ->orWhereYear('paid', '!=', Carbon::now()->year)
            ->update(['paid' => null]);
    }

}
