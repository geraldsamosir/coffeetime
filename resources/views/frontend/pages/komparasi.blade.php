@extends('layouts.frontend')

@section('title','| Komparasi Kopi')

@section('content')
  <style>
    .select2-container--default {
      display: table!important;
      table-layout: fixed!important;
    }
  </style>

  <div class="section-komparasi">
    <div class="section-komparasi-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel-default-header">
              <h3>Perbandingan Product</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    {!! Form::open(['url'=>'/komparasi', 'method'=>'GET']) !!}
    <div class="section-komparasi-kopi">
      <div class="container">
        <div class="row">
          <button type="submit" class="col-md-12 btn btn-lg btn-success">Bandingkan</button>
          <div class="col-md-4">
            <div class="komparasi-kopi-title">
              <select name="product1" class="js-example-basic-single col-md-12">
                @foreach($products as $product)
                  <option
                    @if((app('request')->input('product1') ? app('request')->input('product1') : null) == $product->id) selected
                    @endif value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="komparasi-kopi-title">
              <select name="product2" class="js-example-basic-single col-md-12">
                @foreach($products as $product)
                  <option
                    @if((app('request')->input('product2') ? app('request')->input('product2') : null) == $product->id) selected
                    @endif value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
              </select>
            </div>
            {{-- <div class="komparasi-kopi-title">
              <input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="" placeholder="Pencarian...">
              Drip Coffee 10g Arabica Flores "Manggarai"
            </div> --}}
          </div>
          @if(isset($product3) || $komparasi3)
            <div class="col-md-4">
              <div class="komparasi-kopi-title">
                <select name="product3" class="js-example-basic-single col-md-12">
                  @foreach($products as $product)
                    <option @if((app('request')->input('product3') ? app('request')->input('product3') : null) == $product->id) selected
                            @endif value="{{$product->id}}">{{$product->name}}</option>
                  @endforeach
                </select>
              </div>
              {{-- <div class="komparasi-kopi-title">
                <input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="" placeholder="Pencarian...">
                Drip Coffee 10g Arabica Flores "Manggarai"
              </div> --}}
            </div>
          @else
            <div class="col-md-4">
              <div class="komparasi-kopi-tambah">
                <a href="{{url('/komparasi') . '?' . http_build_query(['product1' => isset($product1->id) ? $product1->id : null, 'product2' => isset($product2->id) ? $product2->id : null, 'komparasi3' => true])}}" class="btn btn-primary btn-block">
                  <i class="fa fa-plus"></i>
                  Tambah Product Perbandingan
                </a>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
    {!! Form::close() !!}
    <div class="section-komparasi-body">
      <div class="container">
        <div class="row">
          @if(isset($product1))
            <div class="col-md-4">
              <div class="col-sm-12">
                <div class="panel-card">
                  <div class="panel-card-header">
                    <h3 class="panel-title">Image</h3>
                  </div>
                  <div class="panel-card-body">
                    <div class="image">
                      <img src="{{ Voyager::image($product1->thumb_image) }}" alt="product" class="lazy img-responsive product" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="panel-card">
                  <div class="panel-card-header">
                    <h3 class="panel-title">Price</h3>
                  </div>
                  <div class="panel-card-body">
                    <table>
                      <tr>
                        <td colspan="2">
                          @if($product1->discounted_price > 0) <span style="text-decoration:line-through"
                                                                     class="price-old">Rp. {{ number_format($product1->original_price) }}</span> @endif
                          Rp. {{ $product1->discounted_price > 0 ? number_format($product1->discounted_price) : number_format($product1->original_price) }}
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="panel-card">
                  <div class="panel-card-header">
                    <h3 class="panel-title">Details</h3>
                  </div>
                  <div class="panel-card-body">
                    <div class="core-details">
                      <table>
                        @foreach($characteristics1 as $characteristic)
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
              @if($product1->need_graph)
                <div class="col-sm-12">
                  <div class="panel-card">
                    <div class="panel-card-header">
                      <h3 class="panel-title">Graph</h3>
                    </div>
                    <div class="panel-card-body">
                      <div class="core-details">
                        <canvas id="myChart1" width="400" height="400"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            </div>
          @endif
          @if(isset($product2))
            <div class="col-md-4">
              <div class="col-sm-12">
                <div class="panel-card">
                  <div class="panel-card-header">
                    <h3 class="panel-title">Image</h3>
                  </div>
                  <div class="panel-card-body">
                    <div class="image">
                      <img src="{{ Voyager::image($product2->thumb_image) }}" alt="product" class="lazy img-responsive product" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="panel-card">
                  <div class="panel-card-header">
                    <h3 class="panel-title">Price</h3>
                  </div>
                  <div class="panel-card-body">
                    <table>
                      <tr>
                        <td colspan="2">
                          @if($product2->discounted_price > 0) <span style="text-decoration:line-through"
                                                                     class="price-old">Rp. {{ number_format($product2->original_price) }}</span> @endif
                          Rp. {{ $product2->discounted_price > 0 ? number_format($product2->discounted_price) : number_format($product2->original_price) }}
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="panel-card">
                  <div class="panel-card-header">
                    <h3 class="panel-title">Details</h3>
                  </div>
                  <div class="panel-card-body">
                    <div class="core-details">
                      <table>
                        @foreach($characteristics2 as $characteristic)
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
              @if($product2->need_graph)
                <div class="col-sm-12">
                  <div class="panel-card">
                    <div class="panel-card-header">
                      <h3 class="panel-title">Graph</h3>
                    </div>
                    <div class="panel-card-body">
                      <div class="core-details">
                        <canvas id="myChart2" width="400" height="400"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            </div>
          @endif
            @if(isset($product3))
              <div class="col-md-4">
                <div class="col-sm-12">
                  <div class="panel-card">
                    <div class="panel-card-header">
                      <h3 class="panel-title">Image</h3>
                    </div>
                    <div class="panel-card-body">
                      <div class="image">
                        <img src="{{ Voyager::image($product3->thumb_image) }}" alt="product" class="lazy img-responsive product" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="panel-card">
                    <div class="panel-card-header">
                      <h3 class="panel-title">Price</h3>
                    </div>
                    <div class="panel-card-body">
                      <table>
                        <tr>
                          <td colspan="2">
                            @if($product3->discounted_price > 0) <span style="text-decoration:line-through"
                                                                       class="price-old">Rp. {{ number_format($product3->original_price) }}</span> @endif
                            Rp. {{ $product3->discounted_price > 0 ? number_format($product3->discounted_price) : number_format($product3->original_price) }}
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="panel-card">
                    <div class="panel-card-header">
                      <h3 class="panel-title">Details</h3>
                    </div>
                    <div class="panel-card-body">
                      <div class="core-details">
                        <table>
                          @foreach($characteristics3 as $characteristic)
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
                @if($product3->need_graph)
                  <div class="col-sm-12">
                    <div class="panel-card">
                      <div class="panel-card-header">
                        <h3 class="panel-title">Graph</h3>
                      </div>
                      <div class="panel-card-body">
                        <div class="core-details">
                          <canvas id="myChart3" width="400" height="400"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              </div>
            @endif
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
  <script type="text/javascript">
      $(document).ready(function () {
          $(".js-example-basic-single").select2();


          @if(isset($product1) && $product1->need_graph)
          var ctx = document.getElementById("myChart1");
          arrLabels = []
          arrValues = []
          @foreach($graphs1 as $graph)

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

          @if(isset($product2) && $product2->need_graph)
          var ctx = document.getElementById("myChart2");
          arrLabels = []
          arrValues = []
          @foreach($graphs2 as $graph)

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

          @if(isset($product3) && $product3->need_graph)
          var ctx = document.getElementById("myChart3");
          arrLabels = []
          arrValues = []
          @foreach($graphs3 as $graph)

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
      });
  </script>

@endsection