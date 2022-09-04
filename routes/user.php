<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "user" middleware group. Now create something great!
|
*/
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::group(['middleware' => 'auth:web', 'prefix' => 'user'], function () {
        Route::get('/', 'App\Http\Controllers\Users\userDashboard@index')->name('user_dashboard');
        Route::group(['prefix' => 'invoices'], function () {

            Route::get('/', 'App\Http\Controllers\Users\Invoices@index')->name('user.invoices');
            Route::get('show/{id}', 'App\Http\Controllers\Users\Invoices@show')->name('user.invoices.show');
            Route::get('MarkAsRead_all','App\Http\Controllers\Users\Invoices@MarkAsRead_all')->name('MarkAsRead_all');



        });
        ################################## payments routes ######################################
        Route::group(['prefix' => 'Payments'], function () {
            Route::get('/', 'App\Http\Controllers\Users\Payments@index')->name('user.payments');


        });


    });
});




Route::group([ 'middleware' => 'guest:web','prefix'=>'user'], function () {
    Route::get('login', 'App\Http\Controllers\Users\UserController@login')->name('login.user');
    Route::post('postuser', 'App\Http\Controllers\Users\UserController@postlogin')->name('user.login');;

});

