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

// Route::get('/welcome', function () {
//     return view('welcome');
// });
Route::view('/', 'ui.home');
Route::view('/about', 'ui.about');
Route::view('/contactus', 'ui.contactus');
Route::view('/offers', 'ui.offers');
Route::view('/values', 'ui.values');
Route::view('/siteMap', 'ui.siteMap');
Route::view('/book', 'ui.book');

//operator start

Route::view('/operator/dashboard','ui.operator.dashboard')->middleware('isOperator');

//super admin pages
Route::view('/operator/routesAndStations','ui.admin.routesAndStations');
Route::view('/admin/car','ui.admin.car');

//operator ends 

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


//operator ends 

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/ui', 'ui.dashboard')->middleware('isAdmin');
