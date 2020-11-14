<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookingController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// contact apis
 
Route::get('bookings', [bookingController::class, 'index']);
Route::get('bookings/{id}', [bookingController::class, 'show']);
Route::post('bookings', [bookingController::class, 'store']);
Route::put('bookings/{id}', [bookingController::class, 'update']);
Route::delete('bookings/{id}',[bookingController::class, 'destroy']);