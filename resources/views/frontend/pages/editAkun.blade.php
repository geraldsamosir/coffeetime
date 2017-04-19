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
								<h3 class="panel-title">Edit Akun</h3>
							</div>
							{!! Form::open(['url'=>'']) !!}
							<div class="panel-card-body">

								<div class="form-group">
									{!! Form::label('lblNama','Nama Lengkap',['class'=>'required']) !!}
									{!! Form::text('lblNama','Darma Kurniawan Harefa',['class'=>'form-control','required']) !!}
								</div>
								
								<div class="form-group">
									{!! Form::label('lblEmail','Email Address',['class'=>'required']) !!}
									{!! Form::email('lblEmail','darmakurniawanharefa@gmail.com',['class'=>'form-control','required']) !!}
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