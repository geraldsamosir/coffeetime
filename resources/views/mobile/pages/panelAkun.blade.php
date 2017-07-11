@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

{{-- Section Detail Akun --}}
	<div class="row">
		<h3 class="subtitle">Detail Akun</h3>
		<div class="col s12">
	      <div class="card">
	        <div class="card-image card-akun-image">
	          	<img src="{{asset("images/user.png")}}">
	          	<a href="#editakunmodal" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
	        </div>
	        <div class="card-content card-akun-content ppading">
	          	<p class="p12"><b>Nama:</b> Albert</p>
	          	<p class="p12"><b>Email: </b>albert@gmail.com</p>
	        </div>
	      </div>
	    </div>
	</div>
{{-- End Section Detail Akun --}}
{{-- ========================================== --}}


{{-- Section Edit Detail Akun --}}
	<div id="editakunmodal" class="modal modal-fixed-footer">
	    <div class="modal-content">
	      	<h3 class="subtitle">Edit Akun</h3>
			<form action="#">
			    <div class="file-field input-field">
			      <div class="btn">
			        <span>Image</span>
			        <input type="file">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>

			    <div class="input-field col s12">
		          <input id="nama" type="text" class="validate">
		          <label for="nama">Nama Lengkap</label>
		        </div>

		        <div class="input-field col s12">
		          <input id="email" type="email" class="validate">
		          <label for="email">Email Address</label>
		        </div>

		       	<div class="input-field col s12">
		       		<input type="checkbox" name="lblChangePassword" id="lblChangePassword" value="1">
		       		<label for="lblChangePassword">Ubah Password ?</label>
		       	</div>

		        <div id="changePasswordInput" class="hidden">
					<div class="input-field col s12">
			          <input id="passwordlama" type="password" class="validate">
			          <label for="passwordlama">Password Lama</label>
			        </div>

			        <div class="input-field col s6">
			          <input id="passwordbaru" type="email" class="validate">
			          <label for="passwordbaru">Password Baru</label>
			        </div>

				    <div class="input-field col s12">
			          <input id="passwrodbaruconf" type="password" class="validate">
			          <label for="passwrodbaruconf">Ulangi Password Baru</label>
			        </div>

		        </div>
			</form>
	    </div>
	    <div class="modal-footer">
	     	<a href="#!" class="modal-action modal-close waves-effect waves-green btn" style="background: #ff5a5f">Batal</a>
	      	<a href="#!" class="modal-action modal-close waves-effect waves-green btn">Simpan</a>
	    </div>
	</div>
{{-- End Section Edit Detail Akun --}}
{{-- ========================================== --}}
	
@endsection

@section('js')
	<script>
		$(document).ready(function(){
	    	$('.modal').modal();

	    	$('input#lblChangePassword').change(function() {
	          if(this.checked) {
	              $("#changePasswordInput").removeClass("hidden");
	              $('.passwordField').attr('required', 'required');
	          } else {
	              $("#changePasswordInput").addClass("hidden");
	              $('.passwordField').attr('required', 'false');
	          }
	      	});
	  	});
	</script>
@endsection