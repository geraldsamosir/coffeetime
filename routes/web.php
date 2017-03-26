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
