@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

  {{-- Section Sorting --}}
  {!! Form::open(['url'=>'/search-article', 'method'=>'GET']) !!}
  <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">search</i>Filter</div>
      <div class="row collapsible-body">
        <div class="input-field col s12">
          {!! Form::text('query',app('request')->input('query'),['class'=>'col-md-12 form-control','placeholder'=>'Cari Artikel...',]) !!}
          <label for="namaproduk">Cari Artikel</label>
        </div>

        <div class="input-field col s6">
          {!! Form::select('sort',['default'=>'Sorting Artikel','likes'=>'Like Terbanyak','views'=>'View Terbanyak','latest'=>'Terbaru','oldest'=>'Terlama'], app('request')->input('sort') ? app('request')->input('sort') : 'default',['class'=>'form-control', 'required']) !!}
        </div>

        <div class="input-field col s6">
          <button type="submit" class="waves-effect waves-light btn">Filter</button>
        </div>
      </div>
    </li>
  </ul>
  {!! Form::close() !!}
  {{-- End Section Sorting --}}
  {{-- ========================================== --}}


  {{-- Section Card Resep --}}
  <div class="row">
    @foreach($articles as $article)
      <a href="/article/view/{{$article->id}}">
      <div class="col s12 m6">
        <div class="card horizontal">
          <div class="card-image card-image-resep">
            <img
              src="{{ !empty($article->header_image) ? Voyager::image($article->header_image) : asset('images/placeholder-image.png') }}">
          </div>
          <div class="card-stacked card-stacked-resep">
            <div class="card-content">
              <p class="ptitle">{{$article->title}} <span
                  class="pdate">Date: {{ date('F d, Y', strtotime($article->created_at)) }}</span></p>
              <p class="pcreated">Created by : {{App\User::find($article->user_id)->name}}</p>
              <p class="p12 social-stat">
                <i class="material-icons" style="font-size:14px;">content_copy</i>{{$article->copies}}
                <i class="material-icons" style="font-size:14px;">visibility</i>{{$article->views}}
                <i class="material-icons" style="font-size:14px;">thumb_up</i>{{$article->likes}}
              </p>
              <p>
                @foreach($article->tagged as $tag)
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
  {{$articles->appends(app('request')->except('page'))->links()}}
  {{-- End Section Card Resep --}}
  {{-- ========================================== --}}

@endsection

@section('js')


  <script>

      $(document).ready(function () {
          $('select').material_select();
          $('.collapsible').collapsible();
      });


  </script>


@endsection