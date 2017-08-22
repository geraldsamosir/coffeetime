@extends('layouts.frontend')

@section('title','| Pembayaran')

@section('content')
  <div class="section-pembayaran">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="pembayaran-bank">
            <div class="panel-card">
              <div class="panel-card-header">
                <h3 class="panel-title">Pembayaran</h3>
              </div>
              <div class="panel-card-body">
                <div class="logo-bca">
                  <img src="{{ asset('images/bca.png') }}" alt="BCA">
                </div>
                <div class="rek">
                  <p class="no">No. Rek 0222488484</p>
                  <p class="an">a/n. Albert Ang</p>
                </div>
                <blockquote>
                  <p>- Silahkan Transfer ke rekening BCA kami.</p>
                  <p>- Jangka waktu transfer dan konfirmasi adalah 1 Hari.</p>
                  <p>- Jika melewati batas waktu, maka request akan kami batalkan</p>
                  <p>- Harap Memasukkan berita <strong>Order#{{ $order->id }}</strong></p>
                </blockquote>
              </div>
            </div>
            <div class="panel-card">
              <div class="panel-card-header">
                <h3 class="panel-title">Status Pembayaran</h3>
              </div>
              <div class="panel-card-body">
                <h3>{{strtoupper(App\Order::status[$order->status])}}</h3>
              </div>
            </div>
            @if($order->status == App\Order::WAITING_PAYMENT || $order->status == App\Order::PAYMENT_CONFIRMED)
              <button class="btn btn-primary btn-confirmasi" data-toggle="modal" data-target="#myModal">Konfirmasi
                Pembayaran
              </button>
            @endif
          <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Konfirmasi Pembayaran</h4>
                  </div>
                  <div class="modal-body">
                    {!! Form::open(['url'=>'/order/confirmation/'.$order->id, 'OrderController@paymentConfirmation']) !!}
                    <div class="form-group">
                      {!! Form::label('lblSender','Nama Pengirim',['class'=>'required']) !!}
                      {!! Form::text('lblSender',null,['class'=>'form-control','placeholder'=>'Nama Pengirim', 'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label('lblAmount','Jumlah Transfer',['class'=>'required']) !!}
                      {!! Form::number('lblAmount',null,['class'=>'form-control','placeholder'=>'Jumlah Transfer', 'required']) !!}
                    </div>
                  </div>
                  <div class="modal-footer">
                    {!! Form::submit('Konfirmasi',['class'=>'btn btn-primary']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  </div>
                  {!! Form::close() !!}
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="final-alamat">
                <div class="panel-card">
                  <div class="panel-card-header">
                    <h3 class="panel-title">Alamat Pengiriman</h3>
                  </div>
                  <div class="panel-card-body">
                    <div class="checkout-address">
                      <h4>{{ $order->recipient_name }}</h4>
                      <p>{{ $order->province }}</p>
                      <p>{{ $order->city }}</p>
                      <p>{{ $order->district }}</p>
                      <p>{{ $order->address }}</p>
                      <p>Nomor Handphone: {{ $order->phone_number }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="finish-checkout">
                <div class="panel-card">
                  <div class="panel-card-header">
                    <h3 class="panel-title">Order#{{ $order->id }}</h3>
                  </div>
                  <div class="panel-card-body">

                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                        @foreach($order->orderDetails as $orderItem)
                          <tr class="cart-item-top">
                            <td rowspan="2" class="cart-item-preview">
                              <img class="img-responsive" src="{{ Voyager::image($orderItem->product->thumb_image) }}"
                                   alt="gambar-product">
                            </td>
                            <td class="cart-item-name">
                              <a href="/detail-coffee/{{$orderItem->product->id}}">{{ $orderItem->product->name }}</a>
                              <p class="cart-item-brew-method">{{ $orderItem->option }}</p>
                            </td>
                          </tr>

                          <tr class="cart-item-bottom">
                            <td class="cart-item-quantity">
                              <p class="cart-item-price-new">{{ $orderItem->quantity }} x
                                Rp. {{ number_format($orderItem->price) }}</p>
                            </td>
                            <td class="cart-item-subtotal">
                              <p class="cart-subtotal">
                                Rp. {{ number_format($orderItem->price * $orderItem->quantity) }}</p>
                            </td>
                          </tr>
                        @endforeach

                        <tr class="cart-item-subtotal">
                          <td>Total Belanja</td>
                          <td style="text-align:right;" colspan="2">Rp. {{ number_format($order->amount) }}</td>
                        </tr>
                        <tr class="cart-item-subtotal">
                          <td>Kode Unik</td>
                          <td style="text-align:right;" colspan="2">Rp. {{ number_format($order->unique_code) }}</td>
                        </tr>
                        <tr class="cart-item-total">
                          <td>Total Pembayaran</td>
                          <td style="text-align:right;" colspan="2">
                            Rp. {{ number_format($order->transfer_amount) }}</td>
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
    </div>
  </div>
@endsection