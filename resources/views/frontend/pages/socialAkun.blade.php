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
  @if (session('status'))
    <div class="alert alert-success">
      <center>{{ session('status') }}</center>
    </div>
  @endif
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
            <img style="margin: 0 auto;" src="{{ Voyager::image($user->avatar) }}" class="img-responsive"
                 alt="User Images">
            <hr>
            <h3>Rating ({{number_format($user->rating(),1)}})</h3>
            <center>
              <div id="rateYo"></div>
            </center>
            @if(Auth::check() && Auth::user()->id != $user->id)
              <center style="margin-top: 12px;">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Berikan Rating
                </button>
              </center>@endif
            <hr>
            <div class='oss-widget-interface'></div>
          </div>
        </div>
        {{-- Profile Kiri End --}}

        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body">
                <center><div id="rateYoSend"></div></center>
              </div>
              <div class="modal-footer">
                {!! Form::open(['url'=>'/user/rate/'.$user->id, 'method'=>'POST']) !!}
                <input id="rating" type="hidden" name="rating"/>
                <button type="submit" class="btn btn-info">Rate</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::close() !!}
              </div>
            </div>

          </div>
        </div>

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
                        <div class="row">
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
                      </ul>
                    </ul>
                    <ul class="list-group"><h3>Created</h3>
                      <hr>
                      <ul class="list-group list-article-created">
                        <div class="row">
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
      $("#rateYo").rateYo({
          precision: 1,
          readOnly: true,
          rating: {{$user->rating() ? $user->rating() : 0}}
      });

      $("#rateYoSend").rateYo({
          precision: 0,
          onChange: function (rating, rateYoInstance) {
              $('input#rating').val(rating);
          }
      });

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