<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di sini kamu bisa mendaftarkan API routes untuk aplikasi kamu.
| Routes ini dimuat oleh RouteServiceProvider dan semuanya
| otomatis dikelompokkan dengan middleware "api".
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/order/midtrans-callback', [OrderController::class, 'callback'])
    ->name('order.callback');
