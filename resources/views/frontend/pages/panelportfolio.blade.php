@extends('layouts.frontend')

@section('title', 'Panel Akun')

@section('content')
	<div class="section-panel">
		<div class="container">
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
			<div class="row">
				<div class="col-md-12">
					<div class="section-panel-informasi">
						<div class="panel-card">
							<div class="panel-card-header">
								<h3 class="panel-title">Portfolio user {{isset($user) ? $user->name : Auth::user()->name}}</h3>
							</div>
              @if(!isset($user) || $user->id == Auth::user()->id)
							<a class="btn btn-primary" href="/customer/portfolio/edit""><i class="fa fa-edit fa-1g"></i> Edit Portfolio</a>
              @endif
							<hr>
							<div class="panel-card-body">
								{!! Auth::user()->portfolio !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection