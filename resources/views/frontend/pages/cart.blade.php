@extends('layouts.frontend')

@section('title', 'Your Cart')

@section('content')
	<div class="section-cart-list">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="panel-cart">
						<div class="panel-cart-count">
							<h3 class="cart-count">Keranjang Belanja(1)</h3>
						</div>
						<div class="panel-cart-header">
							<table class="table table-cart">
								<tr>
									<td colspan="2" class="f1">&nbsp;</td>
									<td>
										<p>Harga</p>
									</td>
									<td class="cart-item-quantity">
										<p>Jumlah</p>
									</td>
									<td>
										<p>Subtotal</p>
									</td>
									<td>&nbsp;</td>
								</tr>
							</table>
						</div>
						<div class="panel-cart-body">
							<div class="table-responsive">
								<table class="table table-cart">
									<tr>
										<td class="cart-item-preview f2">
											<img src="/images/coffee/example12.jpg" alt="gambar-product">
										</td>
										<td class="cart-item-name f2">
											<a href="/details-coffee">Coffee Nias 250g</a>
											<p class="cart-item-brew-method">Espresso</p>
										</td>
										<td class="cart-item-price">
											<p class="cart-item-price-new">Rp. 250.000</p>
											<p class="cart-item-price-old">Rp. 500.000</p>
										</td>
										<td class="cart-item-quantity">
											<input type="number" min="0" value="1">
										</td>
										<td class="cart-item-subtotal">
											<p class="cart-subtotal">Rp. 500.000</p>
										</td>
										<td class="cart-item-delete">
											<button class="btn btn-cart-delete">
												<i class="fa fa-times-circle"></i>
											</button>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="panel-cart-footer">
							<button type="submit" class="btn btn-tohome">Lanjutkan Belanja</button>
							<button type="submit" class="btn btn-success btn-tocheckout">Lanjutkan Pembayaran</button>
						</div>

						{{-- Jika Cart Kosong --}}
						<div class="panel-cart-body cart-kosong">
							<h2>Keranjang Anda Kosong, Silahkan lakukan pembelian.</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection