<?php

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

Route::group(['middleware' => 'guest'], function() {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('logout', 'Auth\LoginController@logout');

    /* Web classes */
    Route::group(['namespace' => 'Web'], function() {

        /* Loan */
        Route::group(['prefix' => 'loans'], function() {
            Route::get('/', 'LoanController@index');
            Route::get('/{id}', 'LoanController@show');
        });

    });

    Route::get('/', 'DashboardController@dashboard');
});
