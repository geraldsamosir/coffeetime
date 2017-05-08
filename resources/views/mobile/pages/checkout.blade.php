@extends('layouts.plain')

@section('title','| Checkout')

@section('content')
   <div class="section-header-checkout">
   	
   </div>

   <div class="section-content-checkout">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="form-checkout">
						<div class="panel-card">
							<div class="panel-card-header">
								<h3 class="panel-title">Alamat</h3>
							</div>
							<div class="panel-card-body">
								{!! Form::open() !!}
									<div class="form-group">
										{!! Form::label('lblAlamat','Label Alamat',['class'=>'required']) !!}
										{!! Form::text('lblAlamat',null,['class'=>'form-control','placeholder'=>'Contoh: Alamat Rumah, Alamat Kantor','required']) !!}
									</div>
									<div class="form-group">
										{!! Form::label('lblNama','Nama Lengkap',['class'=>'required']) !!}
										{!! Form::text('lblNama',null,['class'=>'form-control','placeholder'=>'Nama Penerima', 'required']) !!}
									</div>

									<div class="form-group">
										{!! Form::label('lblNegara','Negara',['class'=>'required']) !!}
					                    {!! Form::select('lblNegara',['Indonesia'],null,['class'=>'form-control']) !!}
					                </div>

					                <div class="form-group">
					               		{!! Form::label('lblProvinsi','Provinsi',['class'=>'required']) !!}
					                    {!! Form::select('lblProvinsi',['Sumatera Utara'],null,['class'=>'form-control']) !!}
					                </div>

					                <div class="form-group">
					                	{!! Form::label('lblKota','Kota',['class'=>'required']) !!}
					                    {!! Form::select('lblKota',['Medan'],null,['class'=>'form-control']) !!}
					                </div>

					                <div class="form-group">
					                	{!! Form::label('lblKecamatan','Kecamatan',['class'=>'required']) !!}
					                    {!! Form::select('lblKecamatan',['Medan Helvetia'],null,['class'=>'form-control']) !!}
					                </div>

									<div class="form-group">
										{!! Form::label('lblJalan','Alamat',['class'=>'required']) !!}
										{!! Form::text('lblJalan',null,['class'=>'form-control','placeholder'=>'Alamat']) !!}
									</div>
									<div class="form-group">
										{!! Form::label('lblPos','Kode Pos',['class'=>'required']) !!}
										{!! Form::text('lblPos',null,['class'=>'form-control','placeholder'=>'Kode Pos']) !!}
									</div>
									<div class="form-group">
										{!! Form::label('lblHp','Nomor Handphone',['class'=>'required']) !!}
										{!! Form::text('lblHp',null,['class'=>'form-control','placeholder'=>'Nomor Handphone']) !!}
									</div>
									<div class="form-group">
										{!! Form::label('lblTelp','Nomor Telepon') !!}
										{!! Form::text('lblTelp',null,['class'=>'form-control','placeholder'=>'Nomor Telepon']) !!}
									</div>
									{!! Form::submit('Lanjut Ke Pembayaran',['class'=>'btn btn-block btn-primary']) !!}
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
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
													<a href="/details-coffee">Coffee Nias 250g</a>
													<p class="cart-item-brew-method">Espresso</p>
												</td>
												<td rowspan="2" class="cart-item-subtotal">
													<p class="cart-item-price-old">Rp. 500.000</p>
													<p class="cart-subtotal">Rp. 250.000</p>
												</td>
											</tr>

											<tr class="cart-item-bottom">
												<td class="cart-item-quantity">
													<input type="number" min="0" value="1">
													<button class="btn btn-clean">hapus</button>
													<p class="cart-item-price-new">x Rp. 250.000</p>
												</td>
											</tr>

											<tr class="cart-item-top">
												<td rowspan="2" class="cart-item-preview">
													<img src="/images/coffee/example12.jpg" alt="gambar-product">
												</td>
												<td class="cart-item-name">
													<a href="/details-coffee">Coffee Arabika Mocacino Amercano 250g</a>
													<p class="cart-item-brew-method">Bean</p>
												</td>
												<td rowspan="2" class="cart-item-subtotal">
													<p class="cart-subtotal">Rp. 500.000</p>
												</td>
											</tr>

											<tr class="cart-item-bottom">
												<td class="cart-item-quantity">
													<input type="number" min="0" value="1">
													<button class="btn btn-clean">hapus</button>
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
@endsection
