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

    Route::get('/detail-coffee/{productCoffee}', function (App\Product $productCoffee) {
        $characteristics = preg_split("/\\r\\n|\\r|\\n/", $productCoffee->characteristics);
        $graphs = preg_split("/\\r\\n|\\r|\\n/", $productCoffee->graph);
        $relatedArticle = \App\Article::where('product_id', $productCoffee->id)->inRandomOrder()->take(2)->get();
        $relatedProduct = \App\Product::where('category_id', $productCoffee->category_id)->inRandomOrder()->take(4)->get();
        return view('frontend.pages.detailCoffee')->with([
            'productCoffee' => $productCoffee,
            'productImages' => json_decode($productCoffee->images),
            'characteristics' => $characteristics,
            'relatedArticle' => $relatedArticle,
            'relatedProduct' => $relatedProduct,
            'graphs' => $graphs,
        ]);
    });

    Route::get('/detail-mesin', function () {
        return view('frontend.pages.detailMesin');
    });

    Route::get('/article/view/{id}', 'ArticleController@show');

    Route::get('/list-product/{category}', function (TCG\Voyager\Models\Category $category) {
        $coffees = App\Product::where('category_id', $category->id)->get();
        $categoryProduct = \App\Category::where('name','!=', 'parentless')->get();
        return view('frontend.pages.listCoffee', compact('coffees', 'categoryProduct'));
    });

    Route::get('/search-product', function () {
        $searchQuery = Request::all()['query'];
        $sortQuery = isset(Request::all()['sort']) ? Request::all()['sort'] : null;
        $categoryQuery = isset(Request::all()['category']) ? Request::all()['category'] : null;
        $priceQuery = isset(Request::all()['price']) ? Request::all()['price'] : null;
        $categoryProduct = \App\Category::where('name','!=', 'parentless')->where('parent_id', '!=', 8)->get();
        $coffees = App\Product::where('name', 'like', '%' . $searchQuery . '%');

        if (!empty($categoryQuery)) {
            $coffees = $coffees->where('category_id', $categoryQuery);
        }

        if (!empty($priceQuery)) {
            switch ($priceQuery) {
                case 'to100':
                    $coffees = $coffees->where('original_price', '<=' ,100000);
        break;
                case 'between100-500':
                    $coffees = $coffees->whereBetween('original_price', [100000,500000]);
        break;
                case 'over500':
                    $coffees = $coffees->where('original_price', '>=', 500000);
        break;
                default:

            }
        }

        switch ($sortQuery) {
            case 'lowprice':
                $coffees = $coffees->orderBy('original_price', 'ASC');
                break;
            case 'highprice':
                $coffees = $coffees->orderBy('original_price', 'DESC');
                break;
            case 'latest':
                $coffees = $coffees->orderBy('created_at', 'DESC');
                break;
            case 'oldest':
                $coffees = $coffees->orderBy('created_at', 'ASC');
                break;
        }

        $coffees = $coffees->get();
        return view('frontend.pages.listCoffee', compact('coffees', 'categoryProduct'));
    });

    Route::get('/search-article', function () {
        $searchQuery = isset(Request::all()['query']) ? Request::all()['query'] : null;
        $sortQuery = isset(Request::all()['sort']) ? Request::all()['sort'] : null;
        $articles = App\Article::where('title', 'like', '%' . $searchQuery . '%');

        switch ($sortQuery) {
            case 'likes':
                $articles = $articles->orderBy('likes', 'DESC')->paginate(5);
                break;
            case 'views':
                $articles = $articles->orderBy('views', 'DESC')->paginate(5);
                break;
            case 'latest':
                $articles = $articles->orderBy('created_at', 'DESC')->paginate(5);
                break;
            case 'oldest':
                $articles = $articles->orderBy('created_at', 'ASC')->paginate(5);
                break;
            case 'copies':
                $articles = $articles->orderBy('copies', 'DESC')->paginate(5);
                break;
            default:
                $articles = $articles->paginate(5);
        }
        return view('frontend.pages.listArticle', compact('articles'));
    });

    Route::get('/list-article/{category}', function (App\ArticleCategory $category) {
        $articles = App\Article::where('category_id', $category->id)->paginate(5);
        return view('frontend.pages.listArticle', compact('articles'));
    });

    Route::get('/komparasi', function () {
        $products = App\Product::get();
        $komparasi3 = isset(Request::all()['komparasi3']);
        $idProduct1 = isset(Request::all()['product1']) ? Request::all()['product1'] : null;
        $idProduct2 = isset(Request::all()['product2']) ? Request::all()['product2'] : null;
        $idProduct3 = isset(Request::all()['product3']) ? Request::all()['product3'] : null;
        if($idProduct1) {
            $product1 = App\Product::where('id', $idProduct1)->first();
            $characteristics1 = preg_split("/\\r\\n|\\r|\\n/", $product1->characteristics);
            $graphs1 = preg_split("/\\r\\n|\\r|\\n/", $product1->graph);
        }
        if($idProduct2) {
            $product2 = App\Product::where('id', $idProduct2)->first();
            $characteristics2 = preg_split("/\\r\\n|\\r|\\n/", $product2->characteristics);
            $graphs2 = preg_split("/\\r\\n|\\r|\\n/", $product2->graph);
        }
        if($idProduct3) {
            $product3 = App\Product::where('id', $idProduct3)->first();
            $characteristics3 = preg_split("/\\r\\n|\\r|\\n/", $product3->characteristics);
            $graphs3 = preg_split("/\\r\\n|\\r|\\n/", $product3->graph);
        }
        return view('frontend.pages.komparasi',compact('products', 'komparasi3', 'product1', 'product2','product3', 'characteristics1', 'characteristics2', 'characteristics3', 'graphs1', 'graphs2', 'graphs3'));
    });
    Route::get('/komparasi3', function () {
        $products = App\Product::get();
        $komparasi3 = true;
        $idProduct1 = isset(Request::all()['product1']) ? Request::all()['product1'] : null;
        $idProduct2 = isset(Request::all()['product2']) ? Request::all()['product2'] : null;
        $idProduct3 = isset(Request::all()['product3']) ? Request::all()['product3'] : null;
        if($idProduct1) {
            $product1 = App\Product::where('id', $idProduct1)->first();
            $characteristics1 = preg_split("/\\r\\n|\\r|\\n/", $product1->characteristics);
            $graphs1 = preg_split("/\\r\\n|\\r|\\n/", $product1->graph);
        }
        if($idProduct2) {
            $product2 = App\Product::where('id', $idProduct2)->first();
            $characteristics2 = preg_split("/\\r\\n|\\r|\\n/", $product2->characteristics);
            $graphs2 = preg_split("/\\r\\n|\\r|\\n/", $product2->graph);
        }
        if($idProduct3) {
            $product3 = App\Product::where('id', $idProduct3)->first();
            $characteristics3 = preg_split("/\\r\\n|\\r|\\n/", $product3->characteristics);
            $graphs3 = preg_split("/\\r\\n|\\r|\\n/", $product3->graph);
        }
        return view('frontend.pages.komparasi',compact('products', 'komparasi3', 'product1', 'product2','product3', 'characteristics1', 'characteristics2', 'characteristics3', 'graphs1', 'graphs2', 'graphs3'));
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

    Route::get('/customer/article', function () {
        $userArticles = Auth::user()->articles()->paginate(5);
        $userLikedArticles = \App\UserArticlesLike::where('user_id', Auth::user()->id)->paginate(5, ['*'], 'liked_page');
        return view('frontend.pages.panelResep', compact('userArticles', 'userLikedArticles'));
    });

    Route::get('/customer/article/create', 'ArticleController@createArticle');
    Route::get('/customer/article/edit/{id}', 'ArticleController@editArticle');
    Route::get('/customer/article/copy/{id}', 'ArticleController@copyArticle');
    Route::post('/customer/article/save', 'ArticleController@saveArticle');
    Route::get('/article/like/{id}', 'ArticleController@likeArticle');

    Route::post('/customer/article/update/{articleId}', 'ArticleController@updateArticle');

    Route::post('/customer/edit/save', 'UserController@saveProfile');

    // Untuk Social Media
    Route::get('/user/{user}', function (App\User $user) {
        $userArticles = $user->articles()->paginate(5);
        $userLikedArticles = \App\UserArticlesLike::where('user_id', $user->id)->paginate(5, ['*'], 'liked_page');
        return view('frontend.pages.socialAkun', compact('user','userArticles', 'userLikedArticles'));
    });
} /*Route for Mobile*/
else {
	Route::get('/', function () {
	    return view('mobile.pages.home');
	});

    Route::get('/detail-coffee/{productCoffee}', function (App\Product $productCoffee) {
        $characteristics = preg_split("/\\r\\n|\\r|\\n/", $productCoffee->characteristics);
        $graphs = preg_split("/\\r\\n|\\r|\\n/", $productCoffee->graph);
        $relatedArticle = \App\Article::where('product_id', $productCoffee->id)->inRandomOrder()->take(2)->get();
        $relatedProduct = \App\Product::where('category_id', $productCoffee->category_id)->inRandomOrder()->take(4)->get();
        return view('mobile.pages.detailCoffee')->with([
            'productCoffee' => $productCoffee,
            'productImages' => json_decode($productCoffee->images),
            'characteristics' => $characteristics,
            'relatedArticle' => $relatedArticle,
            'relatedProduct' => $relatedProduct,
            'graphs' => $graphs,
        ]);
    });

	Route::get('/detail-mesin', function(){
		return view('mobile.pages.detailMesin');
	});

	Route::get('/detail-resep', function(){
		return view('mobile.pages.detailResep');
	});

	Route::get('/list-coffee', function(){
		return view('mobile.pages.listCoffee');
	});

	Route::get('/list-mesin', function(){
		return view('mobile.pages.listMesin');
	});

    Route::get('/search-article', function () {
        $searchQuery = isset(Request::all()['query']) ? Request::all()['query'] : null;
        $sortQuery = isset(Request::all()['sort']) ? Request::all()['sort'] : null;
        $articles = App\Article::where('title', 'like', '%' . $searchQuery . '%');

        switch ($sortQuery) {
            case 'likes':
                $articles = $articles->orderBy('likes', 'DESC')->paginate(5);
                break;
            case 'views':
                $articles = $articles->orderBy('views', 'DESC')->paginate(5);
                break;
            case 'latest':
                $articles = $articles->orderBy('created_at', 'DESC')->paginate(5);
                break;
            case 'oldest':
                $articles = $articles->orderBy('created_at', 'ASC')->paginate(5);
                break;
            case 'copies':
                $articles = $articles->orderBy('copies', 'DESC')->paginate(5);
                break;
            default:
                $articles = $articles->paginate(5);
        }
        return view('mobile.pages.listArtikel', compact('articles'));
    });

    Route::get('/list-article/{category}', function (App\ArticleCategory $category) {
        $articles = App\Article::where('category_id', $category->id)->paginate(5);
        return view('mobile.pages.listArtikel', compact('articles'));
    });

    Route::get('/list-product/{category}', function (TCG\Voyager\Models\Category $category) {
        $coffees = App\Product::where('category_id', $category->id)->get();
        $categoryProduct = \App\Category::where('name','!=', 'parentless')->get();
        return view('mobile.pages.listCoffee', compact('coffees', 'categoryProduct'));
    });

    Route::get('/search-product', function () {
        $searchQuery = Request::all()['query'];
        $sortQuery = isset(Request::all()['sort']) ? Request::all()['sort'] : null;
        $categoryQuery = isset(Request::all()['category']) ? Request::all()['category'] : null;
        $priceQuery = isset(Request::all()['price']) ? Request::all()['price'] : null;
        $categoryProduct = \App\Category::where('name','!=', 'parentless')->where('parent_id', '!=', 8)->get();
        $coffees = App\Product::where('name', 'like', '%' . $searchQuery . '%');

        if (!empty($categoryQuery)) {
            $coffees = $coffees->where('category_id', $categoryQuery);
        }

        if (!empty($priceQuery)) {
            switch ($priceQuery) {
                case 'to100':
                    $coffees = $coffees->where('original_price', '<=' ,100000);
                    break;
                case 'between100-500':
                    $coffees = $coffees->whereBetween('original_price', [100000,500000]);
                    break;
                case 'over500':
                    $coffees = $coffees->where('original_price', '>=', 500000);
                    break;
                default:

            }
        }

        switch ($sortQuery) {
            case 'lowprice':
                $coffees = $coffees->orderBy('original_price', 'ASC');
                break;
            case 'highprice':
                $coffees = $coffees->orderBy('original_price', 'DESC');
                break;
            case 'latest':
                $coffees = $coffees->orderBy('created_at', 'DESC');
                break;
            case 'oldest':
                $coffees = $coffees->orderBy('created_at', 'ASC');
                break;
        }

        $coffees = $coffees->get();
        return view('mobile.pages.listCoffee', compact('coffees', 'categoryProduct'));
    });

	Route::get('/komparasi', function(){
		return view('mobile.pages.komparasi');
	});

	Route::get('/cart', function(){
		return view('mobile.pages.cart');
	});

	Route::get('/checkout', function(){
		return view('mobile.pages.checkout');
	});

    Route::get('/pembayaran', function(){
        return view('mobile.pages.pembayaran');
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
