@extends('layouts.frontend')

@section('title', 'Panel Akun')

@section('css')
  <style>
    .resep-social-icon * {
      color: black;
    }
    .hover-overlay:hover > li {
      opacity: 0.5;
    }
  </style>

@section('content')
  <div class="section-panel">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          {{-- Sidepanel from components --}}
          @include('frontend.components.sidepanel')
        </div>
        <div class="col-md-6">
          <div class="section-panel-informasi">
            <div class="panel-card">
              <div class="panel-card-header">
                <h3 class="panel-title">List Artikel Anda</h3>
              </div>
              <div class="panel-card-body">
                <ul class="list-article">
                  <ul class="list-group"><h3>Favorited</h3>
                    <hr>
                    <ul class="list-group list-article-favorited">
                      @foreach($userLikedArticles as $userLikedArticle)
                        <a class="hover-overlay" href={{url('article/view/'.$userLikedArticle->article->id)}}>
                        <li class="list-group-item">{{$userLikedArticle->article->title}}
                          <div class="resep-social-icon">
                            <i class="fa fa-copy"></i>
                            <span class="icon-comment">{{$userLikedArticle->article->copies}}</span>

                            <i class="fa fa-thumbs-up"></i>
                            <span class="icon-like">{{$userLikedArticle->article->likes}}</span>

                            <i class="fa fa-eye"></i>
                            <span class="icon-view">{{$userLikedArticle->article->views}}</span>
                          </div></li>
                        </a>
                      @endforeach
                      {{$userLikedArticles->appends(array_except(Request::query(), 'liked_page'))->links()}}
                    </ul>
                  </ul>
                  <ul class="list-group"><h3>Created</h3>
                    <hr>
                    <ul class="list-group list-article-created">
                      @foreach($userArticles as $userArticle)
                        <a class="hover-overlay" href={{url('article/view/'.$userArticle->id)}}>
                        <li class="list-group-item">{{$userArticle->title}}
                          <div class="resep-social-icon">
                            <i class="fa fa-copy"></i>
                            <span class="icon-comment">{{$userArticle->copies}}</span>

                            <i class="fa fa-thumbs-up"></i>
                            <span class="icon-like">{{$userArticle->likes}}</span>

                            <i class="fa fa-eye"></i>
                            <span class="icon-view">{{$userArticle->views}}</span>
                          </div></li>
                        </a>
                      @endforeach
                        {{$userArticles->appends(array_except(Request::query(), 'page'))->links()}}
                    </ul>
                  </ul>
                </ul>
                <a href="/customer/article/create" class="btn btn-md btn-primary">Tulis Artikel</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection