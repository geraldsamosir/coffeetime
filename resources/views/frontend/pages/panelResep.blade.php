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
        <div class="col-md-9">
          <div class="section-panel-informasi">
            <div class="panel-card">
              <div class="panel-card-header">
                <h3 class="panel-title">List Artikel Anda</h3>
                <a style="width:100%;" href="/customer/article/create" class="btn btn-md btn-primary">Tulis Artikel</a>
                <hr>
              </div>
              <div class="panel-card-body">
                <ul class="list-article">
                  <ul class="list-group"><h3>Favorited</h3>
                    <hr>
                    <ul class="list-group list-article-favorited">
                      <div class="row">
                        @if(!empty($userLikedArticles))
                        @foreach($userLikedArticles as $userLikedArticle)
                          <a href={{url('/article/view/'.$userLikedArticle->article->id)}}>
                            <div class="col-md-12">
                              <div class="card-resep-full hvr-float-shadow">
                                <div class="row">
                                  <div class="col-md-5">
                                    <div style="height:200px;" class="resep-full-images">
                                      <img style="height:100%" class="img-responsive"
                                           src="{{ !empty($userLikedArticle->article->header_image) ? Voyager::image($userLikedArticle->article->header_image) : asset('images/placeholder-image.png') }}"
                                           alt="">
                                    </div>
                                  </div>
                                  <div class="col-md-7">
                                    <div class="resep-full-details">
                                      <span style="font-size: 18px;" class="resep-title">{{ str_limit($userLikedArticle->article->title, $limit = 20, $end = '...')}}
                                        <div
                                          class="resep-date">Created At: {{ date('F d, Y', strtotime($userLikedArticle->article->created_at)) }}</div></span>
                                      <div class="resep-brew">Created by
                                        : {{App\User::find($userLikedArticle->article->user_id)->name}}</div>
                                      <div class="resep-brew">
                                        @foreach($userLikedArticle->article->tagged as $tag)
                                          <span class="label label-primary">{{$tag->tag_name}}</span>
                                        @endforeach
                                      </div>
                                      <div class="resep-social-icon">
                                        <i class="fa fa-copy"></i>
                                        <span class="icon-comment">{{$userLikedArticle->article->copies}}</span>

                                        <i class="fa fa-thumbs-up"></i>
                                        <span class="icon-like">{{$userLikedArticle->article->likes}}</span>

                                        <i class="fa fa-eye"></i>
                                        <span class="icon-view">{{$userLikedArticle->article->views}}</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </a>
                        @endforeach
                      </div>
                      {{$userLikedArticles->appends(array_except(Request::query(), 'liked_page'))->links()}}
                      @endif
                    </ul>
                  </ul>
                  <ul class="list-group"><h3>Created</h3>
                    <hr>
                    <ul class="list-group list-article-created">
                      <div class="row">
                        @if(!empty($userArticles))
                        @foreach($userArticles as $userArticle)
                          <a href={{url('/article/view/'.$userArticle->id)}}>
                            <div class="col-md-12">
                              <div class="card-resep-full hvr-float-shadow">
                                <div class="row">
                                  <div class="col-md-5">
                                    <div style="height:200px;" class="resep-full-images">
                                      <img style="height:100%" class="img-responsive"
                                           src="{{ !empty($userArticle->header_image) ? Voyager::image($userArticle->header_image) : asset('images/placeholder-image.png') }}"
                                           alt="">
                                    </div>
                                  </div>
                                  <div class="col-md-7">
                                    <div class="resep-full-details">
                                    <span style="font-size: 18px;" class="resep-title">{{ str_limit($userArticle->title, $limit = 20, $end = '...')}}
                                      <div
                                        class="resep-date">Created At: {{ date('F d, Y', strtotime($userArticle->created_at)) }}</div></span>
                                      <div class="resep-brew">Created by
                                        : {{App\User::find($userArticle->user_id)->name}}</div>
                                      <div class="resep-brew">
                                        @foreach($userArticle->tagged as $tag)
                                          <span class="label label-primary">{{$tag->tag_name}}</span>
                                        @endforeach
                                      </div>
                                      <div class="resep-social-icon">
                                        <i class="fa fa-copy"></i>
                                        <span class="icon-comment">{{$userArticle->copies}}</span>

                                        <i class="fa fa-thumbs-up"></i>
                                        <span class="icon-like">{{$userArticle->likes}}</span>

                                        <i class="fa fa-eye"></i>
                                        <span class="icon-view">{{$userArticle->views}}</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </a>
                        @endforeach
                      </div>
                      {{$userArticles->appends(array_except(Request::query(), 'page'))->links()}}
                      @endif
                    </ul>
                  </ul>
                </ul>
                <div class="clearfix"></div>
                <hr>
                <a style="width:100%;" href="/customer/article/create" class="btn btn-md btn-primary">Tulis Artikel</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection