@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

{{-- Section Status dan Pembayaran --}}
<div class="row">
	<div class="col s12 m6">
		<h3 class="subtitle">Status Pembayaran</h3>
		<p class="p14 ppading">MENUNGGU PEMBAYARAN</p>
	</div>

	<div class="col s12 m6">
		<h3 class="subtitle">Pembayaran</h3>
			<div class="panel-card-body">
	        <div class="col s6 logo-bca">
	          <img src="http://coffeetime.cf/images/bca.png" alt="BCA">
	        </div>
	        <div class="col s6 rek">
	          <p class="no p12 pnomargin">No. Rek <b>0222488484</b></p>
	          <p class="an p12 pnomargin">a/n. Albert Ang</p>
	        </div>
	        <div class="col s12">
		        <blockquote style="margin:0px;">
		          <p class="p12 pnomargin">- Silahkan Transfer ke rekening BCA kami di bawah ini.</p>
		          <p class="p12 pnomargin">- Jangka waktu transfer dan konfirmasi adalah 1 Hari.</p>
		          <p class="p12 pnomargin">- Jika melewati batas waktu, maka request akan kami batalkan</p>
		          <p class="p12 pnomargin">- Harap Memasukkan berita <strong>Order#49</strong></p>
		        </blockquote>
	       	</div>
	    </div>
	</div>
</div>
{{-- End Section Status dan Pembayaran --}}
{{-- ========================================== --}}


{{-- Section Alamat Pengiriman --}}
	<div class="row">
		<div class="col s12">
			<h3 class="subtitle">Alamat Pengiriman</h3>
			<div class="panel-card-body">
		        <div class="checkout-address">
		          <p class="p12 pnomargin"><b>Albert</b></p>
		          <p class="p12 pnomargin">Lampung</p>
		          <p class="p12 pnomargin">Kabupaten Lampung Timur</p>
		          <p class="p12 pnomargin">Jabung</p>
		          <p class="p12 pnomargin">Jln. Thamrin, Kode Pos : 213</p>
		          <p class="p12 pnomargin">Nomor Handphone: 123123123</p>
		        </div>
		    </div>
		</div>
	</div>
{{-- End Section Alamat Pengiriman --}}
{{-- ========================================== --}}


{{-- Section Order Detail --}}
	<div class="row">
		<div class="col s12">
			<h3 class="subtitle">Order #49</h3>
			<div class="card horizontal">
		      	<div class="card-image card-image-pembayaran">
		        	<img src="images/coffee/example1.jpg">
		      	</div>
	      		<div class="card-stacked">
	        		<div class="card-content">
	          			<h3 class="produk-title activator">NIAS 200G KOPI ARABICA</h3>
	          			<p>wholebean</p>
	          			<p>1 x Rp 100.000</p>
				        <p style="padding: 5px;">Sub Total : <b>Rp. 100.000</b></p>
	        		</div>
	      		</div>
	    	</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<div class="total-order ppading">
				<div class="row" style="margin-bottom:0px">
					<div class="col s6"><p class="p12" style="text-align: right;">Total Belanja :</p></div>
					<div class="col s6"><p class="p12">Rp. 100.000</p></div>
				</div>
				<div class="row" style="margin-bottom:0px">
					<div class="col s6"><p class="p12" style="text-align: right;">Kode Unik :</p></div>
					<div class="col s6"><p class="p12">Rp. 882</p></div>
				</div>

				<div class="row" style="margin-bottom:0px">
					<div class="col s12">
						<p class="p14" style="text-align: center"><b>TOTAL PEMBAYARAN : Rp. 100.882</b></p>
					</div>
				</div>
			</div>
		</div>
	</div>
{{-- End Section Order Detail --}}
{{-- ========================================== --}}

	
@endsection
