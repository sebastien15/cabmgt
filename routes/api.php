<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\carController;
use App\Http\Controllers\routeController;    
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

// Car routes

Route::get('cars', [carController::class, 'index']);
Route::get('cars/{id}', [carController::class, 'show']);
Route::post('cars', [carController::class, 'store']);
Route::put('cars/{id}', [carController::class, 'update']);
Route::delete('cars/{id}',[carController::class, 'destroy']);
//routes

Route::get('routes', [routeController::class, 'index']);
Route::get('routes/{id}', [routeController::class, 'show']);
Route::post('routes', [routeController::class, 'store']);
Route::put('routes/{id}', [routeController::class, 'update']);
Route::delete('routes/{id}',[routeController::class, 'destroy']);
// contact apis

Route::get('contacts', [contactController::class, 'index']);
Route::get('contacts/{id}', [contactController::class, 'show']);
Route::post('contacts', [contactController::class, 'store']);
Route::put('contacts/{id}', [contactController::class, 'update']);
Route::delete('contacts/{id}',[contactController::class, 'destroy']);