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

  {!! Form::open(['url'=>'/customer/article/save', 'method'=>'POST', 'files' => true]) !!}

  {{-- Section Deskripsi --}}
  <div class="row">

    <div class="row input-field col s12">
      <input placeholder="Judul Artikel" id="lblJudul" name="lblJudul" type="text" class="validate">
    </div>

    <div class="row col s12 file-field input-field">
      <div class="col s12 file-path-wrapper">
        <center><img id="headerPreview" src="#" alt="Header Image" /></center>
      </div>
      <div class="btn col s12">
        <span>Upload Gambar Header</span>
        <input type="file" id="lblHeaderImage" name="lblHeaderImage"/>
      </div>
    </div>

    <div class="row input-field col s12">
      <select name="lblProduct" id="lblProduct">
        <option value="" selected>Pilih Produk</option>
        @foreach($products as $item)
          <option value="{{$item['id']}}">{{$item->name}}</option>
          @endforeach
      </select>
      <label>Produk</label>
    </div>

    <div class="row input-field col s12">
      <select name="lblCategory" id="lblCategory">
        <option value="" selected>Pilih Kategori</option>
        @foreach(App\ArticleCategory::all() as $item)
          <option value="{{$item['id']}}">{{$item['name']}}</option>
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
    <button id="generateTag" type="button" class="btn btn-warning">Generate Tags</button>
    </div>

    <input id="tags" type="hidden" name="tags"/>

    <div class="row col s12 input-field">
      <button class="btn col s12" type="submit">Submit Artikel</button>
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

      CKEDITOR.env.isCompatible = true;

      var taggle = new Taggle('lblTag', {
          onTagAdd: function (event, tag) {
              $('#tags').val(taggle.getTagValues())
          },
          onTagRemove: function (event, tag) {
              $('#tags').val(taggle.getTagValues())
          }
      });

      $('#generateTag').click(function () {
          taggle.removeAll();
          var tags = []
          @foreach($existingTags as $tag)
          var string = <?php echo json_encode($tag->name) ?>;
          if (CKEDITOR.instances['ckeditor'].getData().toLowerCase().search(string.toLowerCase()) >= 0) {
              tags.push(string)
          }
          @endforeach
          taggle.add(tags)

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