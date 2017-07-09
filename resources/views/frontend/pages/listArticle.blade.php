@extends('layouts.frontend')

@section('title','| List Resep')

@section('content')
  <div class="section-sorting">
    <div class="container">
      <div class="panel-search">
        <div class="row">
            {!! Form::open(['url'=>'/search-article', 'method'=>'GET']) !!}
            <div class="form-group col-md-4">
              <div class="input-group col-md-12">
                <div class="icon-addon addon-md">
                  {{-- <input type="text" placeholder="Cari Resep..." class="form-control" name="keyword""> --}}
                  {!! Form::text('query',app('request')->input('query'),['class'=>'col-md-12 form-control','placeholder'=>'Cari Artikel...',]) !!}
                </div>
              </div>
            </div>

          <div class="col-md-2">
            <div class="sorting-date">
              <div class="dropdown">
                {!! Form::select('sort',['default'=>'Sorting Artikel','likes'=>'Like Terbanyak','views'=>'View Terbanyak','latest'=>'Terbaru','oldest'=>'Terlama'], app('request')->input('sort') ? app('request')->input('sort') : 'default',['class'=>'form-control', 'required']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-2">
            <button type="submit" class="btn btn-success">Lakukan Filter</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
  <div class="section-list">
    <div class="container">
      <div class="row">

        @foreach($articles as $article)
          <a href={{url('/article/view/'.$article->id)}}>
            <div class="col-md-10">
              <div class="card-resep-full hvr-float-shadow">
                <div class="row">
                  <div class="col-md-4">
                    <div style="height:200px;" class="resep-full-images">
                      <img style="height:100%" class="img-responsive" src="{{ !empty($article->header_image) ? Voyager::image($article->header_image) : asset('images/placeholder-image.png') }}"
                           alt="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="resep-full-details">
                      <span class="resep-title">{{$article->title}} <span class="resep-date">Created At: {{ date('F d, Y', strtotime($article->created_at)) }}</span></span>
                      <div class="resep-brew">Created by : {{App\User::find($article->user_id)->name}}</div>
                      <div class="resep-brew">
                        @foreach($article->tagged as $tag)
                          <span class="label label-primary">{{$tag->tag_name}}</span>
                        @endforeach
                      </div>
                      <div class="resep-social-icon">
                        <i class="fa fa-copy fa-2x"></i>
                        <span class="icon-comment">{{$article->copies}}</span>

                        <i class="fa fa-thumbs-up fa-2x"></i>
                        <span class="icon-like">{{$article->likes}}</span>

                        <i class="fa fa-eye fa-2x"></i>
                        <span class="icon-view">{{$article->views}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        @endforeach
      </div>
      {{$articles->appends(app('request')->except('page'))->links()}}
    </div>
  </div>
@endsection