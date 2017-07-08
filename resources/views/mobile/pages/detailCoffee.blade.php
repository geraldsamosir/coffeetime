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
    <div class="col s12 m7">
      <h3 class="subtitle">Pembelian</h3>
      <span class="produk-detail-title">{{$productCoffee->name}}</span>
      <span class="produk-detail-harga">Rp. 100.000</span>
      <div class="input-field col s12">
        <select>
          <option value="" disabled selected>Pilih Brew Method</option>
          <option value="1">DRIP</option>
          <option value="2">ESPRESSO</option>
          <option value="3">AEROPRESS</option>
        </select>
        <label>Brew Method</label>
      </div>
      <div class="input-field col s12">
        <input placeholder="1" id="jumlah" type="number" class="validate">
        <label for="jumlah">Jumlah</label>
      </div>
      <div class="col s12">
        <a class="waves-effect waves-light btn" style="width:100%;margin-bottom: 16px;">Beli</a>
      </div>
    </div>

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



  {{-- Section Resep --}}
  <div class="row">
    <h3 class="subtitle">Resep</h3>
    <div class="col s12 m6">
      <div class="card horizontal">
        <div class="card-image card-image-resep">
          <img src="images/coffee/example9.jpg">
        </div>
        <div class="card-stacked card-stacked-resep">
          <div class="card-content">
            <p class="p12"><b>Macciato Nias</b></p>
            <p class="p12 social-stat">
              <i class="material-icons" style="font-size:14px;">content_copy</i>10
              <i class="material-icons" style="font-size:14px;">visibility</i>10
              <i class="material-icons" style="font-size:14px;">thumb_up</i>10
            </p>
          </div>
          <div class="card-action">
            <a class="p12" href="#">Lihat</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col s12 m6">
      <div class="card horizontal">
        <div class="card-image card-image-resep">
          <img src="images/coffee/example9.jpg">
        </div>
        <div class="card-stacked card-stacked-resep">
          <div class="card-content">
            <p class="p12"><b>Macciato Nias</b></p>
            <p class="p12 social-stat">
              <i class="material-icons" style="font-size:14px;">content_copy</i>10
              <i class="material-icons" style="font-size:14px;">visibility</i>10
              <i class="material-icons" style="font-size:14px;">thumb_up</i>10
            </p>
          </div>
          <div class="card-action">
            <a class="p12" href="#">Lihat</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End Section Resep --}}
  {{-- ========================================== --}}

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