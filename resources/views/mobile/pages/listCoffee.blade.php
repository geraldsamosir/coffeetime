@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

{{-- Section Sorting --}}
	
	<div class="row">
		<div class="col s6">
			<div class="input-field col s12">
			    <select>
			        <option value="1">Harga Terenda</option>
			        <option value="2">Harga Tertinggi</option>
			        <option value="3">Paling Lama</option>
			        <option value="4">Paling Baru</option>
			      </optgroup>
			    </select>
			</div>
		</div>

		<div class="col s6">
			<div class="input-field col s12">
			    <select>
			    	<option value="" disabled selected>Kategori</option>
			        <option value="1">Coffee A</option>
			        <option value="2">Coffee B</option>
			    </select>
			</div>
		</div>
	</div>

{{-- End Section Sorting --}}

{{-- Section Card Kopi --}}
	<div class="row">	
		<div class="col s6 m3">
          <div class="card">
            <div class="card-image card-image-promo">
              <img src="images/coffee/example1.jpg">
            </div>
            <div class="card-content card-content-promo">
              <h3 class="promo-title">NIAS 200G KOPI ARABICA</h3>
	          <p class="hargapromo">Rp 100.000 <span class="hargalamapromo">Rp. 200.000</span> - <span class="diskon">50%</span></p>
            </div>
            <div class="card-action card-action-promo">
              <a class="waves-effect waves-light btn">Beli</a>
            </div>
          </div>
        </div>

        <div class="col s6 m3">
          <div class="card">
            <div class="card-image card-image-promo">
              <img src="images/coffee/example1.jpg">
            </div>
            <div class="card-content card-content-promo">
              <h3 class="promo-title">NIAS 200G KOPI ARABICA</h3>
	          <p class="hargapromo">Rp 100.000 <span class="hargalamapromo">Rp. 200.000</span> - <span class="diskon">50%</span></p>
            </div>
            <div class="card-action card-action-promo">
              <a class="waves-effect waves-light btn">Beli</a>
            </div>
          </div>
        </div>

       	<div class="col s6 m3">
          <div class="card">
            <div class="card-image card-image-promo">
              <img src="images/coffee/example1.jpg">
            </div>
            <div class="card-content card-content-promo">
              <h3 class="promo-title">NIAS 200G KOPI ARABICA</h3>
	          <p class="hargapromo">Rp 100.000 <span class="hargalamapromo">Rp. 200.000</span> - <span class="diskon">50%</span></p>
            </div>
            <div class="card-action card-action-promo">
              <a class="waves-effect waves-light btn">Beli</a>
            </div>
          </div>
        </div>

        <div class="col s6 m3">
          <div class="card">
            <div class="card-image card-image-promo">
              <img src="images/coffee/example1.jpg">
            </div>
            <div class="card-content card-content-promo">
              <h3 class="promo-title">NIAS 200G KOPI ARABICA</h3>
	          <p class="hargapromo">Rp 100.000 <span class="hargalamapromo">Rp. 200.000</span> - <span class="diskon">50%</span></p>
            </div>
            <div class="card-action card-action-promo">
              <a class="waves-effect waves-light btn">Beli</a>
            </div>
          </div>
        </div>
	</div>
{{-- End Section Card Kopi --}}

@endsection

@section('js')
	
	 
	<script>
	
	    $(document).ready(function() {
		    $('select').material_select();
		});
       

	</script>
        

@endsection