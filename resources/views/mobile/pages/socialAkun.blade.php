@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')
  <style>
    .hidden {
      display: none;
    }
  </style>
  {{-- Section Detail Akun --}}
  <div class="row">
    @if (session('status'))
      <div class="total">
        <p class="p14">{{session('status')}}</p>
      </div>
    @endif

    @if (session('error'))
      <div class="total">
        <p class="p14">{{session('error')}}</p>
      </div>
    @endif
    <h3 class="subtitle">Detail User</h3>
    <div class="col s12">
      <div class="card">
        <div class="card-image card-akun-image">
          <img id="user-avatar" class="user-avatar" src="{{Voyager::image($user->avatar)}}">
        </div>
        <div class="card-content card-akun-content ppading">
          <p class="p12"><b>Nama:</b> {{$user->name}}</p>
          <p class="p12"><b>Email: </b>{{$user->email}}</p>
        </div>
        <center>
          <h3>Rating ({{number_format($user->rating(),1)}})</h3>
          <div id="rateYo"></div>
        </center>
        @if(Auth::check() && Auth::user()->id != $user->id)
          <center style="margin-top: 12px;">
            <button data-target="modal1" class="btn modal-trigger">Berikan Rating</button>
          </center>
          <div id="modal1" class="modal bottom-sheet">
            <div class="modal-content">
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
        @endif
        <hr>
        <center>
          <div style="overflow:hidden;" class='oss-widget-interface'></div>
        </center>
      </div>
      <div class="row">
        <a href="{{url('/user/portfolio/'.$user->id)}}" class="col s12 waves-effect waves-light btn">lihat Portfolio</a>
      </div>
    </div>
  </div>
  {{-- End Section Detail Akun --}}
  {{-- ========================================== --}}
  <div class="row">
    <h3 class="subtitle">List Artikel Disukai</h3>
    @foreach($userLikedArticles as $userLikedArticle)
      <a href="/article/view/{{$userLikedArticle->article->id}}">
        <div class="col s12 m6">
          <div class="card horizontal">
            <div class="card-image card-image-resep">
              <img
                src="{{ !empty($userLikedArticle->article->header_image) ? Voyager::image($userLikedArticle->article->header_image) : asset('images/placeholder-image.png') }}">
            </div>
            <div class="card-stacked card-stacked-resep">
              <div class="card-content">
                <p class="ptitle">{{$userLikedArticle->article->title}} <span
                    class="pdate">Date: {{ date('F d, Y', strtotime($userLikedArticle->article->created_at)) }}</span></p>
                <p class="pcreated">Created by : {{App\User::find($userLikedArticle->article->user_id)->name}}</p>
                <p class="p12 social-stat">
                  <i class="material-icons" style="font-size:14px;">content_copy</i>{{$userLikedArticle->article->copies}}
                  <i class="material-icons" style="font-size:14px;">visibility</i>{{$userLikedArticle->article->views}}
                  <i class="material-icons" style="font-size:14px;">thumb_up</i>{{$userLikedArticle->article->likes}}
                </p>
                <p>
                  @foreach($userLikedArticle->article->tagged as $tag)
                    <span style="padding:4px 8px; border-radius: 2pt;height: auto; line-height: 1.2em" class="chip">{{$tag->tag_name}}</span>
                  @endforeach
                </p>
              </div>
            </div>
          </div>
        </div>
      </a>
    @endforeach
  </div>

  <div class="row">
    <h3 class="subtitle">List Artikel Dibuat</h3>
    @foreach($userArticles as $userArticle)
      <a href="/article/view/{{$userArticle->id}}">
        <div class="col s12 m6">
          <div class="card horizontal">
            <div class="card-image card-image-resep">
              <img
                src="{{ !empty($userArticle->header_image) ? Voyager::image($userArticle->header_image) : asset('images/placeholder-image.png') }}">
            </div>
            <div class="card-stacked card-stacked-resep">
              <div class="card-content">
                <p class="ptitle">{{$userArticle->title}} <span
                    class="pdate">Date: {{ date('F d, Y', strtotime($userArticle->created_at)) }}</span></p>
                <p class="pcreated">Created by : {{App\User::find($userArticle->user_id)->name}}</p>
                <p class="p12 social-stat">
                  <i class="material-icons" style="font-size:14px;">content_copy</i>{{$userArticle->copies}}
                  <i class="material-icons" style="font-size:14px;">visibility</i>{{$userArticle->views}}
                  <i class="material-icons" style="font-size:14px;">thumb_up</i>{{$userArticle->likes}}
                </p>
                <p>
                  @foreach($userArticle->tagged as $tag)
                    <span style="padding:4px 8px; border-radius: 2pt;height: auto; line-height: 1.2em" class="chip">{{$tag->tag_name}}</span>
                  @endforeach
                </p>
              </div>
            </div>
          </div>
        </div>
      </a>
    @endforeach
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


      $(document).ready(function () {
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
          $('.modal').modal();
      });
  </script>
@endsection