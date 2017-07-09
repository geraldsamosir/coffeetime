@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

{{-- Section Cart --}}
	<div class="row">
		<h3 class="subtitle">Keranjang Belanja (2)</h3>

		<div class="col s12 m6">
            <div class="collection">
              <a href="" class="collection-item">Total : <b>Rp. 200.000</b></a>
            </div>
		</div>
		
		<div class="col s12 m6">
	    	<div class="card horizontal">
		      	<div class="card-image">
		        	<img src="images/coffee/example1.jpg">
		      	</div>
	      		<div class="card-stacked">
	        		<div class="card-content">
	          			<h3 class="produk-title activator">NIAS 200G KOPI ARABICA<i class="material-icons right">more_vert</i></h3>
	          			<p>wholebean</p>
	          			<p>Rp 100.000</p>
	          			<div class="input-field col s12">
				          <input placeholder="1" id="jumlah" type="number" class="validate" value="1">
				        </div>
				        <p style="padding: 5px;">Sub Total : <b>Rp. 100.000</b></p>
	        		</div>
	      		</div>
	      		<div class="card-reveal">
	      			<span class="card-title grey-text text-darken-4">&nbsp;<i class="material-icons right">close</i></span>
			      	<a class="waves-effect waves-light btn" style="width:100%;margin-bottom: 16px;">Update</a>
			      	<a class="waves-effect waves-light btn" style="width:100%;margin-bottom: 16px;background: #ff5a5f">Hapus</a>
			    </div>
	    	</div>
	  	</div>

	  	<div class="col s12 m6">
	    	<div class="card horizontal">
		      	<div class="card-image">
		        	<img src="images/coffee/example1.jpg">
		      	</div>
	      		<div class="card-stacked">
	        		<div class="card-content">
	          			<h3 class="produk-title activator">NIAS 200G KOPI ARABICA<i class="material-icons right">more_vert</i></h3>
	          			<p>wholebean</p>
	          			<p>Rp 100.000</p>
	          			<div class="input-field col s12">
				          <input placeholder="1" id="jumlah" type="number" class="validate" value="1">
				        </div>
				        <p style="padding: 5px;">Sub Total : <b>Rp. 100.000</b></p>
	        		</div>
	      		</div>
	      		<div class="card-reveal">
	      			<span class="card-title grey-text text-darken-4">&nbsp;<i class="material-icons right">close</i></span>
			      	<a class="waves-effect waves-light btn" style="width:100%;margin-bottom: 16px;">Update</a>
			      	<a class="waves-effect waves-light btn" style="width:100%;margin-bottom: 16px;background: #ff5a5f">Hapus</a>
			    </div>
	    	</div>
	  	</div> 

	</div>
{{-- End Section Cart --}}
{{-- ========================================== --}}

{{-- Section Button --}}
	<div class="row">
		<div class="col s6 m6">
			<a class="waves-effect waves-light btn" style="background: #999999;">Belanja</a>
		</div>
		<div class="col s6 m6">
			<a class="waves-effect waves-light btn" style="background: #2ab27b;">Pembayaran</a>
		</div>
	</div>
{{-- End Section Button --}}
{{-- ========================================== --}}
	
@endsection

@section('js')
	
@endsection