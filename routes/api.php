<?php

use App\Http\Controllers\HeroController;
use App\Http\Controllers\ZakatController;
use App\Http\Controllers\CampignController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaymentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/zakatAjax', ZakatController::class);
Route::resource('/campignAjax', CampignController::class);
Route::post('/messageAjax', [MessageController::class, 'store']);
Route::get('/donate', [PaymentController::class, 'index']);
Route::post('/payment', [PaymentController::class, 'pay']);
Route::post('/payment/notification', [PaymentController::class, 'notificationHandler']);
