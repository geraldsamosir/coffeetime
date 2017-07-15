@extends('layouts.mobile')

@section('title','| Komparasi')

@section('content')
  <style>
    .select2-container--default {
      display: table !important;
      table-layout: fixed !important;
    }
  </style>
  {{-- Section Komparasi --}}
  <div class="row">
    <h3 class="subtitle">Komparasi Kopi</h3>

    {!! Form::open(['url'=>'/komparasi', 'method'=>'GET']) !!}
    <div class="row">
      <div class="input-field col s6">
        <select name="product1" class="js-example-basic-single col s11">
          @foreach($products as $product)
            <option
              @if((app('request')->input('product1') ? app('request')->input('product1') : null) == $product->id) selected
              @endif value="{{$product->id}}">{{$product->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="input-field col s6">
        <select name="product2" class="js-example-basic-single col s11">
          @foreach($products as $product)
            <option
              @if((app('request')->input('product2') ? app('request')->input('product2') : null) == $product->id) selected
              @endif value="{{$product->id}}">{{$product->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="input-field col s12">
        <button type="submit" class="col s12 btn btn-lg btn-success">Bandingkan</button>
      </div>
    </div>
    {!! Form::close() !!}
  </div>

  <div class="row">
    @if(isset($product1))
      <div style="margin: 0 !important; padding: 2px !important;" class="col s6">
        <div class="row">
        <img src="{{ Voyager::image($product1->thumb_image) }}" alt="product" class="lazy img-responsive product"/>
        <table class="bordered table-komparasi">
          <tr>
            <td colspan="2">
              @if($product1->discounted_price > 0) <span style="text-decoration:line-through"
                                                         class="price-old">Rp. {{ number_format($product1->original_price) }}</span> @endif
              Rp. {{ $product1->discounted_price > 0 ? number_format($product1->discounted_price) : number_format($product1->original_price) }}
            </td>
          </tr>
        </table>
        <table class="bordered table-komparasi">
          <tbody>
          @foreach($characteristics1 as $characteristic)
            <tr>
              <td>{{ explode('=', $characteristic)[0] }}</td>
              <td>{{ explode('=', $characteristic)[1] }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
        </div>
        @if($product1->need_graph)
          <canvas id="myChart1" width="400" height="400"></canvas>
        @endif
      </div>
    @endif

    @if(isset($product2))
      <div style="margin: 0 !important; padding: 2px !important;" class="col s6">
        <div class="row">
        <img src="{{ Voyager::image($product2->thumb_image) }}" alt="product" class="lazy img-responsive product"/>
        <table class="bordered table-komparasi">
          <tr>
            <td colspan="2">
              @if($product2->discounted_price > 0) <span style="text-decoration:line-through"
                                                         class="price-old">Rp. {{ number_format($product1->original_price) }}</span> @endif
              Rp. {{ $product2->discounted_price > 0 ? number_format($product1->discounted_price) : number_format($product1->original_price) }}
            </td>
          </tr>
        </table>
        <table class="bordered table-komparasi">
          <tbody>
          @foreach($characteristics2 as $characteristic)
            <tr>
              <td>{{ explode('=', $characteristic)[0] }}</td>
              <td>{{ explode('=', $characteristic)[1] }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
        </div>
        @if($product2->need_graph)
          <canvas id="myChart2" width="400" height="400"></canvas>
        @endif
      </div>
    @endif
  </div>
  {{-- End Section Komparasi --}}



@endsection

@section('js')


  <script>
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
                          fontSize: 8,
                      },
                      pointLabels: {
                          fontSize: 8,
                      }
                  },
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
                          fontSize: 8,
                      },
                      pointLabels: {
                          fontSize: 8,
                      }
                  },
              }
          });
    @endif
  </script>


@endsection