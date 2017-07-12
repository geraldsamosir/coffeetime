@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

  {{-- Section Slider --}}
  <div class="slider slider-detail">
    <ul class="slides">
      @foreach($productImages as $key=> $image)
        <li><img src="{{Voyager::image($image)}}"></li>
      @endforeach
    </ul>
  </div>
  {{-- End Section Slider --}}
  {{-- ========================================== --}}



  {{-- Section Detail --}}
  <div class="row">
    {!! Form::open(['url'=>'ajax/addcartitem/'.$productCoffee->id, 'method'=>'POST']) !!}
    <div class="col s12 m7">
      <h3 class="subtitle">Pembelian</h3>
      <span class="produk-detail-title">{{$productCoffee->name}}</span>
      <span
        class="produk-detail-harga">Rp. {{ $productCoffee->discounted_price > 0 ? number_format($productCoffee->discounted_price) : number_format($productCoffee->original_price) }}</span>
      @if($productCoffee->discounted_price > 0) <span
        style="text-decoration:line-through">Rp. {{ number_format($productCoffee->original_price) }}</span> @endif
      @if($productCoffee->is_beans)
      <div class="input-field col s12">
        {!! Form::select('option', ['drip' => 'DRIP', 'espresso' => 'ESPRESSO', 'aeropress' => 'AEROPRESS', 'wholebean' => 'WHOLEBEAN'], 'wholebean', ['class' => 'brew-select form-control']) !!}
        <label>Brew Method</label>
      </div>
      @endif
      <div class="input-field col s12">
        {!! Form::number('qty',1,['class'=>'qty','data-min'=>'1']) !!}
        <label for="jumlah">Jumlah</label>
      </div>
      <div class="col s12">
        {!! Form::submit('Masukkan ke keranjang',['class'=>'btn waves-effect waves-light']) !!}
      </div>
    </div>

    {!! Form::close() !!}

    <div class="col s12 m5">
      <h3 class="subtitle">Details</h3>
      <table class="striped table-detail">
        @foreach($characteristics as $characteristic)
          <tr>
            <td>{{ explode('=', $characteristic)[0] }}</td>
            <td>{{ explode('=', $characteristic)[1] }}</td>
          </tr>
        @endforeach
      </table>
    </div>

    @if($productCoffee->need_graph)
      <div class="col s12 m5">
        <h3 class="subtitle">Graph</h3>
        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
    @endif
  </div>
  {{-- End Section Detail --}}
  {{-- ========================================== --}}



  {{-- Section Deskripsi --}}
  <div class="row">
    <div class="col s12">
      <h3 class="subtitle">Deskripsi</h3>
      <p class="p12">{!! $productCoffee->description !!}</p>
    </div>
  </div>
  {{-- End Section Deskripsi --}}
  {{-- ========================================== --}}



  @if(count($relatedArticle) > 0)
  {{-- Section Resep --}}
  <div class="row">
    <h3 class="subtitle">Resep</h3>
    @foreach($relatedArticle as $article)
      <a href="/article/view/{{$article->id}}">
    <div class="col s12 m6">

      <div class="card horizontal">
        <div class="card-image card-image-resep">
          <img
               src="{{ !empty($article->header_image) ? Voyager::image($article->header_image) : asset('images/placeholder-image.png') }}"
               alt="">
        </div>
        <div class="card-stacked card-stacked-resep">
          <div class="card-content">
            <p class="p12"><b>{{$article->title}}</b></p>
            <p class="p12 social-stat">
              <i class="material-icons" style="font-size:14px;">content_copy</i>{{$article->copies}}
              <i class="material-icons" style="font-size:14px;">visibility</i>{{$article->views}}
              <i class="material-icons" style="font-size:14px;">thumb_up</i>{{$article->likes}}
            </p>
          </div>
          <div class="card-action">
            <a class="p12" href="#">Lihat</a>
          </div>
        </div>
      </div>

    </div>
      </a>
    @endforeach

  </div>
  {{-- End Section Resep --}}
  {{-- ========================================== --}}
  @endif

  <div class="row">
    <h3 class="subtitle">Produk Terkait</h3>
    @foreach($relatedProduct as $coffee)
      @if($coffee->discount_percent == 0)
        <div class="col s6 m3">
          <a class="voucher-link" href="{{ url('detail-coffee/'.$coffee->id) }}">
            <div style="height:220px;" class="card">
              <div class="card-image card-image-promo">
                <img src="{{ Voyager::image($coffee->thumb_image) }}">
              </div>
              <div style="position:absolute; bottom:0;" class="card-content card-content-promo">
                <h3 class="promo-title">{{$coffee->name}}</h3>
                <p class="hargapromo">Rp {{number_format($coffee->original_price)}}</p>
              </div>
            </div>
          </a>
        </div>
      @else

        <div class="col s6 m3">
          <a class="voucher-link" href="{{ url('detail-coffee/'.$coffee->id) }}">
            <div style="height:220px;" class="card">
              <div class="card-image card-image-promo">
                <img src="{{ Voyager::image($coffee->thumb_image) }}">
              </div>
              <div style="position:absolute; bottom:0;" class="card-content card-content-promo">
                <h3 class="promo-title">{{$coffee->name}}</h3>
                <p class="hargapromo">Rp {{ number_format($coffee->discounted_price)}}<span
                    class="hargalamapromo">Rp. {{ number_format($coffee->original_price)}}</span> - <span
                    class="diskon">{{$coffee->discount_percent}}%</span></p>
              </div>
            </div>
          </a>
        </div>
      @endif
    @endforeach

  </div>

@endsection

@section('js')


  <script>
      $(document).ready(function () {
          $('.slider').slider({
              height: 200
          });

          $('select').material_select();
      });

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