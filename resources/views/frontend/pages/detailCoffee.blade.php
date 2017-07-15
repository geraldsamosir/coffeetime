@extends('layouts.frontend')

@section('title','| '.$productCoffee->name)

@section('content')
  <div class="section-details-coffee">
    <div class="container">
      {{-- Baris Detail Produk Start --}}
      <div class="row">
        {{-- Detail Kiri Start --}}
        <div class="col-md-7">

          <div class="details-slide">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="details-slide-header">
                    <div class="col-md-12">
                      <div id="carousel-details" class="carousel slide" data-ride="carousel"
                           data-interval="3000">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                          @foreach($productImages as $key => $image)
                            <div class="item @if($key == 0) active srle @endif">
                              <img src="{{ Voyager::image($image) }}" alt="2.jpg"
                                   class="img-responsive">
                              <div class="carousel-caption">
                              </div>
                            </div>
                          @endforeach
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="details-deskripsi">
            <div class="row">
              <div class="panel-card">
                <div class="panel-card-body">
                  <h4>Deskripsi Product</h4>
                  {!! $productCoffee->description !!}
                </div>
              </div>
            </div>
          </div>

        </div>
        {{-- Detail Kiri End --}}

        {{-- Detail Kanan Start --}}
        <div class="col-md-5">

          <div class="details-pembelian">
            <div class="row">
              <div class="col-sm-12">
                <div class="panel-card">
                  <div class="panel-card-header">
                    <h3 class="panel-title">Lakukan Pembelian</h4>
                  </div>
                  <div class="panel-card-body">

                    <div class="coffee-title">
                      <div class="row">
                        <div class="col-md-12">
                          {{ $productCoffee->name }}
                        </div>
                      </div>
                    </div>

                    {!! Form::open(['url'=>'ajax/addcartitem/'.$productCoffee->id, 'method'=>'POST']) !!}

                    @if($productCoffee->is_beans)
                      <div class="coffee-brew">
                        <div class="row">
                          <div class="col-md-12">
                            <span class="sub-title">Brew Method</span>
                          </div>

                          <div class="col-md-12">
                            {!! Form::select('option', ['drip' => 'DRIP', 'espresso' => 'ESPRESSO', 'aeropress' => 'AEROPRESS', 'wholebean' => 'WHOLEBEAN'], 'wholebean', ['class' => 'brew-select form-control']) !!}
                          </div>
                        </div>
                      </div>
                    @endif

                    <div class="coffee-harga">
                      <div class="row">
                        <div class="col-md-12">
                          <span class="sub-title">Harga</span>
                        </div>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-7 flex-direction-coloumn">
                              <div class="harga-count-pembelian">
                                <span
                                  class="price-new">Rp. {{ $productCoffee->discounted_price > 0 ? number_format($productCoffee->discounted_price) : number_format($productCoffee->original_price) }}</span>
                                @if($productCoffee->discounted_price > 0) <span
                                  class="price-old">Rp. {{ number_format($productCoffee->original_price) }}</span> @endif
                              </div>
                            </div>
                            <div class="col-md-5">
                              {{-- <div class="btn-count-pembelian">
                                  <button type="button" class="btn btn-primary btn-count">-</button>
                                  <div class="count-pembelian">1</div>
                                  <button type="button" class="btn btn-primary btn-count">+</button>
                              </div> --}}
                              {!! Form::number('qty',1,['class'=>'qty','data-min'=>'1']) !!}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="coffee-button">
                      <div class="row">
                        <div class="col-md-12">
                          {!! Form::submit('Masukkan ke keranjang',['class'=>'btn btn-block btn-success']) !!}
                          {{-- <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#addToChart">
                              <i class="fa fa-shopping-cart"></i>
                              Beli Sekarang
                          </button> --}}
                        </div>
                      </div>
                    </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="details-core">
            <div class="row">
              <div class="col-sm-12">
                <div class="panel-card">
                  <div class="panel-card-header">
                    <h3 class="panel-title">Details</h3>
                  </div>
                  <div class="panel-card-body">
                    <div class="core-details">
                      <table>
                        @foreach($characteristics as $characteristic)
                          <tr>
                            <td>{{ explode('=', $characteristic)[0] }}</td>
                            <td>{{ explode('=', $characteristic)[1] }}</td>
                          </tr>
                        @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @if($productCoffee->need_graph)
            <div class="details-core">
              <div class="row">
                <div class="col-sm-12">
                  <div class="panel-card">
                    <div class="panel-card-header">
                      <h3 class="panel-title">Graph</h3>
                    </div>
                    <div class="panel-card-body">
                      <div class="core-details">
                        <canvas id="myChart" width="400" height="400"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif

        </div>
        {{-- Detail Kanan End --}}
      </div>
      {{-- Baris Detail Produk End --}}
    </div>
  </div>

  @if(count($relatedArticle) > 0)
    <div class="section-resep-coffee">
      <div class="container">
        {{-- Baris Related Resep Start --}}
        <div class="row">
          <div class="col-md-12">
            <div class="panel-default-header">
              <h3>Resep</h3>
            </div>
            <div class="resep-coffee-list">
              <div class="row">
                {{-- List Resep Start --}}
                @foreach($relatedArticle as $article)
                  <div class="col-md-6">
                    <div class="card-resep hvr-float-shadow">
                      <div class="row">
                        <a href="/article/view/{{$article->id}}">
                          <div class="col-md-4">
                            <div class="resep-image">
                              <img style="height:100%" class="img-responsive"
                                   src="{{ !empty($article->header_image) ? Voyager::image($article->header_image) : asset('images/placeholder-image.png') }}"
                                   alt="">
                            </div>
                          </div>
                          <div class="col-md-8">
                            <div class="resep-list-details">
                              <span class="resep-title">{{$article->title}}</span>
                              <div class="resep-brew">
                                @foreach($article->tagged as $tag)
                                  <span class="label label-primary">{{$tag->tag_name}}</span>
                                @endforeach
                              </div>
                              <div class="resep-social-icon">
                                <i class="fa fa-thumbs-up"></i>
                                <span class="icon-like">{{$article->likes}}</span>
                                <i class="fa fa-thumbs-up"></i>
                                <span class="icon-comment">{{$article->copies}}</span>
                                <i class="fa fa-eye"></i>
                                <span class="icon-view">{{$article->views}}</span>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
                {{-- List Resep End --}}
              </div>
            </div>
          </div>
        </div>
        {{-- Baris Related Resep End --}}
      </div>
    </div>
  @endif


  <div class="section-related-coffee">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          {{-- Produk Kopi Terbaru --}}
          <div class="panel-default">
            <div class="panel-default-header">
              <div class="panel-header-title">Produk Terkait</div>
            </div>
            <div class="panel-default-body">
              <div class="row">
                @foreach($relatedProduct as $coffee)
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
        </div>
      </div>
    </div>

    @endsection

    @section('js')
      <script>
          var ctx = document.getElementById("myChart");
          arrLabels = []
          arrValues = []
            @if($productCoffee->need_graph)
            @foreach($graphs as $graph)
          var strLabel = <?php echo json_encode(explode('=', $graph)[0]); ?>;
          var intValue = <?php echo json_encode(explode('=', $graph)[1]); ?>;
          {{--<td>{{ explode('=', $characteristic)[0] }}</td>--}}
          {{--<td>{{ explode('=', $characteristic)[1] }}</td>--}}
arrLabels.push(strLabel)
          arrValues.push(intValue)
            @endforeach
          var myChart = new Chart(ctx, {
                  type: 'radar',
                  data: {
                      labels: arrLabels,
                      datasets: [{
                          label: 'Coffee Characteristics',
                          data: arrValues,
                          backgroundColor: [
                              'rgba(41, 174, 155, 0.5)',
                          ],
                          borderColor: [
                              'rgba(41,174,155,1)',
                          ],
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scale: {
                          ticks: {
                              beginAtZero: true,
                              max: 10,
                          }
                      }
                  }
              });
        @endif
      </script>
@endsection
