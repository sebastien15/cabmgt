<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;

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


// authentication apis
// Route::get('logout', [authController::class, 'logout']);
// Route::get('users', [authController::class, 'getUsers']);
// Route::post('register', [authController::class, 'register']);
// Route::get('users/{id}', [authController::class, 'getUser']);
// Route::put('users/{id}', [authController::class, 'updateUser']);
// Route::delete('users/{id}', [authController::class, 'deleteUser']);
// Route::post('login', [authController::class, 'authenticate']);