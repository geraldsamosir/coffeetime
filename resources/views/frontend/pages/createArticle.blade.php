@extends('layouts.frontend')

@section('title', 'Panel Akun')

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
              {!! Form::open(['url'=>'/customer/article/save', 'method'=>'POST']) !!}
              <div class="panel-card-body">

                <div class="form-group">
                  {!! Form::label('lblJudul',"Judul Artikel",['class'=>'required']) !!}
                  {!! Form::text('lblJudul',null,['class'=>'form-control','required']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblProduct',"Product",[]) !!}
                  {!! Form::select('lblProduct',$permissions->mapWithKeys(function ($item) {
                    return [$item['id'] => $item->product->name];
                  }),null,['class'=>'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('lblCategory',"Kategori Artikel",['class'=>'required']) !!}
                  {!! Form::select('lblCategory',App\ArticleCategory::all()->mapWithKeys(function ($item) {
                    return [$item['id'] => $item['name']];
                  }),null,['class'=>'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('lblKonten',"Konten",['class'=>'required']) !!}
                  {!! Form::textarea('lblKonten',null,['class'=>'form-control ckeditor','required','rows'=>'7']) !!}
                </div>

                <div class="taggleContainer">
                  {!! Form::label('lblTag',"Tag",['class'=>'required']) !!}
                  <p id="lblTag" class="input clearfix textarea example1"></p>
                </div>

                <input id=tags type="hidden" name="tags[]"/>

                <a href="/customer/panelResep" class="btn btn-tohome">Batal</a>
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
      var taggle = new Taggle('lblTag', {
          onTagAdd: function(event, tag) {
              $('#tags').val(taggle.getTagValues())
          },
          onTagRemove: function(event, tag) {
              $('#tags').val(taggle.getTagValues())
          }
      });
  </script>
@endsection