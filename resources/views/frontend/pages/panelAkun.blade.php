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
								<h3 class="panel-title">Panel Akun</h3>
							</div>
							<div class="panel-card-body">
								<h3>Informasi Pribadi <a href="/customer/edit">Ubah</a></h3>	
								<p>Darma Kurniawan Harefa</p>
								<p>darmakurniawanharefa@gmail.com</p> <br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection