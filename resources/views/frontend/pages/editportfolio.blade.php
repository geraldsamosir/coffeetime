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
                <h3 class="panel-title">Tulis portfolio</h3>
                <p>Anda boleh bercerita tentang diri anda atau memasukkan gambar sertifikat atau penghargaan pada laman portfolio</p>
              </div>
              {!! Form::open(['url'=>'/customer/portfolio/save', 'method'=>'POST']) !!}
              <div class="panel-card-body">

                {!! Form::textarea('lblPortfolio',null,['id'=>'ckeditor', 'class'=>'form-control','required','rows'=>'12']) !!}

                <hr>
                <a href="/customer/portfolio" class="btn btn-tohome">Batal</a>
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

      CKEDITOR.instances['ckeditor'].setData(<?php echo json_encode(Auth::user()->portfolio); ?>)
  </script>
@endsection