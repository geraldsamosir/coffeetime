@extends('layouts.frontend')

@section('title','| List Resep')

@section('content')
  <div class="section-sorting">
    <div class="container">
      <div class="panel-search">
        <div class="row">
          <div class="col-md-4">
            {!! Form::open(['url'=>'']) !!}
            <div class="form-group">
              <div class="input-group input-group-md">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <div class="icon-addon addon-md">
                  {{-- <input type="text" placeholder="Cari Resep..." class="form-control" name="keyword""> --}}
                  {!! Form::text('keyword',null,['class'=>'form-control','placeholder'=>'Cari Resep...',]) !!}
                </div>
              </div>
            </div>
            {!! Form::close() !!}
          </div>

          <div class="col-md-2">
            <div class="sorting-date">
              <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true">
                  Urutkan
                  <i class="fa fa-sort-down"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li><a href="#">Most Likes</a></li>
                  <li><a href="#">Most View</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Paling Lama</a></li>
                  <li><a href="#">Paling Baru</a></li>
                </ul>
              </div>
            </div>
          </div>
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
      {{$articles->links()}}
    </div>
  </div>
@endsection