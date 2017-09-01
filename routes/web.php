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

	// $url = "https://api.coinmarketcap.com/v1/ticker/?convert=EUR&limit=10";
	// $result = file_get_contents($url);

	// $altcoins = json_decode($result, true);
	$altcoins = ['BTC', 'ETH', 'XRP', 'BCH'] ;

    return view('welcome', compact('altcoins'));
});

Route::get('/test', function () {
	// $altcoins = ['BTC', 'ETH', 'XRP', 'BCH'] ;
	// $coin = request('coin');
	// if (in_array(strtoupper($coin), $altcoins)) 
	// {
	// 	return view('test')->with('coin', strtoupper($coin));
	// } else
	// {
	// 	$coin = 'pas de crypto trouvée';
	// 	return view('test')->with('coin', $coin);
	// }
	//$email = request('email');
	dd('logged');
})->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/store-data', 'StoreAndCheckApiDataController@storeInJson');

Route::get('/read-data', 'StoreAndCheckApiDataController@readJson');
// Route::get('/home', function () {
// 	// pour trouver l id de l user connecté
// 	dd(Auth::user()->id);
// });
Route::resource('alert-altcoins', 'AlertAltcoinsController');