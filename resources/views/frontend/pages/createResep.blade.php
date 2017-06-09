@extends('layouts.frontend')

@section('title', 'Panel Akun')

@section('content')
  <div class="section-panel">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          {{-- Sidepanel from components --}}
          @include('frontend.components.sidepanel')
        </div>
        <div class="col-md-8">
          <div class="section-panel-informasi">
            <div class="panel-card">
              <div class="panel-card-header">
                <h3 class="panel-title">Buat Resep</h3>
              </div>
              {!! Form::open(['url'=>'']) !!}
              <div class="panel-card-body">
                <div class="form-group">
                  {!! Form::label('lblProduct',"Product",[]) !!}
                  <p>{{$product->name}}</p>
                </div>

                <div class="form-group">
                  {!! Form::label('lblJudul',"Judul Artikel",['class'=>'required']) !!}
                  {!! Form::text('lblJudul',null,['class'=>'form-control','required']) !!}
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
    new Taggle('lblTag');
  </script>
@endsection