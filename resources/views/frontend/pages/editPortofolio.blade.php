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
				<div class="col-md-4">
					<div class="section-panel-informasi">
						<div class="panel-card">
							<div class="panel-card-header">
								<h3 class="panel-title">Edit Portofolio</h3>
							</div>
							{!! Form::open(['url'=>'']) !!}
							<div class="panel-card-body">

								<div class="form-group">
									{!! Form::label('lblSertifikat','Sertifikat') !!}
									{!! Form::textarea('lblSertifikat','Sertifikat MPT, Sertifikat Barista',['class'=>'form-control','required','rows'=>'5']) !!}
								</div>
								
								<a href="/customer/portofolio" class="btn btn-tohome">Batal</a>
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