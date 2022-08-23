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
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::group(['middleware' => 'auth:admin','prefix'=>'admin'], function () {
        Route::get('/', 'App\Http\Controllers\Dashboard\adminDashboard@index')->name('admin_dashboard');
        Route::get('logout', 'App\Http\Controllers\Dashboard\LoginController@logout')->name('admin.logout');

    });
    /////edit profile/////
    Route::group(['prefix' => 'profile'], function () {
        Route::get('edit', 'App\Http\Controllers\Dashboard\ProfileController@editProfile')->name('edit.profile');
        Route::put('updateProfile/{id}', 'App\Http\Controllers\Dashboard\ProfileController@updateprofile')->name('updateProfile');
    });
    ///////////////
});

Route::group([ 'middleware' => 'guest:admin','prefix'=>'admin'], function () {
    Route::get('login', 'App\Http\Controllers\Dashboard\LoginController@login')->name('login.admin');
    Route::post('postuser', 'App\Http\Controllers\Dashboard\LoginController@postlogin')->name('admin.login');;

});

