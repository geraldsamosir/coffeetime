@extends('layouts.frontend')

@section('title','| Homepage')

@section('content')

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
            <a href="">Lihat semua</a>
          </div>
        </div>
        <div class="panel-default-body">
          <div class="row">
            {{-- Baris Tanpa Discount --}}
            <div class="col-md-3">
              <div class="product-col">
                <div class="inner-product-col">
                  <a class="voucher-link" href="/detail-coffee">
                    <div class="image">
                      <i class="fa fa-search overlayhover"></i>
                      <img src="/images/coffee/example10.jpg" alt="product" class="lazy img-responsive product"/>
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
                      <img src="/images/coffee/example10.jpg" alt="product" class="lazy img-responsive product"/>
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

            {{-- Baris Tanpa Discount --}}
            <div class="col-md-3">
              <div class="product-col">
                <div class="inner-product-col">
                  <a class="voucher-link" href="/coffee/sesuatu">
                    <div class="image">
                      <i class="fa fa-search overlayhover"></i>
                      <img src="/images/coffee/example10.jpg" alt="product" class="lazy img-responsive product"/>
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
                      <img src="/images/coffee/example10.jpg" alt="product" class="lazy img-responsive product"/>
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
      {{-- Produk Kopi Terbaru End--}}

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
            {{-- Baris Tanpa Discount --}}
            <div class="col-md-3">
              <div class="product-col">
                <div class="inner-product-col">
                  <a class="voucher-link" href="/detail-mesin">
                    <div class="image">
                      <i class="fa fa-search overlayhover"></i>
                      <img src="/images/coffee/example9.jpg" alt="product" class="lazy img-responsive product"/>
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
                      {{-- <i class="fa fa-shopping-cart"></i> --}}
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
                      <img src="/images/coffee/example9.jpg" alt="product" class="lazy img-responsive product"/>
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
                      {{-- <i class="fa fa-shopping-cart"></i> --}}
                      <span>Beli</span>
                    </button>
                  </div>
                  <div class="clear" style="clear:both"></div>
                </div>
              </div>
            </div>
            {{-- Baris Dengan Discount End --}}

            {{-- Baris Tanpa Discount --}}
            <div class="col-md-3">
              <div class="product-col">
                <div class="inner-product-col">
                  <a class="voucher-link" href="/coffee/sesuatu">
                    <div class="image">
                      <i class="fa fa-search overlayhover"></i>
                      <img src="/images/coffee/example9.jpg" alt="product" class="lazy img-responsive product"/>
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
                      {{-- <i class="fa fa-shopping-cart"></i> --}}
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
                      <img src="/images/coffee/example9.jpg" alt="product" class="lazy img-responsive product"/>
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
                      {{-- <i class="fa fa-shopping-cart"></i> --}}
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
      {{-- Produk Mesin Kopi Terbaru End--}}
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
            {{-- Promo Kopi --}}
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="product-col hvr-grow-shadow">
                    <div class="inner-product-col">
                      <a class="voucher-link" href="/coffee/sesuatu">
                        <div class="image">
                          <img src="/images/coffee/example1.jpg" alt="product" class="lazy img-responsive product"/>
                        </div>
                      </a>
                      <div class="caption">
                        <h4 class="voucher-title">Nias 200g Kopi Arabica</h4>
                        <div class="voucher-caption">
                          <div class="price">
                            <span class="price-disc">50<sup>%</sup></span>
                            <span class="price-old">Rp 2.000.000</span>
                            <span class="price-new">Rp 1.000.000</span>
                          </div>
                        </div>
                      </div>
                      <div class="clear" style="clear:both"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 no-padding">
                  <div class="row">
                    {{-- Promo Bentuk Tab --}}
                    <div class="col-md-12 no-padding">
                      <div class="product-col-tab hvr-grow-shadow">
                        <div class="row">
                          <div class="inner-product-col-tab">
                            <a href="">
                              <div class="col-md-6 no-padding">
                                <div class="caption">
                                  <span class="price-disc">50<sup>%</sup></span>
                                  <span class="price-old">Rp 500.000</span>
                                  <span class="price-new">Rp 250.000</span>
                                </div>
                              </div>
                              <div class="col-md-6 no-padding">
                                <div class="image">
                                  <img src="/images/coffee/example1.jpg" alt="product"
                                       class="lazy img-responsive product"/>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- Promo Bentuk Tab End --}}

                    {{-- Promo Bentuk Tab --}}
                    <div class="col-md-12 no-padding">
                      <div class="product-col-tab hvr-grow-shadow">
                        <div class="row">
                          <div class="inner-product-col-tab">
                            <a href="">
                              <div class="col-md-6 no-padding">
                                <div class="caption">
                                  <span class="price-disc">50<sup>%</sup></span>
                                  <span class="price-old">Rp 500.000</span>
                                  <span class="price-new">Rp 250.000</span>
                                </div>
                              </div>
                              <div class="col-md-6 no-padding">
                                <div class="image">
                                  <img src="/images/coffee/example1.jpg" alt="product"
                                       class="lazy img-responsive product"/>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- Promo Bentuk Tab End --}}

                    {{-- Promo Bentuk Tab --}}
                    <div class="col-md-12 no-padding">
                      <div class="product-col-tab hvr-grow-shadow">
                        <div class="row">
                          <div class="inner-product-col-tab">
                            <a href="">
                              <div class="col-md-6 no-padding">
                                <div class="caption">
                                  <span class="price-disc">50<sup>%</sup></span>
                                  <span class="price-old">Rp 500.000</span>
                                  <span class="price-new">Rp 250.000</span>
                                </div>
                              </div>
                              <div class="col-md-6 no-padding">
                                <div class="image">
                                  <img src="/images/coffee/example1.jpg" alt="product"
                                       class="lazy img-responsive product"/>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- Promo Bentuk Tab End --}}
                  </div>
                </div>
              </div>
            </div>
            {{-- Promo Kopi End --}}


            {{-- Promo Mesin Kopi --}}
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="product-col hvr-grow-shadow">
                    <div class="inner-product-col">
                      <a class="voucher-link" href="/coffee/sesuatu">
                        <div class="image">
                          <img src="/images/coffee/example9.jpg" alt="product" class="lazy img-responsive product"/>
                        </div>
                      </a>
                      <div class="caption">
                        <h4 class="voucher-title">Nias 200g Kopi Arabica</h4>
                        <div class="voucher-caption">
                          <div class="price">
                            <span class="price-disc">50<sup>%</sup></span>
                            <span class="price-old">Rp 2.000.000</span>
                            <span class="price-new">Rp 1.000.000</span>
                          </div>
                        </div>
                      </div>
                      <div class="clear" style="clear:both"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 no-padding">
                  <div class="row">
                    {{-- Promo Bentuk Tab --}}
                    <div class="col-md-12 no-padding">
                      <div class="product-col-tab hvr-grow-shadow">
                        <div class="row">
                          <div class="inner-product-col-tab">
                            <a href="">
                              <div class="col-md-6 no-padding">
                                <div class="caption">
                                  <span class="price-disc">50<sup>%</sup></span>
                                  <span class="price-old">Rp 500.000</span>
                                  <span class="price-new">Rp 250.000</span>
                                </div>
                              </div>
                              <div class="col-md-6 no-padding">
                                <div class="image">
                                  <img src="/images/coffee/example9.jpg" alt="product"
                                       class="lazy img-responsive product"/>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- Promo Bentuk Tab End --}}

                    {{-- Promo Bentuk Tab --}}
                    <div class="col-md-12 no-padding">
                      <div class="product-col-tab hvr-grow-shadow">
                        <div class="row">
                          <div class="inner-product-col-tab">
                            <a href="">
                              <div class="col-md-6 no-padding">
                                <div class="caption">
                                  <span class="price-disc">50<sup>%</sup></span>
                                  <span class="price-old">Rp 500.000</span>
                                  <span class="price-new">Rp 250.000</span>
                                </div>
                              </div>
                              <div class="col-md-6 no-padding">
                                <div class="image">
                                  <img src="/images/coffee/example9.jpg" alt="product"
                                       class="lazy img-responsive product"/>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- Promo Bentuk Tab End --}}

                    {{-- Promo Bentuk Tab --}}
                    <div class="col-md-12 no-padding">
                      <div class="product-col-tab hvr-grow-shadow">
                        <div class="row">
                          <div class="inner-product-col-tab">
                            <a href="">
                              <div class="col-md-6 no-padding">
                                <div class="caption">
                                  <span class="price-disc">50<sup>%</sup></span>
                                  <span class="price-old">Rp 500.000</span>
                                  <span class="price-new">Rp 250.000</span>
                                </div>
                              </div>
                              <div class="col-md-6 no-padding">
                                <div class="image">
                                  <img src="/images/coffee/example9.jpg" alt="product"
                                       class="lazy img-responsive product"/>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- Promo Bentuk Tab End --}}
                  </div>
                </div>
              </div>
            </div>
            {{-- Promo Mesin Kopi End --}}
          </div>
        </div>
      </div>
      {{-- Promo End--}}


    </div>
  </div>

@endsection