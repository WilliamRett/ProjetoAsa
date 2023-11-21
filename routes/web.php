<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(App\Http\Controllers\PaymentController::class)->group(function () {
    Route::prefix('payment')->group(function () {
        Route::post('/new', 'store')->name('payment/new');
        Route::post('/credit/new', 'paymentCredit')->name('payment/credit/new');
        Route::get('/credit', 'credit')->name('payment/credit');
        Route::get('/index', 'index')->name('payment/index');
    });
});

Route::controller(App\Http\Controllers\CustomerController::class)->group(function () {
    Route::prefix('customer')->group(function () {
        Route::post('/new', 'store')->name('customer/new');
        Route::get('/index', 'index')->name('customer/index');
    });
});
