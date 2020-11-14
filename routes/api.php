<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\routeController;    
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

//routes

Route::get('routes', [routeController::class, 'index']);
Route::get('routes/{id}', [routeController::class, 'show']);
Route::post('routes', [routeController::class, 'store']);
Route::put('routes/{id}', [routeController::class, 'update']);
Route::delete('routes/{id}',[routeController::class, 'destroy']);