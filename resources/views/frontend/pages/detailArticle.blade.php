@extends('layouts.frontend')

@section('title','| Detail Resep')

@section('content')
  <div class="section-details-resep">
    <div class="details-resep-title">
      <div class="container">
        <div class="row">
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif

          @if (session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
          @endif
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="resep-title-name">
              {{$article->title}}
              <span class="title-date">{{ date('F d, Y', strtotime($article->created_at)) }}</span>
            </div>
            <div class="resep-title-creator">
              Created by : <a href="">{{App\User::find($article->user_id)->name}}</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="resep-fork">
              <button class="btn btn-primary">Copy Resep</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="details-resep-image">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="resep-image">
              <img class="img-responsive" style="max-height:280px;" src="{{ Voyager::image($article->header_image) }}"
                   onerror="this.style.display='none'" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="details-resep-social">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="resep-social-count">
							<span class="social-count-like">
								<i class="fa fa-thumbs-o-up fa-1x"></i>
                {{$article->likes}}
							</span>

              <span class="social-count-view">
								<i class="fa fa-eye fa-1x"></i>
                {{$article->views}}
							</span>

              <span class="social-count-copy">
								<i class="fa fa-copy fa-1x"></i>
                {{$article->copies}}
							</span>
            </div>
          </div>
          <div class="col-md-3">
            <span style="position:absolute; bottom: 20%; font-weight:900; font-size:1.3em;">Share</span>
            <div class='pull-right oss-widget-interface'></div>
          </div>
        </div>
      </div>
    </div>
    <div class="details-resep-deskripsi">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card-default">
              {!! $article->content !!}
            </div>
            @foreach($article->tagged as $tag)
              <span class="label label-primary">{{$tag->tag_name}}</span>
            @endforeach
          </div>
        </div>
      </div>
    </div>


    <div class="details-resep-komentar">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="fb-comments" data-href={{Request::url()}} data-numposts="5"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')

  <script type="text/javascript" src="//sharecdn.social9.com/v2/js/opensocialshare.js"></script>
  <script type="text/javascript" src="//sharecdn.social9.com/v2/js/opensocialsharedefaulttheme.js"></script>
  <link rel="stylesheet" type="text/css" href="//sharecdn.social9.com/v2/css/os-share-widget-style.css"/>
  <script type="text/javascript">
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