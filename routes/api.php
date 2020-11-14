<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactController;


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

Route::get('contacts', [contactController::class, 'index']);
Route::get('contacts/{id}', [contactController::class, 'show']);
Route::post('contacts', [contactController::class, 'store']);
Route::put('contacts/{id}', [contactController::class, 'update']);
Route::delete('contacts/{id}',[contactController::class, 'destroy']);
