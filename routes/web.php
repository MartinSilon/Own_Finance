<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\Schedule;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/hourly',[Schedule::class, 'hourly']);
Route::get('/daily',[Schedule::class, 'daily']);
Route::get('/reset',[ExpensesController::class, 'setAllPaidToNull']);

Route::get('/chart', [Controller::class, 'indexCharts']);

Route::middleware(['auth.custom'])->group(function () {
    Route::get('/',[Controller::class, 'index'])->name('home');


    Route::post('/payment/store', [PaymentsController::class, 'store'])->name("storePayment");
    Route::delete('/payment/delete/{payment}', [PaymentsController::class, 'destroy'])->name("deletePayment");
    Route::post('/expense/pay/{expense}', [ExpensesController::class, 'pay'])->name("payExpense");

    Route::get('/bank/{bank}/edit-money',[BankController::class, 'editMoney'])->name("editBankMoney");
    Route::put('/bank/{bank}/update-money',[BankController::class, 'updateBankMoney'])->name("updateBankMoney");

    Route::put('/note/{note}', [NoteController::class, 'update'])->name('updateNote');



    Route::resource('expenses', ExpensesController::class)->only([
        'store', 'edit', 'update', 'destroy'
    ]);

    Route::resource('income', IncomeController::class)->only([
        'store', 'edit', 'update', 'destroy'
    ]);

    Route::resource('bank', BankController::class)->only([
        'store', 'edit', 'update', 'destroy'
    ]);
});

