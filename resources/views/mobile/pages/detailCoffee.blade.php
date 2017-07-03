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
		<div class="col s12 m7">
			<h3 class="subtitle">Pembelian</h3>
			<span class="produk-detail-title">Drip Coffee 10g Arabica Flores "Manggarai</span>
			<span class="produk-detail-harga">Rp. 100.000</span>
		   	<div class="input-field col s12">
			    <select>
			      <option value="" disabled selected>Pilih Brew Method</option>
			      <option value="1">DRIP</option>
			      <option value="2">ESPRESSO</option>
			      <option value="3">AEROPRESS</option>
			    </select>
			    <label>Brew Method</label>
		  	</div>
		 	<div class="input-field col s12">
	          <input placeholder="1" id="jumlah" type="number" class="validate">
	          <label for="jumlah">Jumlah</label>
	        </div>
	        <div class="col s12">
	        	<a class="waves-effect waves-light btn" style="width:100%;margin-bottom: 16px;">Beli</a>
	        </div>
		</div>

		<div class="col s12 m5">
			<h3 class="subtitle">Details</h3>
			<table class="striped table-detail">
		        <tbody>
			        <tr>
						<td>Acidity</td>
						<td>Lastic</td>
					</tr>
					<tr>
						<td>Altitude</td>
						<td>1200</td>
					</tr>
					<tr>
						<td>Flavour</td>
						<td>Milk Chocolate</td>
					</tr>
					<tr>
						<td>Mouthfeel</td>
						<td>Creamy</td>
					</tr>
					<tr>
						<td>Coutry</td>
						<td>Brazil</td>
					</tr>
					<tr>
						<td>Process</td>
						<td>Pulped Natural</td>
					</tr>
					<tr>
						<td>Producer</td>
						<td>Planalto</td>
					</tr>
					<tr>
						<td>Roast Profile</td>
						<td>Medium</td>
					</tr>
					<tr>
						<td>Sweetness</td>
						<td>Refind Sugar</td>
					</tr>
					<tr>
						<td>Tasting Note</td>
						<td>Milk Chococolate Sake</td>
					</tr>
					<tr>
						<td>Varietal</td>
						<td>Yellow Catuai</td>
					</tr>
		        </tbody>
		    </table>
		</div>
	</div>
{{-- End Section Detail --}}
{{-- ========================================== --}}



{{-- Section Deskripsi --}}
	<div class="row">
		<div class="col s12">
			<h3 class="subtitle">Deskripsi</h3>
			<p class="p12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa asperiores dolor iste eum, suscipit sapiente sunt repellat. Similique, inventore enim ad ut. Laborum, voluptatum officiis et unde magni suscipit velit.</p>
		</div>
	</div>
{{-- End Section Deskripsi --}}
{{-- ========================================== --}}



{{-- Section Resep --}}
	<div class="row">
		<h3 class="subtitle">Resep</h3>
		<div class="col s12 m6">
		    <div class="card horizontal">
		      <div class="card-image card-image-resep">
		        <img src="images/coffee/example9.jpg">
		      </div>
		      <div class="card-stacked card-stacked-resep">
		        <div class="card-content">
		          <p class="p12"><b>Macciato Nias</b></p>
		          <p class="p12 social-stat">
		          	  <i class="material-icons" style="font-size:14px;">textsms</i>10
		          	  <i class="material-icons" style="font-size:14px;">visibility</i>10
		          	  <i class="material-icons" style="font-size:14px;">thumb_up</i>10
		          </p>
		        </div>
		        <div class="card-action">
		          <a class="p12" href="#">Lihat</a>
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
		          <p class="p12"><b>Macciato Nias</b></p>
		          <p class="p12 social-stat">
		          	  <i class="material-icons" style="font-size:14px;">textsms</i>10
		          	  <i class="material-icons" style="font-size:14px;">visibility</i>10
		          	  <i class="material-icons" style="font-size:14px;">thumb_up</i>10
		          </p>
		        </div>
		        <div class="card-action">
		          <a class="p12" href="#">Lihat</a>
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