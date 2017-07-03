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
								<h3 class="panel-title">Detail Akun</h3>
							</div>
							<div class="panel-card-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<tbody>
											<tr>
												<th>Nama</th>
												<td>Albert Ang</td>
											</tr>
											<tr>
												<th>Email</th>
												<td>albert@gmail.com</td>
											</tr>
											<tr>
												<th>No. Hp</th>
												<td>081223456789</td>
											</tr>
										</tbody>
									</table>
								</div>
								<a href="/customer/edit" class="btn btn-warning btn-edit">Update Info</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection