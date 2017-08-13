@extends('layouts.frontend')

@section('title','| Checkout')

@section('content')
  <div class="section-header-checkout">

  </div>

  <div class="section-content-checkout">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form-checkout">
            <div class="panel-card">
              <div class="panel-card-header">
                <h3 class="panel-title">Alamat</h3>
              </div>
              <div class="panel-card-body">
                {!! Form::open(['url'=>'/order/summary/'.$order->id, 'OrderController@getOrderSummary']) !!}
                {{--<div class="form-group">--}}
                  {{--{!! Form::label('lblAlamat','Label Alamat',['class'=>'required']) !!}--}}
                  {{--{!! Form::text('lblAlamat',null,['class'=>'form-control','placeholder'=>'Contoh: Alamat Rumah, Alamat Kantor','required']) !!}--}}
                {{--</div>--}}
                <div class="form-group">
                  {!! Form::label('lblNama','Nama Lengkap',['class'=>'required']) !!}
                  {!! Form::text('lblNama',null,['class'=>'form-control','placeholder'=>'Nama Penerima', 'required']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('lblProvinsi','Provinsi',['class'=>'required']) !!}
                  {!! Form::select('lblProvinsi',Indonesia::allProvinces()->mapWithKeys(function ($item) {
                    return [$item['id'] => $item['name']];
                  }),null,['class'=>'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('lblKota','Kota',['class'=>'required']) !!}
                  {!! Form::select('lblKota',['Pilih Provinsi terlebih dahulu'],null,['class'=>'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('lblKecamatan','Kecamatan',['class'=>'required']) !!}
                  {!! Form::select('lblKecamatan',['Pilih Kota Terlebih dahulu'],null,['class'=>'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('lblJalan','Alamat',['class'=>'required']) !!}
                  {!! Form::textarea('lblJalan',null,['class'=>'form-control','placeholder'=>'Alamat', 'required']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblPos','Kode Pos',['class'=>'required']) !!}
                  {!! Form::text('lblPos',null,['class'=>'form-control','placeholder'=>'Kode Pos']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblHp','Nomor Handphone',['class'=>'required']) !!}
                  {!! Form::text('lblHp',null,['class'=>'form-control','placeholder'=>'Nomor Handphone', 'required']) !!}
                </div>
                {!! Form::submit('Lanjut Ke Pembayaran',['class'=>'btn btn-block btn-primary']) !!}
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="finish-checkout">
            <div class="panel-card">
              <div class="panel-card-header">
                <h3 class="panel-title">Ringkasan Pemesanan</h3>
              </div>
              <div class="panel-card-body">

                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                    <?php $totalBayar = 0 ?>
                    @foreach($order->orderDetails as $orderItem)
                      <tr class="cart-item-top">
                        <td rowspan="2" class="cart-item-preview">
                          <img class="img-responsive" src="{{ Voyager::image($orderItem->product->thumb_image) }}"
                               alt="gambar-product">
                        </td>
                        <td class="cart-item-name">
                          <a href="{{url('/detail-coffee/'.$orderItem->product->id)}}">{{ $orderItem->product->name }}</a>
                          <p class="cart-item-brew-method">{{ $orderItem->option }}</p>
                        </td>
                      </tr>

                      <tr class="cart-item-bottom">
                        <td class="cart-item-quantity">
                          <p class="cart-item-price-new">{{ $orderItem->quantity }} x
                            Rp. {{ number_format($orderItem->price) }}</p>
                        </td>
                        <td class="cart-item-subtotal">
                          <p class="cart-subtotal">Rp. {{ number_format($orderItem->price * $orderItem->quantity) }}</p>
                        </td>
                      </tr>
                      <?php $totalBayar += $orderItem->price * $orderItem->quantity ?>
                    @endforeach

                    <tr class="cart-item-total">
                      <td>Total Pembayaran</td>
                      <td style="text-align:right;" colspan="2">Rp. {{ number_format($order->amount) }}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $('#lblProvinsi').change(function () {
        $.post('{{ URL::to('order/get-address') }}', {_token: '{{ csrf_token() }}',type: 'kota', id: $('#lblProvinsi').val()}, function(e){
            $('#lblKota').html(e);
        });
      });

      $('#lblKota').change(function () {
          $.post('{{ URL::to('order/get-address') }}', {_token: '{{ csrf_token() }}',type: 'kecamatan', id: $('#lblKota').val()}, function(e){
              $('#lblKecamatan').html(e);
          });
      });
  </script>
@endsection
