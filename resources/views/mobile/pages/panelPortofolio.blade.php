@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

{{-- Section Portofolio Akun --}}
	<div class="row">
		<h3 class="subtitle">Portofolio user albert</h3>
		<div class="col s12">
			<div class="fixed-action-btn horizontal" style="position: absolute; display: inline-block; right: 24px;">
	      		<a href="#editportofoliomodal" class="btn-floating waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
	      	</div>
	      	<p class="12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi nobis, cumque repellat quidem voluptas dolorum placeat tenetur quod rerum enim. Id enim error itaque necessitatibus, repellendus! Nesciunt nobis culpa, enim.</p>
	    </div>
	</div>
{{-- End Section Portofolio Akun --}}
{{-- ========================================== --}}


{{-- Section Edit Portofolio Akun --}}
	<div id="editportofoliomodal" class="modal modal-fixed-footer">
	    <div class="modal-content">
	      	<h3 class="subtitle">Tulis Portofolio</h3>
	      	<p class="12">Anda boleh bercerita tentang diri anda atau memasukkan gambar sertifikat atau penghargaan pada laman portfolio</p>
			<form action="#">
			    <div class="input-field col s12">
		          <textarea id="textarea1" class="materialize-textarea"></textarea>
		          <label for="textarea1">Portofolio</label>
		        </div>
			</form>
	    </div>
	    <div class="modal-footer">
	     	<a href="#!" class="modal-action modal-close waves-effect waves-green btn" style="background: #ff5a5f">Batal</a>
	      	<a href="#!" class="modal-action modal-close waves-effect waves-green btn">Simpan</a>
	    </div>
	</div>
{{-- End Section Edit Portofolio Akun --}}
{{-- ========================================== --}}
	
@endsection

@section('js')
	<script>
		$(document).ready(function(){
	    	$('.modal').modal();
	  	});
	</script>
@endsection