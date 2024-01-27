<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserInformationController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LendController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    /*User Information Route*/
    Route::get('/users',[UserInformationController::class,'index'])->name('users.index');
    Route::get('/users/create',[UserInformationController::class,'create'])->name('users.create');
    Route::post('/users/store',[UserInformationController::class,'store'])->name('users.store');
    Route::get('/users/edit/{id}',[UserInformationController::class,'edit'])->name('users.edit');
    Route::put('/users/{id}',[UserInformationController::class,'update'])->name('users.update');
    Route::post('/users/delete/{id}',[UserInformationController::class,'destroy'])->name('users.delete');

    /*Income Route*/
    Route::get('/income',[IncomeController::class,'index'])->name('income.index');
    Route::get('/income/create',[IncomeController::class,'create'])->name('income.create');
    Route::post('/income/store',[IncomeController::class,'store'])->name('income.store');
    Route::get('/income/edit/{id}',[IncomeController::class,'edit'])->name('income.edit');
    Route::put('/income/{id}',[IncomeController::class,'update'])->name('income.update');
    Route::post('/income/delete/{id}',[IncomeController::class,'destroy'])->name('income.delete');

    /*Expense Route*/
    Route::get('/expense',[ExpenseController::class,'index'])->name('expense.index');
    Route::get('/expense/create',[ExpenseController::class,'create'])->name('expense.create');
    Route::post('/expense/store',[ExpenseController::class,'store'])->name('expense.store');
    Route::get('/expense/edit/{id}',[ExpenseController::class,'edit'])->name('expense.edit');
    Route::put('/expense/{id}',[ExpenseController::class,'update'])->name('expense.update');
    Route::post('/expense/delete/{id}',[ExpenseController::class,'destroy'])->name('expense.delete');

    /*Lends Route*/
    Route::get('/lend',[LendController::class,'index'])->name('lend.index');
    Route::get('/lend/create',[LendController::class,'create'])->name('lend.create');
    Route::post('/lend/store',[LendController::class,'store'])->name('lend.store');
    Route::get('/lend/edit/{id}',[LendController::class,'edit'])->name('lend.edit');
    Route::put('/lend/{id}',[LendController::class,'update'])->name('lend.update');
    Route::post('/lend/delete/{id}',[LendController::class,'destroy'])->name('lend.delete');
    /*Report Route*/
    Route::get('/report',[ReportController::class,'index'])->name('report.index');
});

