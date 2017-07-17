@extends('layouts.mobile')

@section('title','| Homepage')


@section('content')
  <style>
    #content, img {
      max-width: 100%;
      height: auto !important;
    }
  </style>

  {{-- Section Resep Image --}}
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
  </div>
  <div class="row">
    @if(Auth::check())
      <div class="col s6" style="padding: 0 8px;">
        <a href="/customer/article/copy/{{$article->id}}" class="waves-effect waves-light col s12 btn" style="background: #ff8c00">Copy artikel</a>
      </div>
    @endif
    @if(Auth::check() && $article->user_id == Auth::user()->id)
      <div class="col s6" style="padding: 0 8px;">
        <a href="/customer/article/edit/{{$article->id}}" class="waves-effect waves-light col s12 btn">Edit artikel</a>
      </div>
    @endif
  </div>
  <div class="row">
    <div class="col s12">
      <div class="resep-image">
        <p class="ptitle">{{$article->title}} <span
            class="pdate">Date: {{ date('F d, Y', strtotime($article->created_at)) }}</span></p>
        <p class="pcreated">Created by : <a
            href="{{url('/user/'.$article->user_id)}}">{{App\User::find($article->user_id)->name}}</a></p>
        @if($article->parent_id)
          <p class="pcreated">Copied from : <a
              href="{{url('/article/view/'.$article->parent_id)}}">{{App\Article::where('id', $article->parent_id)->first()->title}}</a>
          </p>
        @endif
        <div style="overflow:hidden;" class='pull-left oss-widget-interface'></div>
        <img src="{{ Voyager::image($article->header_image) }}"
             onerror="this.style.display='none'" alt="resep-image">
      </div>
      <div class="resep-social">
        <div class="resep-stat">
          <p class="pstat social-stat">
            <a href="{{Auth::check() ? url('article/like/'.$article->id) : url('/login')}}">
              <i class="material-icons" style="font-size:14px;">thumb_up</i>{{$article->likes}}
            </a>
            <i class="material-icons" style="font-size:14px;">content_copy</i>{{$article->copies}}
            <i class="material-icons" style="font-size:14px;">visibility</i>{{$article->views}}

          </p>
        </div>
        {{-- <div class="resep-share">
          <a href=""><i class="material-icons">textsms</i></a>
          <a href=""><i class="material-icons">textsms</i></a>
          <a href=""><i class="material-icons">textsms</i></a>
        </div> --}}
      </div>
    </div>
  </div>
  {{-- End Section Slider --}}
  {{-- ========================================== --}}


  {{-- Section Deskripsi --}}
  <div class="row">
    <div class="col s12">
      <div id="content" class="card-default">
        {!! $article->content !!}
      </div>
      @foreach($article->tagged as $tag)
        <span class="chip">{{$tag->tag_name}}</span>
      @endforeach
    </div>


  </div>

  @if(count($relatedArticle) > 0)
    {{-- Section Deskripsi --}}
    <div class="row">
      <div class="col s12">
        <div class="card">
          <h3 class="subtitle2">Artikel Terkait</h3>
        </div>
        @foreach($relatedArticle as $related)
          <a href="/article/view/{{$related->id}}">
            <div class="col s12 m6">
              <div class="card horizontal">
                <div class="card-image card-image-resep">
                  <img
                    src="{{ !empty($related->header_image) ? Voyager::image($related->header_image) : asset('images/placeholder-image.png') }}">
                </div>
                <div class="card-stacked card-stacked-resep">
                  <div class="card-content">
                    <p class="ptitle">{{$related->title}} <span
                        class="pdate">Date: {{ date('F d, Y', strtotime($related->created_at)) }}</span></p>
                    <p class="pcreated">Created by : <a href="">{{App\User::find($article->user_id)->name}}</a></p>
                    <p class="p12 social-stat">
                      <i class="material-icons" style="font-size:14px;">content_copy</i>{{$related->copies}}
                      <i class="material-icons" style="font-size:14px;">visibility</i>{{$related->views}}
                      <i class="material-icons" style="font-size:14px;">thumb_up</i>{{$related->likes}}
                    </p>
                    <p>
                      @foreach($related->tagged as $tag)
                        <span class="chip">{{$tag->tag_name}}</span>
                      @endforeach
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  @endif
  {{-- End Section Deskripsi --}}
  {{-- ========================================== --}}

  <div class="row">
    <div class="card">
      <div class="fb-comments" data-href={{Request::url()}} data-numposts="5"></div>
    </div>
  </div>



@endsection

@section('js')
  <script type="text/javascript" src="//sharecdn.social9.com/v2/js/opensocialshare.js"></script>
  <script type="text/javascript" src="//sharecdn.social9.com/v2/js/opensocialsharedefaulttheme.js"></script>
  <link rel="stylesheet" type="text/css" href="//sharecdn.social9.com/v2/css/os-share-widget-style.css"/>


  <script>
      $(document).ready(function () {
          $('.slider').slider({
              height: 200
          });

          $('select').material_select();
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

      function keywordconvertArticle(str, id) {
          return "<a href=\"/article/view/" + encodeURIComponent(id) + "\">" + str + "</a>";
      }

      function searchArticle(keyword, id) {
          var content = document.getElementById("content");
          var re = new RegExp("(" + keyword + ")", "g");
          content.innerHTML = content.innerHTML.replace(re, keywordconvertArticle(string, id));
      }

        @foreach($articlesForAnchor as $article)
      var string = <?php echo json_encode($article->title) ?>;
      var id = <?php echo json_encode($article->id) ?>;
      searchArticle(string, id)
      @endforeach

      function keywordconvertProduct(str, id) {
          return "<a href=\"/detail-coffee/" + encodeURIComponent(id) + "\">" + str + "</a>";
      }

      function searchProduct(keyword, id) {
          var content = document.getElementById("content");
          var re = new RegExp("(" + keyword + ")", "g");
          content.innerHTML = content.innerHTML.replace(re, keywordconvertProduct(string, id));
      }

        @foreach($productsForAnchor as $product)
      var string = <?php echo json_encode($product->name) ?>;
      var id = <?php echo json_encode($product->id) ?>;
      searchProduct(string, id)
    @endforeach


  </script>


@endsection