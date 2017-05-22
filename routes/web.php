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

  Route::get('/detail-coffee/{productCoffee}', function(App\Product $productCoffee){
      $categoriesKopi = TCG\Voyager\Models\Category::where('parent_id',1)->get();
      $characteristics = preg_split("/\\r\\n|\\r|\\n/", $productCoffee->characteristics);
    return view('frontend.pages.detailCoffee')->with([
          'productCoffee' => $productCoffee,
          'productImages' => json_decode($productCoffee->images),
          'characteristics' => $characteristics
          ]);
  });

	Route::get('/detail-mesin', function(){
		return view('frontend.pages.detailMesin');
	});

	Route::get('/detail-resep', function(){
		return view('frontend.pages.detailResep');
	});

	Route::get('/list-coffee/{category}', function(TCG\Voyager\Models\Category $category){
		$coffees = App\Product::where('category_id', $category->id)->get();
		return view('frontend.pages.listCoffee', compact('coffees'));
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
    $cart = Cart::content();
		return view('frontend.pages.cart', compact('cart'));
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

	Route::get('/customer/portofolio',function(){
		return view('frontend.pages.panelPortofolio');
	});

	Route::get('/customer/portofolio/edit',function(){
		return view('frontend.pages.editPortofolio');
	});

	Route::get('customer/transaksi',function(){
		return view('frontend.pages.panelTransaksi');
	});

	Route::get('/customer/resep',function(){
		return view('frontend.pages.panelResep');
	});

	Route::get('/customer/resep/create',function(){
		return view('frontend.pages.createResep');
	});

	// Untuk Social Media
	Route::get('/user/albert',function(){
		return view('frontend.pages.socialAkun');
	});
}

/*Route for Mobile*/
else {
	Route::get('/', function () {
	    return view('mobile.pages.home');
	});
}



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/ajax/cartcontent', 'CartController@getCartContent');

Route::post('/ajax/addcartitem/{id}', 'CartController@addItemToCart');

Route::get('/ajax/deletecartitem/{rowId}', 'CartController@deleteItem');

Auth::routes();

Route::get('/home', 'HomeController@index');
