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
				<div class="col-md-6">
					<div class="section-panel-informasi">
						<div class="panel-card">
							<div class="panel-card-header">
								<h3 class="panel-title">List Resep Anda</h3>
							</div>
							<div class="panel-card-body">
								<ul class="list-resep">
									<li>Favorited
										<ul class="list-resep-favorited">
											<li><a href="/detail-resep">Resep Kopi Susu Manis</a></li>
										</ul>
									</li>
									<li>Created
										<ul class="list-resep-created">
											<li><a href="/detail-resep">Resep Kopi Sanger</a></li>
										</ul>
									</li>
								</ul>
								<a href="/customer/article/create" class="btn btn-md btn-primary">Buat Resep</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection