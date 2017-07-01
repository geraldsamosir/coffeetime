@extends('layouts.frontend')

@section('title', 'Panel Akun')

@section('content')
  <div class="section-panel">
    <div class="container">
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
      <div class="row">
        <div class="col-md-3">
          {{-- Sidepanel from components --}}
          @include('frontend.components.sidepanel')
        </div>
        <div class="col-md-4">
          <div class="section-panel-informasi">
            <div class="panel-card">
              <div class="panel-card-header">
                <h3 class="panel-title">Edit Akun</h3>
              </div>
              {!! Form::open(['url'=>'/customer/edit/save', 'method'=>'POST', 'files'=>true]) !!}
              <div class="panel-card-body">

                <div class="form-group">
                  <img id="user-avatar" class="img-responsive user-avatar" src={{Voyager::image(Auth::user()->avatar)}} />
                  <input type="file" id="lblAvatarFile" name="lblAvatarFile">
                </div>
                <hr>
                <div class="form-group">
                  {!! Form::label('lblNama','Nama Lengkap',['class'=>'required']) !!}
                  {!! Form::text('lblNama',Auth::user()->name,['class'=>'form-control','required']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('lblEmail','Email Address',['class'=>'required']) !!}
                  {!! Form::email('lblEmail',Auth::user()->email,['class'=>'form-control','required']) !!}
                </div>

                <div class="form-group">
                  <input type="checkbox" name="lblChangePassword" id="lblChangePassword" value="1">
                  &nbsp;
                  {!! Form::label('lblChangePassword','Ubah Password ?') !!}
                </div>

                <div id="changePasswordInput" class="hidden">

                  <div class="form-group">
                    {!! Form::label('lblPassword','Password Lama',[]) !!}
                    {!! Form::password('lblPassword',['class'=>'form-control passwordField']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('lblNewPassword','Password Baru',[]) !!}
                    {!! Form::password('lblNewPassword',['class'=>'form-control passwordField']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('lblNewPasswordConf','Ulangi Password Baru',[]) !!}
                    {!! Form::password('lblNewPasswordConf',['class'=>'form-control passwordField']) !!}
                  </div>
                </div>

                <a href="/customer/akun" class="btn btn-tohome">Batal</a>
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
      $( "input#lblChangePassword" ).change(function() {
          if(this.checked) {
              $("#changePasswordInput").removeClass("hidden");
              $('.passwordField').attr('required', 'required');
          } else {
              $("#changePasswordInput").addClass("hidden");
              $('.passwordField').attr('required', 'false');
          }
      });

      function readURL(input) {

          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#user-avatar').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

      $("#lblAvatarFile").change(function(){
          console.log('test')
          readURL(this);
      });
  </script>
@endsection