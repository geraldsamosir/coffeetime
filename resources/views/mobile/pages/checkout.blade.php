@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

  <div class="col s12 m6">
    <div class="total">
      <p class="p14">Ringkasan Order</p>
    </div>
  </div>
  {{-- Section Cart --}}
  <div class="row">
      <?php $totalBayar = 0?>
    @foreach($order->orderDetails as $orderItem)
      <div class="col s12 m6">
        <div class="card horizontal">
          <div class="card-image">
            <img src="{{Voyager::image($orderItem->product->thumb_image)}}">
          </div>
          <div class="card-stacked">
            <div class="card-content">
                <h3 class="produk-title activator"><a href="{{url('detail-coffee/'.$orderItem->product->id)}}">{{$orderItem->product->name}}</a><i class="material-icons right">more_vert</i>
                </h3>
              <p>{{$orderItem->option}}</p>
              <p>Rp {{ number_format($orderItem->price) }}</p>
              <div class="input-field col s12">
                {{$orderItem->quantity}}
              </div>
              <p style="padding: 5px;">Sub Total :
                <b>Rp. {{ number_format($orderItem->price * $orderItem->quantity) }}</b></p>
            </div>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">&nbsp;<i class="material-icons right">close</i></span>
          </div>
        </div>
      </div>
          <?php $totalBayar += $orderItem->price * $orderItem->quantity ?>
    @endforeach

  </div>
  {{-- End Section Cart --}}
  {{-- ========================================== --}}

  {{-- Section Alamat dan Total --}}
  <div class="row">
    <div class="col s12 m6">
      <div class="total">
        <p class="p14">Alamat Pembayaran</p>
      </div>
    </div>

    <div class="col s12 m6">
      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="row">
              {!! Form::open(['url'=>'/order/summary/'.$order->id, 'OrderController@getOrderSummary']) !!}


              {{--<div class="input-field col s12">--}}
              {{--{!! Form::label('lblAlamat','Label Alamat',['class'=>'required']) !!}--}}
              {{--{!! Form::text('lblAlamat',null,['class'=>'form-control','placeholder'=>'Contoh: Alamat Rumah, Alamat Kantor','required']) !!}--}}
              {{--</div>--}}
              <div class="input-field col s12">
                {!! Form::label('lblNama','Nama Lengkap',['class'=>'required']) !!}
                {!! Form::text('lblNama',null,['class'=>'form-control','placeholder'=>'Nama Penerima', 'required']) !!}
              </div>

              <div class="input-field col s12">
                {!! Form::select('lblProvinsi',Indonesia::allProvinces()->mapWithKeys(function ($item) {
                  return [$item['id'] => $item['name']];
                }),null,['id'=>'lblProvinsi','class'=>'form-control', 'required']) !!}
              </div>

              <div class="input-field col s12">
                {!! Form::select('lblKota',['Pilih Provinsi terlebih dahulu'],null,['id'=>'lblKota','class'=>'form-control', 'required']) !!}
              </div>

              <div class="input-field col s12">
                {!! Form::select('lblKecamatan',['Pilih Kota Terlebih dahulu'],null,['id'=>'lblKecamatan','class'=>'form-control', 'required']) !!}
              </div>

              <div class="input-field col s12">
                {!! Form::label('lblJalan','Alamat',['class'=>'required']) !!}
                {!! Form::textarea('lblJalan',null,['class'=>'materialize-textarea','placeholder'=>'Alamat', 'required']) !!}
              </div>
              <div class="input-field col s12">
                {!! Form::label('lblPos','Kode Pos',['class'=>'required']) !!}
                {!! Form::text('lblPos',null,['class'=>'form-control','placeholder'=>'Kode Pos']) !!}
              </div>
              <div class="input-field col s12">
                {!! Form::label('lblHp','Nomor Handphone',['class'=>'required']) !!}
                {!! Form::text('lblHp',null,['class'=>'form-control','placeholder'=>'Nomor Handphone', 'required']) !!}
              </div>
          </div>
        </li>
      </ul>
    </div>

  </div>
  {{-- End Section Alamat dan Total --}}
  {{-- ========================================== --}}


  {{-- Section Button --}}
  <div class="row">
    <div class="col s12">
      <button type="submit" class="waves-effect waves-light btn" style="background: #2ab27b;">Lanjut Ke Pembayaran</button>
    </div>
  </div>
  {!! Form::close() !!}
  {{-- End Section Button --}}
  {{-- ========================================== --}}



@endsection

@section('js')


  <script>

      $('#lblProvinsi').change(function () {
          $.post('{{ URL::to('order/get-address') }}', {_token: '{{ csrf_token() }}',type: 'kota', id: $('#lblProvinsi').val()}, function(e){
              $('#lblKota').html(e);
              $('select').material_select();
          });
      });

      $('#lblKota').change(function () {
          $.post('{{ URL::to('order/get-address') }}', {_token: '{{ csrf_token() }}',type: 'kecamatan', id: $('#lblKota').val()}, function(e){
              $('#lblKecamatan').html(e);
              $('select').material_select();
          });
      });

      $(document).ready(function () {
          $('select').material_select();
          $('.collapsible').collapsible();
      });


  </script>


@endsection