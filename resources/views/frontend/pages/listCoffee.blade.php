@extends('layouts.frontend')

@section('title','| List Coffee')

@section('content')
	
	<div class="section-sorting">
		<div class="container">
			<div class="panel-sorting">
				<div class="row">
					<div class="col-md-2">
						<div class="sorting-kategori">
						
						{!! Form::open(['url'=>'']) !!}
						
							<select class="select-kategori form-control">
							  <option value="" selected disabled>Kategori</option>
							  <option value="C1">Coffee A</option>
							  <option value="C2">Coffee B</option>
							  <option value="C3">Coffee C</option>
							</select>

						{!! Form::close() !!}

							{{-- <div class="dropdown">
							  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							    Kategori
							   <i class="fa fa-sort-down"></i>
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							    <li><a href="#">Coffee A</a></li>
							    <li><a href="#">Coffee B</a></li>
							    <li><a href="#">Coffee C</a></li>
							  </ul>
							</div> --}}
						</div>
					</div>

					<div class="col-md-2">
						<div class="sorting-merek">

						{!! Form::open(['url'=>'']) !!}

							<select class="select-merek form-control">
							  <option value="" selected disabled>Merek</option>
							  <option value="M1">Merek A</option>
							  <option value="M2">Merek B</option>
							  <option value="M3">Merek C</option>
							</select>

						{!! Form::close() !!}

							{{-- <div class="dropdown">
							  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							    Merek
							    <i class="fa fa-sort-down"></i>
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							    <li><a href="#">Merek A</a></li>
							    <li><a href="#">Merek B</a></li>
							    <li><a href="#">Merek C</a></li>
							  </ul>
							</div> --}}
						</div>
					</div>

					<div class="col-md-2">
						<div class="sorting-harga">
						

						{!! Form::open(['url'=>'']) !!}

							<select class="select-merek form-control">
							  <option value="" selected disabled>Harga</option>
							  <option value="H1">Rp. 0 - Rp. 100.000</option>
							  <option value="H2">Rp. 100.000 - Rp. 500.000</option>
							  <option value="H3"> > Rp. 500.000 </option>
							</select>

						{!! Form::close() !!}



							{{-- <div class="dropdown">
							  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							    Rentang Harga
							    <i class="fa fa-sort-down"></i>
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							    <li><a href="#">Rp. 0 - Rp. 100.000</a></li>
							    <li><a href="#">Rp. 100.000 - Rp.300.000</a></li>
							    <li><a href="#">> Rp. 300.000</a></li>
							  </ul>
							</div>
							 --}}
						</div>
					</div>

					<div class="col-md-2">
						<div class="sorting-date">

						{!! Form::open(['url'=>'']) !!}

							<select class="select-merek form-control">
							  <option value="" selected disabled>Urutkan</option>
							  <option value="UH1">Harga Terendah</option>
							  <option value="UH2">Harga Tertinggi</option>
							  <option value="" disabled>------------------------</option>
							  <option value="UP1">Paling Lama</option>
							  <option value="UP2">Paling Baru</option>
							</select>

						{!! Form::close() !!}

							{{-- <div class="dropdown">
							  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							    Urutkan
							    <i class="fa fa-sort-down"></i>
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							    <li><a href="#">Harga Terendah</a></li>
							    <li><a href="#">Harga Tertinggi</a></li>
							     <li role="separator" class="divider"></li>
							    <li><a href="#">Paling Lama</a></li>
							    <li><a href="#">Paling Baru</a></li>
							  </ul>
							</div>
							 --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="section-list">
		<div class="container">
			<div class="row">
				{{-- Baris Tanpa Discount --}}
                <div class="col-md-3">
                     <div class="product-col">       
                        <div class="inner-product-col">
                            <a class="voucher-link" href="/details-coffee">
                                <div class="image">
                                    <i class="fa fa-search overlayhover"></i>
                                    <img src="/images/coffee/example10.jpg" alt="product" class="lazy img-responsive product" />
                                </div>
                            </a>
                            <div class="caption">
                                <h4 class="voucher-title">Nias 200g Kopi Arabica</h4>
                                <div class="voucher-caption">
                                    <div class="price">
                                        <span class="price-new">Rp 100.000</span>
                                    </div>  
                                </div>
                            </div>
                            <div class="btn-beli">
                                <button class="btn btn-lg">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Beli</span>
                                </button>
                            </div>
                            <div class="clear" style="clear:both"></div>
                        </div>
                    </div>
                </div>
                {{-- Baris Tanpa Discount End --}}

                {{-- Baris Dengan Discount --}}
                <div class="col-md-3">
                     <div class="product-col">       
                        <div class="inner-product-col">
                            <a class="voucher-link" href="/coffee/sesuatu">
                                <div class="image">
                                    <i class="fa fa-search overlayhover"></i>
                                    <img src="/images/coffee/example10.jpg" alt="product" class="lazy img-responsive product" />
                                    <span class="price-disc">50<sup>%</sup></span>
                                </div>
                            </a>
                            <div class="caption">
                                <h4 class="voucher-title">Nias 200g Kopi Arabica</h4>
                                <div class="voucher-caption">
                                    <div class="price">
                                        <span class="price-old">Rp 2.000.000</span>
                                        <span class="price-new">Rp 1.000.000</span>
                                    </div>  
                                </div>
                            </div>
                            <div class="btn-beli">
                                <button class="btn btn-lg">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Beli</span>
                                </button>
                            </div>
                            <div class="clear" style="clear:both"></div>
                        </div>
                    </div>
                </div>
                {{-- Baris Dengan Discount End --}}
			</div>
		</div>
	</div>

@endsection