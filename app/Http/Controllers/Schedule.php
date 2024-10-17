<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\User;
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
        $users = User::all();

        // TVORENIE PAYMENTOV NA ZAKLADE INCOME DATUMU
        foreach ($users as $user) {
            $income = Income::where('user_id', $user->id)->get();

            foreach ($income as $item) {
                if ($currentDay == $item->date) {
                    Payment::create([
                        'name' => 'Príjem: '.$item->name,
                        'user_id' => $user->id,
                        'price' => $item->income,
                    ]);
                }
            }
        }

        foreach ($users as $user) {
            // TVORENIE PAYMENTOV NA ZAKLADE EXPENSE DATUMU
            $expenses = Expense::whereNull('paid')->where('only_once', false)->where('user_id', $user->id)->get();
            $banks = Bank::where('user_id', $user->id)->get();

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
                        'user_id' => $user->id,
                        'price' => $price,
                    ]);
                }
            }
        }
        return redirect('/');

    }



}
