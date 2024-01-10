<?php

use App\Http\Controllers\Accounts;
use App\Http\Controllers\Payments;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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



Route::group(['middleware' => ['guest']], function() {
    //login
    Route::get('login',[Accounts::class, 'login'])->name('login');
    Route::post('login/auth',[Accounts::class,'auth'])->name('login.auth');
    
    Route::get('/', [Payments::class,'create']);
    
    Route::get('/clear',function(){
        Artisan::call('optimize:clear'); 
        
        return 'clear';
     });
     
    // Route::post('/payments/store','PaymentsController@store')->name('payments.store');
    Route::post('paymentprocess',[Payments::class,'store'])->name('payments.store');
});


Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Routes
     */
    Route::get('/logout', [Accounts::class,'logout'])->name('logout.perform');

 

    //payment
    Route::get('payment/view',[Payments::class,'view'])->name('payments.view');
    Route::get('payment/view/{id}',[Payments::class,'edit'])->name('payments.edit');
    Route::put('payment/update/{id}',[Payments::class,'update'])->name('payments.update');

    //accounts
    Route::get('accounts',[Accounts::class,'index'])->name('accounts.index');
    Route::get('accounts/add',[Accounts::class,'create'])->name('accounts.create');
    Route::post('accounts/store',[Accounts::class,'store'])->name('accounts.store');
});