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
    ################################## categories routes ######################################
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'App\Http\Controllers\Dashboard\Categories@index')->name('admin.categories');
        Route::get('create', 'App\Http\Controllers\Dashboard\Categories@create')->name('admin.categories.create');
        Route::post('store', 'App\Http\Controllers\Dashboard\Categories@store')->name('admin.categories.store');
        Route::get('edit/{id}', 'App\Http\Controllers\Dashboard\Categories@edit')->name('admin.categories.edit');
        Route::post('update/{id}', 'App\Http\Controllers\Dashboard\Categories@update')->name('admin.categories.update');
        Route::get('delete/{id}', 'App\Http\Controllers\Dashboard\Categories@destroy')->name('admin.categories.delete');

    });

    ################################## end categories    #######################################

    ################################## Sections routes ######################################
    Route::group(['prefix' => 'Sections'], function () {
        Route::get('/', 'App\Http\Controllers\Dashboard\Sections@index')->name('admin.sections');
        Route::get('create', 'App\Http\Controllers\Dashboard\Sections@create')->name('admin.sections.create');
        Route::post('store', 'App\Http\Controllers\Dashboard\Sections@store')->name('admin.sections.store');
        Route::get('edit/{id}', 'App\Http\Controllers\Dashboard\Sections@edit')->name('admin.sections.edit');
        Route::post('update/{id}', 'App\Http\Controllers\Dashboard\Sections@update')->name('admin.sections.update');
        Route::get('delete/{id}', 'App\Http\Controllers\Dashboard\Sections@destroy')->name('admin.sections.delete');

    });

    ################################## end Sections   #######################################

    ################################## Brands routes ######################################
    Route::group(['prefix' => 'Brands'], function () {
        Route::get('/', 'App\Http\Controllers\Dashboard\Brands@index')->name('admin.brands');
        Route::get('create', 'App\Http\Controllers\Dashboard\Brands@create')->name('admin.brands.create');
        Route::post('store', 'App\Http\Controllers\Dashboard\Brands@store')->name('admin.brands.store');
        Route::get('edit/{id}', 'App\Http\Controllers\Dashboard\Brands@edit')->name('admin.brands.edit');
        Route::post('update/{id}', 'App\Http\Controllers\Dashboard\Brands@update')->name('admin.brands.update');
        Route::get('delete/{id}', 'App\Http\Controllers\Dashboard\Brands@destroy')->name('admin.brands.delete');

    });

    ################################## end Brands   #######################################
    ################################## products routes ######################################
    Route::group(['prefix' => 'Products'], function () {
        Route::get('/', 'App\Http\Controllers\Dashboard\Products@index')->name('admin.products');
        Route::get('create', 'App\Http\Controllers\Dashboard\Products@create')->name('admin.products.create');
        Route::post('store', 'App\Http\Controllers\Dashboard\Products@store')->name('admin.products.store');
        Route::get('edit/{id}', 'App\Http\Controllers\Dashboard\Products@edit')->name('admin.products.edit');
        Route::post('update/{id}', 'App\Http\Controllers\Dashboard\Products@update')->name('admin.products.update');
        Route::get('delete/{id}', 'App\Http\Controllers\Dashboard\Products@destroy')->name('admin.products.delete');

    });

    ################################## end products   #######################################
    ################################## users routes ######################################
    Route::group(['prefix' => 'show_Users'], function () {
        Route::get('/', 'App\Http\Controllers\Dashboard\Users@index')->name('admin.show_users');
        Route::get('create', 'App\Http\Controllers\Dashboard\Users@create')->name('admin.users.create');
        Route::post('store', 'App\Http\Controllers\Dashboard\Users@store')->name('admin.users.store');
        Route::get('delete/{id}', 'App\Http\Controllers\Dashboard\Users@destroy')->name('admin.users.delete');

    });

    ################################## end users   #######################################
    ################################## invoices routes ######################################
    Route::group(['prefix' => 'invoices'], function () {
        Route::get('/', 'App\Http\Controllers\Dashboard\Invoices@index')->name('admin.invoice');
        Route::get('create', 'App\Http\Controllers\Dashboard\Invoices@create')->name('admin.invoice.create');
        Route::post('store', 'App\Http\Controllers\Dashboard\Invoices@store')->name('admin.invoice.store');
        Route::get('show/{id}', 'App\Http\Controllers\Dashboard\Invoices@show')->name('admin.invoices.show');
        Route::get('edit/{id}', 'App\Http\Controllers\Dashboard\Invoices@edit')->name('admin.invoices.edit');
        Route::post('update/{id}', 'App\Http\Controllers\Dashboard\Invoices@update')->name('admin.invoices.update');
        Route::get('delete/{id}', 'App\Http\Controllers\Dashboard\Invoices@destroy')->name('admin.invoices.delete');

    });

    ################################## end invoices   #######################################
    ################################## payments routes ######################################
    Route::group(['prefix' => 'Payments'], function () {
        Route::get('/', 'App\Http\Controllers\Dashboard\Payments@index')->name('admin.payments');
        Route::get('create', 'App\Http\Controllers\Dashboard\Payments@create')->name('admin.payments.create');
        Route::post('store', 'App\Http\Controllers\Dashboard\Payments@store')->name('admin.payments.store');
        Route::get('edit/{id}', 'App\Http\Controllers\Dashboard\Payments@edit')->name('admin.payments.edit');
        Route::post('update/{id}', 'App\Http\Controllers\Dashboard\Payments@update')->name('admin.payments.update');
        Route::get('delete/{id}', 'App\Http\Controllers\Dashboard\Payments@destroy')->name('admin.payments.delete');

    });

    ################################## end payments   #######################################
});

Route::group([ 'middleware' => 'guest:admin','prefix'=>'admin'], function () {
    Route::get('login', 'App\Http\Controllers\Dashboard\LoginController@login')->name('login.admin');
    Route::post('postuser', 'App\Http\Controllers\Dashboard\LoginController@postlogin')->name('admin.login');;

});


