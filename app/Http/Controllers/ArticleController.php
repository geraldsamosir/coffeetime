<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use Illuminate\Http\Request;
use App\Product;
use App\UsersArticlePermission;
use App\UserArticlesLike;
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
        $article->views = $article->views + 1;
        $article->save();
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

    public function editArticle($id) {
        $article = Article::find($id);
        if(!empty($article) && Auth::check() && $article->user_id == Auth::user()->id) {
            return view('frontend.pages.editArticle', ['article' => $article]);
        } else {
            return response()->view('errors.403');
        }
    }

    public function copyArticle($id) {
        $article = Article::find($id);
        $permissions = UsersArticlePermission::where('user_id', Auth::user()->id)->get();
        if(!empty($article) && Auth::check() && $article->user_id == Auth::user()->id) {
            return view('frontend.pages.copyArticle', ['article' => $article, 'permissions' => $permissions]);
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

            $article = new Article();
            if(isset($input['parentId'])) {
                $article->parent_id = $input['parentId'];
                $parentArticle = Article::where('id', $article->parent_id)->first();
                $parentArticle->copies = $parentArticle->copies + 1;

                $parentArticle->save();
            }
            $article->user_id = Auth::user()->id;
            $article->title = $input['lblJudul'];
            $article->content = $input['lblKonten'];
            $article->category_id = $input['lblCategory'];
            $article->product_id = $input['lblProduct'];

            if (!empty($file)) {
                $filename = Str::random(20);

                $path = 'articles'.'/'.date('F').date('Y').'/';
                $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();

                $image = Image::make($file)->encode($file->getClientOriginalExtension(), 75);

                Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string) $image, 'public');
                $article->header_image = $fullPath;
            } else {
                $article->header_image = $input['oldHeaderImage'];
            }


            $article->save();
            $article->tag(explode(",",$input['tags']));

            return redirect('article/view/'.$article->id)->with('status', 'Artikel Berhasil ditambahkan');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e);
        }
    }

    public function likeArticle($id) {
        $article = Article::where('id',$id)->first();
        $article->likes = $article->likes + 1;

        if(UserArticlesLike::where([['user_id', Auth::user()->id], ['article_id', $id]])->first()) {
            return redirect('article/view/'.$article->id)->with('status', 'Artikel sudah pernah Disukai');
        }

        $articleLikes = new UserArticlesLike();
        $articleLikes->user_id = Auth::user()->id;
        $articleLikes->article_id = $id;
        $articleLikes->save();
        $article->save();

        return redirect('article/view/'.$article->id)->with('status', 'Artikel Disukai');
    }

    public function updateArticle(Request $request, $articleId) {
        if (!Auth::check()) {
            return back()->withInput()->with('error', 'Anda tidak berhak mengubah artikel');
        }

        try {
            $input = $request->all();

            $file = $request->file('lblHeaderImage');

            $article = Article::find($articleId)->first();
            $article->user_id = Auth::user()->id;
            $article->title = $input['lblJudul'];
            $article->content = $input['lblKonten'];
            $article->category_id = $input['lblCategory'];

            if (!empty($file)) {
                $filename = Str::random(20);

                $path = 'articles'.'/'.date('F').date('Y').'/';
                $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();

                $image = Image::make($file)->encode($file->getClientOriginalExtension(), 75);

                Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string) $image, 'public');
                $article->header_image = $fullPath;
            }


            $article->save();
            $article->retag(explode(",",$input['tags']));

            return redirect('article/view/'.$article->id)->with('status', 'Artikel Berhasil diperbaharui');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e);
        }
    }
}