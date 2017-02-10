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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('manage-vue', 'VueItemController@manageVue');

Route::resource('items','ItemController');

Route::get('/grid', function () {
    return view('grid');
});


Route::get('/demo-grid', function () {
    return view('demo-grid');
});

Route::get('/vue-tables-2', function () {
    return view('vue-tables-2');
});
