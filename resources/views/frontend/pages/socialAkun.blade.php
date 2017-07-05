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
						<img src="{{ Voyager::image($user->avatar) }}" class="img-responsive" alt="User Images">
						<hr>
						<div class='oss-widget-interface'></div>
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
										 <td>{{$user->name}}</td>
									</tr>
									<tr>
									 	<th>Email</th>
										 <td>{{$user->email}}</td>
									</tr>
									<tr>
									 	<th colspan="2"><a href="{{url('/user/portfolio/'.$user->id)}}" class="col-md-12 btn btn-warning">Lihat Portfolio</a></th>
									</tr>
								</tbody>
							</table>
						</div>

						<ul class="list-article">
							<li>Favorited
								<ul class="list-article-favorited">
									<li><a href="/detail-resep">Resep Kopi Susu Manis</a></li>
								</ul>
							</li>
							<li>Created
								<ul class="list-article-created">
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

@section('js')
	<script type="text/javascript" src="//sharecdn.social9.com/v2/js/opensocialshare.js"></script>
	<script type="text/javascript" src="//sharecdn.social9.com/v2/js/opensocialsharedefaulttheme.js"></script>
	<link rel="stylesheet" type="text/css" href="//sharecdn.social9.com/v2/css/os-share-widget-style.css"/>
	<script>
      var shareWidget = new OpenSocialShare();
      shareWidget.init({
          isHorizontalLayout: 1,
          widgetIconSize: "32",
          widgetStyle: "square",
          theme: 'OpenSocialShareDefaultTheme',
          providers: {top: ["Facebook", "GooglePlus", "LinkedIn", "Twitter"]}
      });
      shareWidget.injectInterface(".oss-widget-interface");
      shareWidget.setWidgetTheme(".oss-widget-interface");
	</script>
@endsection