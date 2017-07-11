@extends('layouts.mobile')

@section('title','| Homepage')


@section('content')
  <style>
    .content, img {
      max-width: 100%;
      height: auto !important;
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


  {{-- Section Deskripsi --}}
  <div class="row">
    <div class="col s12 input-field">
      {!! Form::textarea('lblKonten',null,['id'=>'ckeditor', 'class'=>'form-control','required','rows'=>'7']) !!}
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

      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      CKEDITOR.replace( 'ckeditor', {
          filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
          filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + csrfToken,
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='+ csrfToken
      });

      CKEDITOR.env.isCompatible = true;

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


  </script>


@endsection