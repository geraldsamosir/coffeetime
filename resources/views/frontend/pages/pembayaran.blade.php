@extends('layouts.plain')

@section('title','| Pembayaran')

@section('content')
	<div class="section-pembayaran">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="pembayaran-bank">
						<div class="panel-card">
							<div class="panel-card-header">
								<h3 class="panel-title">Pembayaran</h3>
							</div>
							<div class="panel-card-body">
								<div class="logo-bca">
									<img src="images/bca.png" alt="BCA">
								</div>
								<div class="rek">
									<p class="no">No. Rek 0222488484</p>
									<p class="an">a/n. Albert Ang</p>
								</div>
								<blockquote>
									<p>- Silahkan Transfer ke rekening BCA kami di bawah ini.</p>
									<p>- Jangka waktu transfer dan konfirmasi adalah 1 Hari.</p>
									<p>- Jika melewati batas waktu, maka request akan kami batalkan</p>
								</blockquote>
							</div>
						</div>
						<button class="btn btn-primary btn-confirmasi" type="submit">Konfirmasi Pembayaran</button>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="final-alamat">
								<div class="panel-card">
									<div class="panel-card-header">
										<h3 class="panel-title">Alamat Pengiriman</h3>
									</div>
									<div class="panel-card-body">
										<div class="checkout-address" >
											<h4>Ucok</h4>
											<p>Medan</p>
											<p>Sumatera Utara-Kota Medan-Medan Petisah</p>
											<p>Nomor Handphone: 0812345678</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="finish-checkout">
								<div class="panel-card">
									<div class="panel-card-header">
										<h3 class="panel-title">Ringkasan Pemesanan</h3>
									</div>
									<div class="panel-card-body">

										<div class="table-responsive">
											<table class="table">
												<tbody>
													<tr class="cart-item-top">
														<td rowspan="2" class="cart-item-preview">
															<img src="/images/coffee/example12.jpg" alt="gambar-product">
														</td>
														<td class="cart-item-name">
															<a href="/detail-coffee">Coffee Nias 250g</a>
															<p class="cart-item-brew-method">Espresso</p>
														</td>
														<td rowspan="2" class="cart-item-subtotal">
															<p class="cart-item-price-old">Rp. 500.000</p>
															<p class="cart-subtotal">Rp. 250.000</p>
														</td>
													</tr>

													<tr class="cart-item-bottom">
														<td class="cart-item-quantity">
															<input type="number" min="0" value="1" disabled>
															<p class="cart-item-price-new">x Rp. 250.000</p>
														</td>
													</tr>

													<tr class="cart-item-top">
														<td rowspan="2" class="cart-item-preview">
															<img src="/images/coffee/example12.jpg" alt="gambar-product">
														</td>
														<td class="cart-item-name">
															<a href="/detail-coffee">Coffee Arabika Mocacino Amercano 250g</a>
															<p class="cart-item-brew-method">Bean</p>
														</td>
														<td rowspan="2" class="cart-item-subtotal">
															<p class="cart-subtotal">Rp. 500.000</p>
														</td>
													</tr>

													<tr class="cart-item-bottom">
														<td class="cart-item-quantity">
															<input type="number" min="0" value="1" disabled>
															<p class="cart-item-price-new">x Rp. 250.000</p>
														</td>
													</tr>

													<tr class="cart-item-subtotal">
														<td colspan="2">Sub Total</td>
														<td>Rp. 500.000</td>
													</tr>
													<tr class="cart-item-total">
														<td colspan="2">Total Pembayaran</td>
														<td>Rp. 500.000</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection