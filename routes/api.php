<?php

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

//Route::middleware('auth:api')->get('/consumers', 'ConsumersController@index');
//Route::middleware('auth:api')->get('/loans', 'LoansController@index');

Route::group(['middleware' => 'auth:api'], function() {

    /* Api classes */
    Route::group(['namespace' => 'Api'], function() {

        /* Loan */
        Route::group(['prefix' => 'loans'], function() {
            Route::get('/', 'LoanController@index');
            Route::get('/{id}', 'LoanController@show');
        });

    });

});
