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
              Created by : <a href="{{url('/user/'.$article->user_id)}}">{{App\User::find($article->user_id)->name}}</a>
            </div>
            @if($article->parent_id)
              <div class="resep-title-creator">
                Copied from : <a href="{{url('/article/view/'.$article->parent_id)}}">{{App\Article::where('id', $article->parent_id)->first()->title}}</a>
              </div>
            @endif
          </div>
          <div class="col-md-6">
            <div class="resep-fork">
              @if(Auth::check())
                <a href="/customer/article/copy/{{$article->id}}" class="btn btn-warning" style="margin: 8px">Copy
                  Article</a>
              @endif
              @if(Auth::check() && $article->user_id == Auth::user()->id)
                <a href="/customer/article/edit/{{$article->id}}" class="btn btn-success" style="margin: 8px">Edit
                  Article</a>
              @endif
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
              <a href="{{Auth::check() ? url('article/like/'.$article->id) : url('/login')}}">
                <span class="social-count-like">
                  <i class="fa fa-thumbs-o-up fa-1x"></i>
                  {{$article->likes}}
                </span>
              </a>
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
            <div id="content" class="card-default">
              {!! $article->content !!}
            </div>
            @foreach($article->tagged as $tag)
              <span class="label label-primary">{{$tag->tag_name}}</span>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    @if(count($relatedArticle) > 0)
      <div class="section-resep-coffee">
        <div class="container">
          {{-- Baris Related Resep Start --}}
          <div class="row">
            <div class="col-md-12">
              <div class="panel-default-header">
                <h3>Resep</h3>
              </div>
              <div class="resep-coffee-list">
                <div class="row">
                  {{-- List Resep Start --}}
                  @foreach($relatedArticle as $article)
                    <div class="col-md-6">
                      <div class="card-resep hvr-float-shadow">
                        <div class="row">
                          <a href="/article/view/{{$article->id}}">
                            <div class="col-md-4">
                              <div class="resep-image">
                                <img style="height:100%" class="img-responsive"
                                     src="{{ !empty($article->header_image) ? Voyager::image($article->header_image) : asset('images/placeholder-image.png') }}"
                                     alt="">
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="resep-list-details">
                                <span class="resep-title">{{$article->title}}</span>
                                <div class="resep-brew">
                                  @foreach($article->tagged as $tag)
                                    <span class="label label-primary">{{$tag->tag_name}}</span>
                                  @endforeach
                                </div>
                                <div class="resep-social-icon">
                                  <i class="fa fa-thumbs-up"></i>
                                  <span class="icont-like">{{$article->likes}}</span>

                                  <i class="fa fa-eye"></i>
                                  <span class="icon-view">{{$article->views}}</span>
                                </div>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  {{-- List Resep End --}}
                </div>
              </div>
            </div>
          </div>
          {{-- Baris Related Resep End --}}
        </div>
      </div>
    @endif


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

      function keywordconvertArticle(str, id)  {
          return "<a href=\"/article/views/"+encodeURIComponent(id)+"\">"+str+"</a>";
      }

      function searchArticle(keyword, id) {
          var content = document.getElementById("content");
          var re = new RegExp("("+keyword+")","g");
          content.innerHTML = content.innerHTML.replace(re, keywordconvertArticle(string, id));
      }

      @foreach($articlesForAnchor as $article)
        var string = <?php echo json_encode($article->title) ?>;
        var id = <?php echo json_encode($article->id) ?>;
        searchArticle(string, id)
      @endforeach

      function keywordconvertProduct(str, id)  {
          return "<a href=\"/detail-coffee/"+encodeURIComponent(id)+"\">"+str+"</a>";
      }

      function searchProduct(keyword, id) {
          var content = document.getElementById("content");
          var re = new RegExp("("+keyword+")","g");
          content.innerHTML = content.innerHTML.replace(re, keywordconvertProduct(string, id));
      }

        @foreach($productsForAnchor as $product)
          var string = <?php echo json_encode($product->name) ?>;
          var id = <?php echo json_encode($product->id) ?>;
          searchProduct(string, id)
        @endforeach
  </script>
@endsection