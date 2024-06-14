<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Expense;

class UpdateExpenses extends Command
{
    protected $signature = 'expenses:update';
    protected $description = 'Update expenses at the start of each month';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Expense::query()->update(['paid' => null]);
        $this->info('Expenses updated successfully.');
    }
}
