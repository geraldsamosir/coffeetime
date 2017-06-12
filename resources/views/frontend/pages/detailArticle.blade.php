@extends('layouts.frontend')

@section('title','| Detail Resep')

@section('content')
	<div class="section-details-resep">
		<div class="details-resep-title">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="resep-title-name">
							{{$article->title}}
							<span class="title-date">Date: 12-12-2016</span>
						</div>
						<div class="resep-title-creator">
							Created by : <a href="">{{App\User::find($article->user_id)->name}}</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="resep-fork">
							<button class="btn btn-primary">Copy Resep</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="details-resep-image">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="resep-image">
							<img src="/images/coffee/example11.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="details-resep-social">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="resep-social-count">
							<span class="social-count-comment">
								<i class="fa fa-comment-o fa-1x"></i>
								20
							</span>
							<span class="social-count-like">
								<i class="fa fa-thumbs-o-up fa-1x"></i>
								{{$article->likes}}
							</span>

							<span class="social-count-view">
								<i class="fa fa-eye fa-1x"></i>
								{{$article->views}}
							</span>

							<span class="social-count-copy">
								<i class="fa fa-copy fa-1x"></i>
								{{$article->copies}}
							</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="resep-social-share">
							Share
							<span class="social-share-facebook">
								<a href="">
									<i class="fa fa-facebook-square fa-2x"></i>
								</a>
							</span>
							<span class="social-share-twitter">
								<a href="">
									<i class="fa fa-twitter-square fa-2x"></i>
								</a>
							</span>
							<span class="social-share-googleplus">
								<a href="">
									<i class="fa fa-google-plus-square fa-2x"></i>
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="details-resep-deskripsi">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="card-default">
							{!! $article->content !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<div class="details-resep-komentar"></div>
	</div>
@endsection