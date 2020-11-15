<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'ui.home');
Route::view('/about', 'ui.about');
Route::view('/contactus', 'ui.contactus');
Route::view('/offers', 'ui.offers');
Route::view('/values', 'ui.values');
Route::view('/siteMap', 'ui.siteMap');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/ui', 'ui.dashboard');


Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/ui', 'ui.dashboard');

