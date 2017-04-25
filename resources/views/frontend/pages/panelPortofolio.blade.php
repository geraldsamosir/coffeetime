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
								<h3 class="panel-title">Detail Portofolio</h3>
							</div>
							<div class="panel-card-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<tbody>
											<tr>
												<th>Sertifikat</th>
												<td>: Sertifikat MPT, Sertifikat Barista</td>
											</tr>
										</tbody>
									</table>
								</div>
								<a href="/customer/portofolio/edit""><i class="fa fa-plus fa-1g"></i> Tambah Sertifikat</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection