@extends('layouts.frontend')

@section('title','| Homepage')

@section('content')
  @if (session('error'))
    <div class="alert alert-danger">
      <center>{{ session('error') }}</center>
    </div>
  @endif

  <div id="carousel-details" class="carousel slide" data-ride="carousel"
       data-interval="3000">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active srle">
        <img src="{{asset('/images/slide-1.jpg')}}" alt="" class="img-responsive">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="{{asset('/images/slide-2.jpg')}}" alt="" class="img-responsive">
        <div class="carousel-caption">
        </div>
      </div>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-details" role="button"
       data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-details" role="button"
       data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>

  </div>

  <div class="section-new-product">
    <div class="container">
      <h3 class="panel-title-bigmid">Produk terbaru</h3>
      {{-- Produk Kopi Terbaru --}}
      <div class="panel-default">
        <div class="panel-default-header">
          <div class="panel-header-title">Kopi</div>
          <div class="panel-header-link">
            <a href="{{url('list-product/1')}}">Lihat semua</a>
          </div>
        </div>
        <div class="panel-default-body">
          <div class="row">
            @foreach($latestCoffee as $coffee)
              @if($coffee->discount_percent == 0)
                {{-- Baris Tanpa Discount --}}
                <div class="col-md-3">
                  <div class="product-col">
                    <div class="inner-product-col">
                      <a class="voucher-link" href="{{ url('detail-coffee/'.$coffee->id) }}">
                        <div class="image">
                          <i class="fa fa-search overlayhover"></i>
                          <img src="{{ Voyager::image($coffee->thumb_image) }}" alt="product"
                               class="lazy img-responsive product"/>
                        </div>
                      </a>
                      <div class="caption">
                        <h4 class="voucher-title">{{ $coffee->name }}</h4>
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
                          <img src="{{ Voyager::image($coffee->thumb_image) }}" alt="product"
                               class="lazy img-responsive product"/>
                          <span class="price-disc">{{ $coffee->discount_percent }}<sup>%</sup></span>
                        </div>
                      </a>
                      <div class="caption">
                        <h4 class="voucher-title">{{ $coffee->name }}</h4>
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
      {{-- Produk Kopi Terbaru End--}}

      @if(count($latestMachine) > 0)
        {{-- Produk Mesin Kopi Terbaru --}}
        <div class="panel-default">
          <div class="panel-default-header">
            <div class="panel-header-title">Mesin Kopi</div>
            <div class="panel-header-link">
              <a href="">Lihat semua</a>
            </div>
          </div>
          <div class="panel-header-body">
            <div class="row">
              @foreach($latestMachine as $coffee)
                @if($coffee->discount_percent == 0)
                  {{-- Baris Tanpa Discount --}}
                  <div class="col-md-3">
                    <div class="product-col">
                      <div class="inner-product-col">
                        <a class="voucher-link" href="{{ url('detail-coffee/'.$coffee->id) }}">
                          <div class="image">
                            <i class="fa fa-search overlayhover"></i>
                            <img src="{{ Voyager::image($coffee->thumb_image) }}" alt="product"
                                 class="lazy img-responsive product"/>
                          </div>
                        </a>
                        <div class="caption">
                          <h4 class="voucher-title">{{ $coffee->name }}</h4>
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
                            <img src="{{ Voyager::image($coffee->thumb_image) }}" alt="product"
                                 class="lazy img-responsive product"/>
                            <span class="price-disc">{{ $coffee->discount_percent }}<sup>%</sup></span>
                          </div>
                        </a>
                        <div class="caption">
                          <h4 class="voucher-title">{{ $coffee->name }}</h4>
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
        {{-- Produk Mesin Kopi Terbaru End--}}
      @endif
    </div>
  </div>

  <div class="section-promo">
    <div class="container">
      {{-- Promo --}}
      <div class="panel-product">
        <div class="panel-product-header">
          <div class="row">
            <div class="col-md-12">
              Promo
            </div>
          </div>
        </div>
        <div class="panel-product-body">
          <div class="row">
            @if(count($bestPromoCoffee) > 0)
            {{-- Promo Kopi --}}
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="product-col hvr-grow-shadow">
                    <div class="inner-product-col">
                      <a class="voucher-link" href="{{url('detail-coffee/'.$bestPromoCoffee->first()->id)}}">
                        <div class="image">
                          <img src="{{Voyager::image($bestPromoCoffee->first()->thumb_image)}}" alt="product"
                               class="lazy img-responsive"/>
                        </div>
                      </a>
                      <div class="caption">
                        <h4
                          class="voucher-title">{{ str_limit($bestPromoCoffee->first()->name, $limit = 10, $end = '...') }}</h4>
                        <div class="voucher-caption">
                          <div class="price">
                            <span class="price-disc">{{$bestPromoCoffee->first()->discount_percent}}<sup>%</sup></span>
                            <span
                              class="price-old">Rp {{number_format($bestPromoCoffee->first()->original_price)}}</span>
                            <span
                              class="price-new">Rp {{number_format($bestPromoCoffee->first()->discounted_price)}}</span>
                          </div>
                        </div>
                      </div>
                      <div class="clear" style="clear:both"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 no-padding">
                  <div class="row">
                    @foreach($bestPromoCoffee as $key=>$coffee)
                      @if($key != 0)
                        {{-- Promo Bentuk Tab --}}
                        <div class="col-md-12 no-padding">
                          <div class="product-col-tab hvr-grow-shadow">
                            <div class="row">
                              <div class="inner-product-col-tab">
                                <a href="{{url('detail-coffee/'.$coffee->id)}}">
                                  <div class="col-md-6 no-padding">
                                    <div class="caption">
                                      <span style="font-size:12px"
                                            class="price-new">{{ str_limit($coffee->name, $limit = 20, $end = '...') }}</span>
                                      <span class="price-disc">{{$coffee->discount_percent}}<sup>%</sup></span>
                                      <span class="price-old">Rp {{number_format($coffee->original_price)}}</span>
                                      <span class="price-new">Rp {{number_format($coffee->discounted_price)}}</span>
                                    </div>
                                  </div>
                                  <div class="col-md-6 no-padding">
                                    <div class="image">
                                      <img src="{{Voyager::image($coffee->thumb_image)}}" alt="product"
                                           class="lazy img-responsive"/>
                                    </div>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                      {{-- Promo Bentuk Tab End --}}
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            {{-- Promo Kopi End --}}
            @endif

            @if(count($bestPromoMachine) > 0)
            {{-- Promo Mesin Kopi --}}
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="product-col hvr-grow-shadow">
                    <div class="inner-product-col">
                      <a class="voucher-link" href="{{url('detail-coffee/'.$bestPromoMachine->first()->id)}}">
                        <div class="image">
                          <img src="{{Voyager::image($bestPromoMachine->first()->thumb_image)}}" alt="product"
                               class="lazy img-responsive product"/>
                        </div>
                      </a>
                      <div class="caption">
                        <h4
                          class="voucher-title">{{ str_limit($bestPromoMachine->first()->name, $limit = 10, $end = '...') }}</h4>
                        <div class="voucher-caption">
                          <div class="price">
                            <span class="price-disc">{{$bestPromoMachine->first()->discount_percent}}<sup>%</sup></span>
                            <span
                              class="price-old">Rp {{number_format($bestPromoMachine->first()->original_price)}}</span>
                            <span
                              class="price-new">Rp {{number_format($bestPromoMachine->first()->discounted_price)}}</span>
                          </div>
                        </div>
                      </div>
                      <div class="clear" style="clear:both"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 no-padding">
                  <div class="row">
                    @foreach($bestPromoMachine as $key=>$coffee)
                      @if($key != 0)
                        {{-- Promo Bentuk Tab --}}
                        <div class="col-md-12 no-padding">
                          <div class="product-col-tab hvr-grow-shadow">
                            <div class="row">
                              <div class="inner-product-col-tab">
                                <a href="{{url('detail-coffee/'.$coffee->id)}}">
                                  <div class="col-md-6 no-padding">
                                    <div class="caption">
                                      <span style="font-size:12px"
                                            class="price-new">{{ str_limit($coffee->name, $limit = 20, $end = '...') }}</span>
                                      <span class="price-disc">{{$coffee->discount_percent}}<sup>%</sup></span>
                                      <span class="price-old">Rp {{number_format($coffee->original_price)}}</span>
                                      <span class="price-new">Rp {{number_format($coffee->discounted_price)}}</span>
                                    </div>
                                  </div>
                                  <div class="col-md-6 no-padding">
                                    <div class="image">
                                      <img src="{{Voyager::image($coffee->thumb_image)}}" alt="product"
                                           class="lazy img-responsive product"/>
                                    </div>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                      {{-- Promo Bentuk Tab End --}}
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            {{-- Promo Mesin Kopi End --}}
              @endif
          </div>
        </div>
      </div>
      {{-- Promo End--}}


    </div>
  </div>

@endsection