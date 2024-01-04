<?php

use App\Http\Controllers\Payments;
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

Route::get('/', [Payments::class,'show']);

// Route::post('/payments/store','PaymentsController@store')->name('payments.store');
Route::post('/payments/store',[Payments::class,'store'])->name('payments.store');