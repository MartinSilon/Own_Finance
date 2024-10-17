<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\Schedule;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TipsAndTricksController;

Route::get('/hourly', [Schedule::class, 'hourly']);
Route::get('/daily', [Schedule::class, 'daily']);

Route::get('/web', function (){ return view('blickling/home'); });

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegisterForm']);
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/chart', [Controller::class, 'indexCharts']);

});

Route::get('/superadmin', [TipsAndTricksController::class, 'superadmin'])->name('superadmin');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/reset', [ExpensesController::class, 'setAllPaidToNull']);

    Route::get('/',[Controller::class, 'index'])->name('home');
    Route::get('/home',[Controller::class, 'index']);
    Route::get('/settings',[Controller::class, 'settings'])->name('settings');

    Route::post('/payment/sent', [PaymentsController::class, 'sent'])->name("sentPayment");
    Route::post('/payment/recieve', [PaymentsController::class, 'recieve'])->name("recievePayment");

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

    Route::resource('tips', TipsAndTricksController::class)->only([
        'store', 'edit', 'update', 'destroy'
    ]);

});

