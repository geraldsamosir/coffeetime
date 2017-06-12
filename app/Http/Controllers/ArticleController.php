<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use Illuminate\Http\Request;
use App\Product;
use App\UsersArticlePermission;
use App\Article;
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
        if (empty($article)) {
            return response()->view('errors.404',['message'=>'Artikel tidak ditemukan']);
        }
        return view('frontend.pages.detailArticle', compact('article'));
    }

    public function createArticle() {
        $permissions = UsersArticlePermission::where('user_id', Auth::user()->id)->get();
        if(!empty($permissions)) {
            return view('frontend.pages.createArticle', ['permissions' => $permissions]);
        } else {
            return response()->view('errors.403');
        }
    }

    public function saveArticle(Request $request) {
        if (!Auth::check()) {
            return back()->withInput()->with('error', 'Anda tidak berhak menambahkan artikel');
        }
        $input = $request->all();
        $article = new Article();
        $article->user_id = Auth::user()->id;
        $article->title = $input['lblJudul'];
        $article->content = $input['lblKonten'];
        $article->category_id = $input['lblCategory'];
        $article->product_id = $input['lblProduct'];
        $article->save();

        return back()->withInput()->with('status', 'Artikel Berhasil ditambahkan');
    }
}