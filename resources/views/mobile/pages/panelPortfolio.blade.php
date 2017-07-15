@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')
	<style>
		#content, img {
			max-width: 100%;
			height: auto !important;
		}
	</style>

{{-- Section Portofolio Akun --}}
	<div class="row">
		@if (session('status'))
			<div class="total">
				<p class="p14">{{session('status')}}</p>
			</div>
		@endif
		<h3 class="subtitle">Portfolio user {{isset($user) ? $user->name : Auth::user()->name}}</h3>
		<div class="col s12">
			<div class="fixed-action-btn horizontal" style="position: absolute; display: inline-block; right: 24px;">
	      		<a href="#editportofoliomodal" class="btn-floating waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
	      	</div>
			{!! Auth::user()->portfolio !!}
	    </div>
	</div>
{{-- End Section Portofolio Akun --}}
{{-- ========================================== --}}


{{-- Section Edit Portofolio Akun --}}
	{!! Form::open(['url'=>'/customer/portfolio/save', 'method'=>'POST']) !!}
	<div id="editportofoliomodal" style="height:100%;max-height: 100%;" class="modal bottom-sheet modal-fixed-footer">
	    <div class="modal-content">
	      	<h3 class="subtitle">Tulis Portofolio</h3>
	      	<p class="12">Anda boleh bercerita tentang diri anda atau memasukkan gambar sertifikat atau penghargaan pada laman portfolio</p>
			<form action="#">
			    <div class="input-field col s12">
		          <textarea id="ckeditor" name="lblPortfolio" class="materialize-textarea"></textarea>
		        </div>
			</form>
	    </div>
	    <div class="modal-footer">
	     	<a href="#!" class="modal-action modal-close waves-effect waves-green btn" style="background: #ff5a5f">Batal</a>
	      	<button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn">Simpan</button>
	    </div>
	</div>
	{!! Form::close() !!}
{{-- End Section Edit Portofolio Akun --}}
{{-- ========================================== --}}
	
@endsection

@section('js')
	<script>
		$(document).ready(function(){
	    	$('.modal').modal();
	  	});

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