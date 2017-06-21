@extends('layouts.frontend')

@section('title', 'Panel Akun')

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
                <h3 class="panel-title">List Resep Anda</h3>
              </div>
              <div class="panel-card-body">
                <ul class="list-article">
                  <li>Favorited
                    <ul class="list-article-favorited">
                      <li><a href="/detail-resep">Resep Kopi Susu Manis</a></li>
                    </ul>
                  </li>
                  <li>Created
                    <ul class="list-article-created">
                      @foreach($userArticles as $userArticle)
                        <li><a href={{url('article/view/'.$userArticle->id)}}>{{$userArticle->title}}</a></li>
                      @endforeach
                    </ul>
                  </li>
                </ul>
                <a href="/customer/article/create" class="btn btn-md btn-primary">Buat Resep</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection