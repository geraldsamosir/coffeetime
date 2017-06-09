<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use Illuminate\Http\Request;
use App\Product;
use Cart;
use Auth;
use Carbon\Carbon;
use App\Order;
use DB;
use Indonesia;

class ArticleController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function show($articleId) {
        $article = Article::find($articleId);
        return view('frontend.pages.panelResep', compact('article'));
    }
}