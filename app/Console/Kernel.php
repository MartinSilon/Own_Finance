<?php

namespace App\Console;

use App\Http\Requests\CreateExpenseRequest;
use App\Models\Bank;
use App\Models\Expense;
use App\Models\Income;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Payment;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {

        // POSIELANIE TRADING KAZDE 2 TYZDNE
        $schedule->call(function () {
            $currentDate = Carbon::now();
            $bank = Bank::where('name', 'Trading 212')->first();
            $expense = Expense::where('name', 'Trading 212')->where('paid', null)->first();

            if ($expense && $bank) {
                // Update the expense's paid date
                $expense->update(['paid' => $currentDate]);

                // Update the bank's money
                $activeMoney = $bank->money;
                $newMoney = $activeMoney + 50;
                $bank->update(['money' => $newMoney]);
            }
         })->everyMinute();
//        })->twiceMonthly(29, '8:50')->saturdays();
    }


    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
