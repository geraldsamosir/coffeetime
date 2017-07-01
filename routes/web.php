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

	Route::get('/article/view/{id}', 'ArticleController@show');

	Route::get('/list-product/{category}', function(TCG\Voyager\Models\Category $category){
		$coffees = App\Product::where('category_id', $category->id)->get();
		return view('frontend.pages.listCoffee', compact('coffees'));
	});

    Route::get('/search-product', function(){
        $searchQuery = Request::all()['query'];
        $coffees = App\Product::where('name','like','%'.$searchQuery.'%')->get();
        return view('frontend.pages.listCoffee', compact('coffees'));
    });

	Route::get('/list-mesin', function(){
		return view('frontend.pages.listMesin');
	});

	Route::get('/list-article/{category}', function(App\ArticleCategory $category){
        $articles = App\Article::where('id', $category->id)->paginate(5);
		return view('frontend.pages.listArticle', compact('articles'));
	});

	Route::get('/komparasi', function(){
		return view('frontend.pages.komparasi');
	});

	Route::get('/checkout/{orderId}', 'OrderController@show');

    Route::get('/order/summary/{id}', 'OrderController@getOrderSummary');

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

    Route::get('/customer/transaksi', 'OrderController@getHistory');

	Route::get('/customer/article',function(){
        $userArticles = Auth::user()->articles;
		return view('frontend.pages.panelResep', compact('userArticles'));
	});

	Route::get('/customer/article/create', 'ArticleController@createArticle');

	Route::post('/customer/article/save', 'ArticleController@saveArticle');

    Route::post('/customer/edit/save', 'UserController@saveProfile');

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
Route::post('/checkout', 'CartController@cartCheckout');
Route::get('/order/delete/{id}', 'OrderController@delete');
Route::post('/order/get-address', 'OrderController@getAddressData');

Route::post('/order/summary/{id}', 'OrderController@postOrderSummary');
Route::post('/order/confirmation/{id}', 'OrderController@paymentConfirmation');

Route::get('/ajax/deletecartitem/{rowId}', 'CartController@deleteItem');

Auth::routes();

Route::get('/home', 'HomeController@index');
