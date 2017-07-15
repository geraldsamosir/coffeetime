@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

  {{-- Section Panel Resep Akun --}}
  <div class="row">
    <h3 class="subtitle">List Artikel Anda</h3>
    <div class="col s12">
      <p class="14"><b>Favorited</b></p>
      <ul class="collection">
        @foreach($userLikedArticles as $userLikedArticle)
          <li class="collection-item avatar">
            <a href="{{url('article/view/'.$userLikedArticle->article->id)}}" class="panel-resep-title">
              {{$userLikedArticle->article->title}}
              <img src="{{ !empty($userLikedArticle->article->header_image) ? Voyager::image($userLikedArticle->article->header_image) : asset('images/placeholder-image.png') }}" alt="" class="circle">
              <p class="pstat social-stat">
                <i class="material-icons" style="font-size:14px;">content_copy</i>{{$userLikedArticle->article->copies}}
                <i class="material-icons" style="font-size:14px;">visibility</i>{{$userLikedArticle->article->views}}
                <i class="material-icons" style="font-size:14px;">thumb_up</i>{{$userLikedArticle->article->likes}}
              </p>
            </a>
          </li>
        @endforeach
        <center>{{$userLikedArticles->appends(array_except(Request::query(), 'liked_page'))->links()}}</center>
      </ul>
    </div>

    <div class="col s12">
      <p class="14"><b>Created</b></p>
      <ul class="collection">
        @foreach($userArticles as $userArticle)
          <li class="collection-item avatar">
            <a href="{{url('article/view/'.$userArticle->id)}}" class="panel-resep-title">
              {{$userArticle->title}}
              <img src="{{ !empty($userArticle->header_image) ? Voyager::image($userArticle->header_image) : asset('images/placeholder-image.png') }}" alt="" class="circle">
              <p class="pstat social-stat">
                <i class="material-icons" style="font-size:14px;">content_copy</i>{{$userArticle->copies}}
                <i class="material-icons" style="font-size:14px;">visibility</i>{{$userArticle->views}}
                <i class="material-icons" style="font-size:14px;">thumb_up</i>{{$userArticle->likes}}
              </p>
            </a>
          </li>
        @endforeach
        <center>{{$userArticles->appends(array_except(Request::query(), 'page'))->links()}}</center>
      </ul>
    </div>

    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
      <a href="/customer/article/create" class="btn-floating btn-large red">
        <i class="material-icons">add</i>
      </a>
    </div>
  </div>

  {{-- End Section Panel Resep Akun --}}
  {{-- ========================================== --}}


@endsection

@section('js')
@endsection