<?php

use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/home',[HomeController::class,'index']);

Route::prefix('payments')->group(function() {
   Route::get('/',[PaymentController::class,'index']);
   Route::post('/',[PaymentController::class,'store'])->name('post.data');
   Route::delete('/delete',[PaymentController::class,'destroy'])->name('delete.data');
});
