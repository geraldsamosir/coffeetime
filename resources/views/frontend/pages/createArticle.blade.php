@extends('layouts.frontend')

@section('title', 'Panel Akun')

@section('css')
  <style>
    #headerPreview {
      width: 100%;
      max-height: 480px;
    }
  </style>
@endsection

@section('content')
  <div class="section-panel">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-panel-informasi">
            <div class="panel-card">
              <div class="panel-card-header">
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


                <center><h2 class="panel-title">Buat Artikel</h2></center>
                <hr>
              </div>
              {!! Form::open(['url'=>'/customer/article/save', 'method'=>'POST', 'files' => true]) !!}
              <div class="panel-card-body">

                <div class="form-group">
                  {!! Form::label('lblJudul',"Judul Artikel",['class'=>'required']) !!}
                  {!! Form::text('lblJudul',null,['class'=>'form-control','required']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('lblHeaderImage',"Gambar Header",['class'=>'required']) !!}
                  {!! Form::file('lblHeaderImage',null,['id' => 'lblHeaderImage','class'=>'form-control']) !!}
                  <img id="headerPreview" src="#" alt="your image" />
                </div>

                <div class="form-group">
                  {!! Form::label('lblProduct',"Product",[]) !!}
                  <select name="lblProduct" id="lblProduct" class="form-control">
                    <option value="" selected>Pilih Produk</option>
                    @foreach($products as $item)
                      <option value="{{$item['id']}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  {!! Form::label('lblCategory',"Kategori Artikel",['class'=>'required']) !!}
                  {!! Form::select('lblCategory',App\ArticleCategory::all()->mapWithKeys(function ($item) {
                    return [$item['id'] => $item['name']];
                  }),null,['class'=>'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('lblKonten',"Konten",['class'=>'required']) !!}
                  {!! Form::textarea('lblKonten',null,['id'=>'ckeditor', 'class'=>'form-control','required','rows'=>'7']) !!}
                </div>

                <div class="form-group">
                  <div class="taggleContainer">
                    {!! Form::label('lblTag',"Tag",['class'=>'required']) !!}
                    <p id="lblTag" class="input clearfix textarea example1"></p>
                  </div>
                  <button id="generateTag" type="button" class="btn btn-warning">Generate Tags</button>
                </div>

                <input id="tags" type="hidden" name="tags"/>

                {!! Form::submit('Simpan',['class'=>'btn btn-primary']) !!}
              </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      CKEDITOR.replace( 'ckeditor', {
          filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
          filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + csrfToken,
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='+ csrfToken
      });

      var taggle = new Taggle('lblTag', {
          onTagAdd: function(event, tag) {
              $('#tags').val(taggle.getTagValues())
          },
          onTagRemove: function(event, tag) {
              $('#tags').val(taggle.getTagValues())
          }
      });

      $('#generateTag').click(function() {
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

      $("#lblHeaderImage").change(function(){
          readURL(this);
      });
  </script>
@endsection