@extends('layouts.frontend')

@section('title', 'User Profile')

@section('css')
  <style>
    .resep-social-icon * {
      color: black;
    }

    .hover-overlay:hover > li {
      opacity: 0.5;
    }
  </style>
@endsection


@section('content')
  <div class="section-profil">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel-default-header">
            <h3>Profil</h3>
          </div>
        </div>
      </div>

      <div class="row">
        {{-- Profile Kiri Start --}}
        <div class="col-md-4">
          <div class="card-social-left">
            <img src="{{ Voyager::image($user->avatar) }}" class="img-responsive" alt="User Images">
            <hr>
            <div class='oss-widget-interface'></div>
          </div>
        </div>
        {{-- Profile Kiri End --}}

        {{-- Profile Kanan Start --}}
        <div class="col-md-8">
          <div class="card-social-right">
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th>Nama</th>
                  <td>{{$user->name}}</td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>{{$user->email}}</td>
                </tr>
                <tr>
                  <th colspan="2"><a href="{{url('/user/portfolio/'.$user->id)}}" class="col-md-12 btn btn-warning">Lihat
                      Portfolio</a></th>
                </tr>
                </tbody>
              </table>
            </div>

            <div class="section-panel-informasi">
              <div class="panel-card">
                <div class="panel-card-header">
                  <h3 class="panel-title">List Artikel</h3>
                </div>
                <div class="panel-card-body">
                  <ul class="list-article">
                    <ul class="list-group"><h3>Favorited</h3>
                      <hr>
                      <ul class="list-group list-article-favorited">
                        @foreach($userLikedArticles as $userArticle)
                          <a class="hover-overlay" href={{url('article/view/'.$userArticle->article->id)}}>
                            <li class="list-group-item">{{$userArticle->article->title}}
                              <div class="resep-social-icon">
                                <i class="fa fa-copy"></i>
                                <span class="icon-comment">{{$userArticle->article->copies}}</span>

                                <i class="fa fa-thumbs-up"></i>
                                <span class="icon-like">{{$userArticle->article->likes}}</span>

                                <i class="fa fa-eye"></i>
                                <span class="icon-view">{{$userArticle->article->views}}</span>
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
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- Profile Kanan End --}}
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script type="text/javascript" src="//sharecdn.social9.com/v2/js/opensocialshare.js"></script>
  <script type="text/javascript" src="//sharecdn.social9.com/v2/js/opensocialsharedefaulttheme.js"></script>
  <link rel="stylesheet" type="text/css" href="//sharecdn.social9.com/v2/css/os-share-widget-style.css"/>
  <script>
      var shareWidget = new OpenSocialShare();
      shareWidget.init({
          isHorizontalLayout: 1,
          widgetIconSize: "32",
          widgetStyle: "square",
          theme: 'OpenSocialShareDefaultTheme',
          providers: {top: ["Facebook", "GooglePlus", "LinkedIn", "Twitter"]}
      });
      shareWidget.injectInterface(".oss-widget-interface");
      shareWidget.setWidgetTheme(".oss-widget-interface");
  </script>
@endsection