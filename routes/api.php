<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\carController;

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

// 

// Car routes

Route::get('cars', [carController::class, 'index']);
Route::get('cars/{id}', [carController::class, 'show']);
Route::post('cars', [carController::class, 'store']);
Route::put('cars/{id}', [carController::class, 'update']);
Route::delete('cars/{id}',[carController::class, 'destroy']);
