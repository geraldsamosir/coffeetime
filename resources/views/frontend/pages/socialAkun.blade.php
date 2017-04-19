@extends('layouts.frontend')

@section('title', 'User Profile')

@section('content')
	<div class="section-profil">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-default-header">
						<h3>Profil</h3>
					</div>
				</div>
			</div>

			<div class="row">
				{{-- Profile Kiri Start --}}
				<div class="col-md-4">
					<div class="card-social-left">
						<img src="{{ asset('images/user.png') }}" alt="User Images">
						<ul class="card-social-akun">
							<li><a href=""><i class="fa fa-facebook-square fa-2x"></i></a></li>
							<li><a href=""><i class="fa fa-twitter-square fa-2x"></i></a></li>
							<li><a href=""><i class="fa fa-google-plus-square fa-2x"></i></a></li>
						</ul>
					</div>
				</div>
				{{-- Profile Kiri End --}}

				{{-- Profile Kanan Start --}}
				<div class="col-md-8">
					<div class="card-social-right">
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
										 <td>0812 2345 6789</td>
									</tr>
									<tr>
									 	<th>Sertifikat</th>
										 <td>Sertifikat MPT, Sertifikat Barista</td>
									</tr>
								</tbody>
							</table>
						</div>

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
					</div>
				</div>
				{{-- Profile Kanan End --}}
			</div>
		</div>
	</div>
@endsection