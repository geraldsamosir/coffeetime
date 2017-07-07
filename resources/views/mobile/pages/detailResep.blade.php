@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')
	
{{-- Section Resep Image --}}
	<div class="row">
		<div class="col s12">
			<div class="resep-image">
				<p class="ptitle">Capuccino Nias <span class="pdate">Date: 12-12-2016</span></span>
				<p class="pcreated">Created by : <a href="">Invokerista</a></p>
				<img src="images/coffee/example11.jpg" alt="resep-image">
			</div>
			<div class="resep-social">
				<div class="resep-stat">
					<p class="pstat social-stat">
		          	  <i class="material-icons" style="font-size:14px;">content_copy</i>10
		          	  <i class="material-icons" style="font-size:14px;">visibility</i>10
		          	  <i class="material-icons" style="font-size:14px;">thumb_up</i>10
		          	</p>
				</div>
				{{-- <div class="resep-share">
					<a href=""><i class="material-icons">textsms</i></a>
					<a href=""><i class="material-icons">textsms</i></a>
					<a href=""><i class="material-icons">textsms</i></a>
				</div> --}}
			</div>
		</div>
	</div>
{{-- End Section Slider --}}
{{-- ========================================== --}}


{{-- Section Deskripsi --}}
	<div class="row">
		<div class="col s12">
			<div class="card">
				<h3 class="subtitle2">Deskripsi</h3>
			</div>
			<p class="p12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa asperiores dolor iste eum, suscipit sapiente sunt repellat. Similique, inventore enim ad ut. Laborum, voluptatum officiis et unde magni suscipit velit.</p>
		</div>

		<div class="col s12">
			<div class="card">
				<h3 class="subtitle2">Bahan</h3>
			</div>
			<p class="p12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa asperiores dolor iste eum, suscipit sapiente sunt repellat. Similique, inventore enim ad ut. Laborum, voluptatum officiis et unde magni suscipit velit.</p>
		</div>
		
		<div class="col s12">
			<div class="card">
				<h3 class="subtitle2">Alat</h3>
			</div>
			<a href="detail-mesin">Aeropress 2000</a>
		</div>

		<div class="col s12">
			<div class="card">
				<h3 class="subtitle2">Cara</h3>
			</div>
			<p class="p12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa asperiores dolor iste eum, suscipit sapiente sunt repellat. Similique, inventore enim ad ut. Laborum, voluptatum officiis et unde magni suscipit velit.</p>
		</div>



	</div>
{{-- End Section Deskripsi --}}
{{-- ========================================== --}}



@endsection

@section('js')
	
	 
	<script>
		$(document).ready(function(){
	      $('.slider').slider({
	      	height: 200
	      });

	      $('select').material_select();
	    });


	</script>
        

@endsection