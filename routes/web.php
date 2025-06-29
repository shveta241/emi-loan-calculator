<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\EmiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmiCalculatorController;

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', function () { return redirect()->route('loan.index'); });
    Route::get('/loan-details', [LoanController::class, 'index'])->name('loan.index');
    Route::get('/emi/process', [EmiController::class, 'processForm'])->name('emi.process.form');
    Route::post('/emi/process', [EmiController::class, 'process'])->name('emi.process');
    Route::get('/emi/calculate', [EmiCalculatorController::class, 'showForm'])->name('emi.calculate.form');
    Route::post('/emi/calculate', [EmiCalculatorController::class, 'calculate'])->name('emi.calculate');


});