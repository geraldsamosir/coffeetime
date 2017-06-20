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
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Indonesia;
use Illuminate\Support\Str;
use Mockery\Exception;

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

        try {
            $input = $request->all();

            $file = $request->file('lblHeaderImage');
            $filename = Str::random(20);

            $path = 'articles'.'/'.date('F').date('Y').'/';
            $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();

            $image = Image::make($file)->encode($file->getClientOriginalExtension(), 75);

            Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string) $image, 'public');

            $article = new Article();
            $article->user_id = Auth::user()->id;
            $article->title = $input['lblJudul'];
            $article->content = $input['lblKonten'];
            $article->category_id = $input['lblCategory'];
            $article->product_id = $input['lblProduct'];
            $article->header_image = $fullPath;
            $article->save();

            return redirect('article/view/'.$article->id)->with('status', 'Artikel Berhasil ditambahkan');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e);
        }



    }
}