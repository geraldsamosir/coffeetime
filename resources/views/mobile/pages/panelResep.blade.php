@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

{{-- Section Panel Resep Akun --}}
	<div class="row">
		<h3 class="subtitle">List Artikel Anda</h3>
		<div class="col s12">
			<p class="14"><b>Favorited</b></p>
			<ul class="collection">
			    <li class="collection-item avatar">
			    	<a href="" class="panel-resep-title">
				      	Disini Judul Artikel
				      	<img src="{{asset('images/coffee/example11.jpg')}}" alt="" class="circle">
				      	<p class="pstat social-stat">
			          	  	<i class="material-icons" style="font-size:14px;">content_copy</i>10
			          	  	<i class="material-icons" style="font-size:14px;">visibility</i>10
			          	  	<i class="material-icons" style="font-size:14px;">thumb_up</i>10
			          	</p>
			      		<a href="#!" class="secondary-content"><i class="material-icons">favorite</i></a>
			      	</a>
			    </li>
			     <li class="collection-item avatar">
			    	<a href="" class="panel-resep-title">
				      	Disini Judul Artikel
				      	<img src="{{asset('images/coffee/example11.jpg')}}" alt="" class="circle">
				      	<p class="pstat social-stat">
			          	  	<i class="material-icons" style="font-size:14px;">content_copy</i>10
			          	  	<i class="material-icons" style="font-size:14px;">visibility</i>10
			          	  	<i class="material-icons" style="font-size:14px;">thumb_up</i>10
			          	</p>
			      		<a href="#!" class="secondary-content"><i class="material-icons">favorite</i></a>
			      	</a>
			    </li>
			     <li class="collection-item avatar">
			    	<a href="" class="panel-resep-title">
				      	Disini Judul Artikel
				      	<img src="{{asset('images/coffee/example11.jpg')}}" alt="" class="circle">
				      	<p class="pstat social-stat">
			          	  	<i class="material-icons" style="font-size:14px;">content_copy</i>10
			          	  	<i class="material-icons" style="font-size:14px;">visibility</i>10
			          	  	<i class="material-icons" style="font-size:14px;">thumb_up</i>10
			          	</p>
			      		<a href="#!" class="secondary-content"><i class="material-icons">favorite</i></a>
			      	</a>
			    </li>
			</ul>  
	    </div>

	    <div class="col s12">
			<p class="14"><b>Created</b></p>
			<ul class="collection">
			    <li class="collection-item avatar">
			    	<a href="" class="panel-resep-title">
				      	Disini Judul Artikel
				      	<img src="{{asset('images/coffee/example11.jpg')}}" alt="" class="circle">
				      	<p class="pstat social-stat">
			          	  	<i class="material-icons" style="font-size:14px;">content_copy</i>10
			          	  	<i class="material-icons" style="font-size:14px;">visibility</i>10
			          	  	<i class="material-icons" style="font-size:14px;">thumb_up</i>10
			          	</p>
			      	</a>
			    </li>
			     <li class="collection-item avatar">
			    	<a href="" class="panel-resep-title">
				      	Disini Judul Artikel
				      	<img src="{{asset('images/coffee/example11.jpg')}}" alt="" class="circle">
				      	<p class="pstat social-stat">
			          	  	<i class="material-icons" style="font-size:14px;">content_copy</i>10
			          	  	<i class="material-icons" style="font-size:14px;">visibility</i>10
			          	  	<i class="material-icons" style="font-size:14px;">thumb_up</i>10
			          	</p>
			      	</a>
			    </li>
			     <li class="collection-item avatar">
			    	<a href="" class="panel-resep-title">
				      	Disini Judul Artikel
				      	<img src="{{asset('images/coffee/example11.jpg')}}" alt="" class="circle">
				      	<p class="pstat social-stat">
			          	  	<i class="material-icons" style="font-size:14px;">content_copy</i>10
			          	  	<i class="material-icons" style="font-size:14px;">visibility</i>10
			          	  	<i class="material-icons" style="font-size:14px;">thumb_up</i>10
			          	</p>
			      	</a>
			    </li>
			</ul>  
	    </div>

	    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
          <a class="btn-floating btn-large red">
            <i class="material-icons">add</i>
          </a>
        </div>
	</div>

	<div class="row">
		<div class="col s12">
			<ul class="pagination" style="bottom: 10px;text-align: center;">
			    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
			    <li class="active"><a href="#!">1</a></li>
			    <li class="waves-effect"><a href="#!">2</a></li>
			    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
			</ul>
		</div>
	</div>
{{-- End Section Panel Resep Akun --}}
{{-- ========================================== --}}

	
@endsection

@section('js')
@endsection