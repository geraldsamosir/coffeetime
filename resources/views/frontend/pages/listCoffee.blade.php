@extends('layouts.frontend')

@section('title','| List Coffee')

@section('content')
	
	<div class="section-sorting">
		<div class="container">
			<div class="panel-sorting">
				<div class="row">
					<div class="col-md-2">
						<div class="sorting-kategori">

              {!! Form::open(['url'=>'/search-product', 'method'=>'GET']) !!}

                <div class="input-group col-md-12">
                  <div class="icon-addon addon-md">
                    {{-- <input type="text" placeholder="Cari Resep..." class="form-control" name="keyword""> --}}
                    {!! Form::text('query',app('request')->input('query'),['class'=>'col-md-12 form-control','placeholder'=>'Cari Product...',]) !!}
                  </div>
                </div>
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

              <select name="category" class="select-kategori form-control">
                <option value="" selected disabled>Kategori</option>
                <option value="" >Reset</option>
                @foreach($categoryProduct as $category)
                  <option @if((app('request')->input('category') ? app('request')->input('category') : null) == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
              </select>

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

					<div class="col-md-3">
						<div class="sorting-harga">


							<select name="price" class="select-merek form-control">
							  <option value="" selected disabled>Harga</option>
                <option value="" >Reset</option>
							  <option @if((app('request')->input('price') ? app('request')->input('price') : null) == 'to100') selected @endif value="to100">Rp. 0 - Rp. 100.000</option>
							  <option @if((app('request')->input('price') ? app('request')->input('price') : null) == 'between100-500') selected @endif value="between100-500">Rp. 100.000 - Rp. 500.000</option>
							  <option @if((app('request')->input('price') ? app('request')->input('price') : null) == 'over500') selected @endif  value="over500"> > Rp. 500.000 </option>
							</select>



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


							<select name="sort" class="select-merek form-control">
							  <option value="" selected disabled>Urutkan</option>
                <option value="" >Reset</option>
							  <option value="lowprice">Harga Terendah</option>
							  <option value="highprice">Harga Tertinggi</option>
							  <option value="" disabled>------------------------</option>
							  <option value="oldest">Paling Lama</option>
							  <option value="latest">Paling Baru</option>
							</select>


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
          <div class="col-md-2">
            <button type="submit" class="btn btn-success">Lakukan Filter</button>
          </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	
	<div class="section-list">
		<div class="container">
			<div class="row">
        @foreach($coffees as $coffee)
          @if($coffee->discount_percent == 0)
				  {{-- Baris Tanpa Discount --}}
            <div class="col-md-3">
                  <div class="product-col"> 
                    <div class="inner-product-col">
                        <a class="voucher-link" href="{{ url('detail-coffee/'.$coffee->id) }}">
                            <div class="image">
                                <i class="fa fa-search overlayhover"></i>
                                <img src="{{ Voyager::image($coffee->thumb_image) }}" alt="product" class="lazy img-responsive product" />
                            </div>
                        </a>
                        <div class="caption">
                            <h4 class="voucher-title">{{ str_limit($coffee->name, $limit = 30, $end = '...') }}</h4>
                            <div class="voucher-caption">
                                <div class="price">
                                    <span class="price-new">Rp {{ number_format($coffee->original_price) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="btn-beli">
                          <a href="{{ url('detail-coffee/'.$coffee->id) }}">
                            <button class="btn btn-lg">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Beli</span>
                            </button>
                          </a>
                        </div>
                        <div class="clear" style="clear:both"></div>
                    </div>
                </div>
            </div>
          {{-- Baris Tanpa Discount End --}}

          @else
          {{-- Baris Dengan Discount --}}
          <div class="col-md-3">
              <div class="product-col">
                <div class="inner-product-col">
                    <a class="voucher-link" href="{{ url('detail-coffee/'.$coffee->id) }}">
                        <div class="image">
                            <i class="fa fa-search overlayhover"></i>
                            <img src="{{ Voyager::image($coffee->thumb_image) }}" alt="product" class="lazy img-responsive product" />
                            <span class="price-disc">{{ $coffee->discount_percent }}<sup>%</sup></span>
                        </div>
                    </a>
                    <div class="caption">
                        <h4 class="voucher-title">{{ str_limit($coffee->name, $limit = 30, $end = '...') }}</h4>
                        <div class="voucher-caption">
                            <div class="price">
                              <span class="price-old">Rp {{ number_format($coffee->original_price) }}</span>
                              <span class="price-new">Rp {{ number_format($coffee->discounted_price) }}</span>
                            </div>  
                        </div>
                    </div>
                    <div class="btn-beli">
                      <a href="{{ url('detail-coffee/'.$coffee->id) }}">
                        <button class="btn btn-lg">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Beli</span>
                        </button>
                      </a>
                    </div>
                    <div class="clear" style="clear:both"></div>
                </div>
              </div>
            </div>
          @endif
          {{-- Baris Dengan Discount End --}}
        @endforeach
			</div>
		</div>
	</div>

@endsection