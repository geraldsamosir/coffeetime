@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')
  <style>
    .hidden {
      display: none;
    }
  </style>
  {{-- Section Detail Akun --}}
  <div class="row">
    @if (session('status'))
      <div class="total">
        <p class="p14">{{session('status')}}</p>
      </div>
    @endif

    @if (session('error'))
      <div class="total">
        <p class="p14">{{session('error')}}</p>
      </div>
    @endif
    <h3 class="subtitle">Detail Akun</h3>
    <div class="col s12">
      <div class="card">
        <div class="card-image card-akun-image">
          <img id="user-avatar" class="user-avatar" src="{{Voyager::image(Auth::user()->avatar)}}">
          <a href="#editakunmodal" class="btn-floating halfway-fab waves-effect waves-light red"><i
              class="material-icons">mode_edit</i></a>
        </div>
        <div class="card-content card-akun-content ppading">
          <p class="p12"><b>Nama:</b> {{Auth::user()->name}}</p>
          <p class="p12"><b>Email: </b>{{Auth::user()->email}}</p>
        </div>
      </div>
    </div>
  </div>
  {{-- End Section Detail Akun --}}
  {{-- ========================================== --}}


  {{-- Section Edit Detail Akun --}}
  {!! Form::open(['url'=>'/customer/edit/save', 'method'=>'POST', 'files'=>true]) !!}
  <div id="editakunmodal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h3 class="subtitle">Edit Akun</h3>
      <form action="#">
        <div class="file-field input-field">
          <div class="btn">
            <span>Image</span>
            <input type="file" id="lblAvatarFile" name="lblAvatarFile">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>

        <div class="input-field col s12">
          <input name="lblNama" value="{{Auth::user()->name}}" id="lblNama" type="text" class="validate">
          <label for="lblNama">Nama Lengkap</label>
        </div>

        <div class="input-field col s12">
          <input name="lblEmail" value="{{Auth::user()->email}}" id="lblEmail" type="email" class="validate">
          <label for="lblEmail">Email Address</label>
        </div>

        <div class="input-field col s12">
          <input type="checkbox" name="lblChangePassword" id="lblChangePassword" value="1">
          <label for="lblChangePassword">Ubah Password ?</label>
        </div>

        <div id="changePasswordInput" class="hidden">
          <div style="height:28px">

          </div>
          <div class="input-field col s12">
            <input id="lblPassword" name="lblPassword" type="password" class="validate">
            <label for="lblPassword">Password Lama</label>
          </div>

          <div class="input-field col s6">
            <input id="lblNewPassword" name="lblNewPassword" type="password" class="validate">
            <label for="lblNewPassword">Password Baru</label>
          </div>

          <div class="input-field col s12">
            <input id="lblNewPasswordConf" name="lblNewPasswordConf" type="password" class="validate">
            <label for="lblNewPasswordConf">Ulangi Password Baru</label>
          </div>

        </div>
      </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn" style="background: #ff5a5f">Batal</a>
      <button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn">Simpan</button>
    </div>
  </div>
  {!! Form::close() !!}
  {{-- End Section Edit Detail Akun --}}
  {{-- ========================================== --}}

@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('.modal').modal();

          $('input#lblChangePassword').change(function () {
              if (this.checked) {
                  $("#changePasswordInput").removeClass("hidden");
                  $("#lblPassword").focus();
                  $('.passwordField').attr('required', 'required');
              } else {
                  $("#changePasswordInput").addClass("hidden");
                  $('.passwordField').attr('required', 'false');
              }
          });
      });
  </script>
@endsection