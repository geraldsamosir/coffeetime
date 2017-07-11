@extends('layouts.mobile')

@section('title','| Homepage')


@section('content')
  <style>
    #headerPreview {
      width: 100%;
      max-height: 480px;
    }
  </style>

  {{-- Section Resep Image --}}
  <div class="row">
    @if (session('status'))
      <div class="chip">
        {{ session('status') }}
      </div>
    @endif

    @if (session('error'))
      <div class="chip">
        {{ session('error') }}
      </div>
    @endif
  </div>

  {!! Form::open(['url'=>'/customer/article/save/', 'method'=>'POST', 'files' => true]) !!}

  <center>
    <h3 class="panel-title">Copy Artikel ({{$article->title}})</h3>
    <h3>Milik <span style="color:blue;">{{App\User::find($article->user_id)->name}}</span></h3>
  </center>
  {{-- Section Deskripsi --}}
  <div class="row">
    {{ Form::hidden('parentId', $article->id) }}
    <div class="row input-field col s12">
      <input value="{{$article->title}}" placeholder="Judul Artikel" id="lblJudul" name="lblJudul" type="text"
             class="validate">
    </div>

    <div class="row col s12 file-field input-field">
      <div class="col s12 file-path-wrapper">
        <center><img id="headerPreview" src="{{ Voyager::image($article->header_image) }}" alt="Header Image"/></center>
      </div>
      <div class="btn col s12">
        <span>Upload Gambar Header</span>
        <input type="file" id="lblHeaderImage" name="lblHeaderImage"/>
        {{ Form::hidden('oldHeaderImage', $article->header_image) }}
      </div>
    </div>

    <div class="row input-field col s12">
      <select disabled name="lblProduct" id="lblProduct">
        <option value="" selected>Pilih Produk</option>
        @if($article->product_id != null && !empty(App\Product::find($article->product_id)))
          <option selected>{{App\Product::find($article->product_id)->name}}</option>
        @endif
      </select>
      <label>Produk</label>
    </div>

    <div class="row input-field col s12">
      <select name="lblCategory" id="lblCategory">
        <option value="" selected>Pilih Kategori</option>
        @foreach(App\ArticleCategory::all() as $item)
          <option @if($item['id'] == $article->category_id) selected
                  @endif value="{{$item['id']}}">{{$item['name']}}</option>
        @endforeach
      </select>
      <label>Kategori</label>
    </div>

    <div class="row col s12 input-field">
      {!! Form::textarea('lblKonten',null,['id'=>'ckeditor', 'class'=>'form-control','required','rows'=>'7']) !!}
    </div>

    <div class="row col s12 input-field">
      <div class="taggleContainer">
        {!! Form::label('lblTag',"Tag",['class'=>'required']) !!}
        <p id="lblTag" class="input clearfix textarea example1"></p>
      </div>
    </div>

    <input id="tags" type="hidden" name="tags"/>

    <div class="row col s12 input-field">
      <button class="btn col s12" type="submit">Buat Artikel</button>
    </div>

  </div>
  {!! Form::close() !!}


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

      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      CKEDITOR.replace('ckeditor', {
          filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
          filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + csrfToken,
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=' + csrfToken
      });

      CKEDITOR.instances['ckeditor'].setData(<?php echo json_encode($article->content); ?>)

      tagArr = []

        @foreach($article->tagged as $tag)
          var tagString = <?php echo json_encode($tag->tag_name); ?>;
          tagArr.push(tagString)
        @endforeach

          CKEDITOR.env.isCompatible = true;

      var taggle = new Taggle('lblTag', {
          tags: tagArr,
          onTagAdd: function (event, tag) {
              $('#tags').val(taggle.getTagValues())
          },
          onTagRemove: function (event, tag) {
              $('#tags').val(taggle.getTagValues())
          }
      });

      if ($('#headerPreview').attr('src') == "#") {
          $('#headerPreview').addClass('hidden')
      } else {
          $('#headerPreview').removeClass('hidden')
      }

      function readURL(input) {

          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#headerPreview').attr('src', e.target.result);
                  if ($('#headerPreview').attr('src') == "#") {
                      $('#headerPreview').addClass('hidden')
                  } else {
                      $('#headerPreview').removeClass('hidden')
                  }
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

      $("#lblHeaderImage").change(function () {
          readURL(this);
      });


  </script>


@endsection