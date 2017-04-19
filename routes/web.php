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
$agent = new Jenssegers\Agent\Agent();


/*Route for Desktop*/
if ($agent->isDesktop()) {
	Route::get('/', function () {
	    return view('frontend.pages.home');
	});

	Route::get('/detail-coffee', function(){
		return view('frontend.pages.detailCoffee');
	});

	Route::get('/detail-mesin', function(){
		return view('frontend.pages.detailMesin');
	});

	Route::get('/detail-resep', function(){
		return view('frontend.pages.detailResep');
	});

	Route::get('/list-coffee', function(){
		return view('frontend.pages.listCoffee');
	});

	Route::get('/list-mesin', function(){
		return view('frontend.pages.listMesin');
	});

	Route::get('/list-resep', function(){
		return view('frontend.pages.listResep');
	});

	Route::get('/komparasi', function(){
		return view('frontend.pages.komparasi');
	});

	Route::get('/checkout', function(){
		return view('frontend.pages.checkout');
	});

	Route::get('/pembayaran', function(){
		return view('frontend.pages.pembayaran');
	});

	Route::get('/cart', function(){
		return view('frontend.pages.cart');
	});

	Route::get('/customer/akun', function(){
		return view('frontend.pages.panelAkun');
	});

	Route::get('/customer/cart', function(){
		return view('frontend.pages.panelCart');
	});

	Route::get('/customer/edit', function(){
		return view('frontend.pages.editAkun');
	});
}

/*Route for Mobile*/
else {
	Route::get('/', function () {
	    return view('welcome');
	});
}



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index');
