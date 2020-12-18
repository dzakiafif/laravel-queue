<?php

use App\Http\Controllers\PaymentDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/payment-list',[PaymentDashboardController::class,'index'])->name('payment.list');
Route::get('/payment-create',[PaymentDashboardController::class,'store'])->name('payment.create');
Route::get('/payment-json',[PaymentDashboardController::class,'getData'])->name('payment.data');