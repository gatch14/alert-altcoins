<?php

use App\Mail\SendAlert;

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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/store-data', 'StoreAndCheckApiDataController@storeInJson');

Route::get('/read-data', 'StoreAndCheckApiDataController@readJson');

Route::resource('alert-altcoins', 'AlertAltcoinsController');

Route::get('/check-alert', 'AlertsController@index');
Route::get('/test', 'AlertsController@test');

//test email

Route::get('/test-email', 'AlertsController@store');