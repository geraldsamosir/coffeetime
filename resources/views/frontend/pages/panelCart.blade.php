@extends('layouts.frontend')

@section('title', 'Panel Cart')

@section('content')
	<div class="section-panel">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					{{-- Sidepanel from components --}}
					@include('frontend.components.sidepanel')
				</div>
				<div class="col-md-8">
					<div class="section-panel-header-header">
						<div class="panel-card">
							<div class="panel-card-header">
								<h3 class="panel-title">Cart</h3>
							</div>
						</div>
					</div>
					<div class="section-panel-cart">
						<div class="panel-cart">
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
												<a href="/detail-coffee">Coffee Nias 250g</a>
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
								<button type="submit" class="btn btn-success btn-tocheckout">Lanjutkan Pembayaran</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection