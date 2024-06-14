<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LoginController;


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth.custom'])->group(function () {
    Route::get('/',[Controller::class, 'index'])->name('home');
    Route::get('/reset',[ExpensesController::class, 'setAllPaidToNull']);

    Route::post('/payment/store', [PaymentsController::class, 'store'])->name("storePayment");
    Route::post('/expense/pay/{expense}', [ExpensesController::class, 'pay'])->name("payExpense");

    Route::resource('expenses', ExpensesController::class)->only([
        'store', 'edit', 'update', 'destroy'
    ]);

    Route::resource('income', IncomeController::class)->only([
        'store', 'edit', 'update', 'destroy'
    ]);
});
