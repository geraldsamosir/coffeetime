@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')
	
{{-- Section Slider --}}
	<div class="slider slider-detail">
	    <ul class="slides">
	      	<li><img src="images/coffee/example1.jpg"></li>
	      	<li><img src="images/coffee/example8.jpg"></li>
	    </ul>
	</div>
{{-- End Section Slider --}}
{{-- ========================================== --}}



{{-- Section Detail --}}
	<div class="row">
		<div class="col s12">
			<h3 class="subtitle">Pembelian</h3>
			<span class="produk-detail-title">Aero Press 2000 XYZ</span>
			<span class="produk-detail-harga">Rp. 100.000</span>
		 	<div class="input-field col s12">
	          <input placeholder="1" id="jumlah" type="number" class="validate">
	          <label for="jumlah">Jumlah</label>
	        </div>
	        <div class="col s12">
	        	<a class="waves-effect waves-light btn" style="width:100%;margin-bottom: 16px;">Beli</a>
	        </div>
		</div>
	</div>
{{-- End Section Detail --}}
{{-- ========================================== --}}



{{-- Section Deskripsi --}}
	<div class="row">
		<div class="col s12">
			<h3 class="subtitle">Deskripsi</h3>

			<p class="p12 pgrey">Deskripsi Mesin</p>
			<p class="p12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa asperiores dolor iste eum, suscipit sapiente sunt repellat. Similique, inventore enim ad ut. Laborum, voluptatum officiis et unde magni suscipit velit.</p>
			
			<p class="p12 pgrey">Cara Penggunaan</p>
			<p class="p12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa asperiores dolor iste eum, suscipit sapiente sunt repellat. Similique, inventore enim ad ut. Laborum, voluptatum officiis et unde magni suscipit velit.</p>
		</div>
	</div>
{{-- End Section Deskripsi --}}
{{-- ========================================== --}}

{{-- Section Related --}}
	<div class="row">
		<h3 class="subtitle">Related Mesin Kopi</h3>
		<div class="col s12 m6">
		    <div class="card horizontal">
		      <div class="card-image card-image-resep">
		        <img src="images/coffee/example9.jpg">
		      </div>
		      <div class="card-stacked card-stacked-resep">
		        <div class="card-content">
		          <p class="p12"><b>Aeropress Filter</b></p>
		          <p class="p12 pprimer">Rp. 100.000</p>
		        </div>
		        <div class="card-action">
		          <a class="waves-effect waves-light btn">Beli</a>
		        </div>
		      </div>
		    </div>
		</div>
		<div class="col s12 m6">
		    <div class="card horizontal">
		      <div class="card-image card-image-resep">
		        <img src="images/coffee/example9.jpg">
		      </div>
		      <div class="card-stacked card-stacked-resep">
		        <div class="card-content">
		           <p class="p12"><b>Aeropress Filter</b></p>
		          <p class="p12 pprimer">Rp. 100.000</p>
		        </div>
		        <div class="card-action">
		          <a class="waves-effect waves-light btn">Beli</a>
		        </div>
		      </div>
		    </div>
		</div>
	</div>
{{-- End Section Resep --}}
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