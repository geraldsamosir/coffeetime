@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

  {{-- Section Status dan Pembayaran --}}
  <div class="row">
    <div class="col s12 m6">
      <h3 class="subtitle">Status Pembayaran</h3>
      <p class="p14 ppading">{{strtoupper(App\Order::status[$order->status])}}</p>
    </div>

    <div class="col s12 m6">
      <h3 class="subtitle">Pembayaran</h3>
      <div class="panel-card-body">
        <div class="col s6 logo-bca">
          <img src="{{ asset('images/bca.png') }}" alt="BCA">
        </div>
        <div class="col s6 rek">
          <p class="no p12 pnomargin">No. Rek <b>0222488484</b></p>
          <p class="an p12 pnomargin">a/n. Albert Ang</p>
        </div>
        <div class="col s12">
          <blockquote style="margin:0px;">
            <p class="p12 pnomargin">- Silahkan Transfer ke rekening BCA kami.</p>
            <p class="p12 pnomargin">- Jangka waktu transfer dan konfirmasi adalah 1 Hari.</p>
            <p class="p12 pnomargin">- Jika melewati batas waktu, maka request akan kami batalkan</p>
            <p class="p12 pnomargin">- Harap Memasukkan berita <strong>Order#{{$order->id}}</strong></p>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
  {{-- End Section Status dan Pembayaran --}}
  {{-- ========================================== --}}


  {{-- Section Alamat Pengiriman --}}
  <div class="row">
    <div class="col s12">
      <h3 class="subtitle">Alamat Pengiriman</h3>
      <div class="panel-card-body">
        <div class="checkout-address">
          <p class="p12 pnomargin"><b>{{$order->recipient_name}}</b></p>
          <p class="p12 pnomargin">{{$order->province}}</p>
          <p class="p12 pnomargin">{{$order->city}}</p>
          <p class="p12 pnomargin">{{$order->district}}</p>
          <p class="p12 pnomargin">{{$order->address}}</p>
          <p class="p12 pnomargin">Nomor Handphone: {{$order->phone_number}}</p>
        </div>
      </div>
    </div>
  </div>
  {{-- End Section Alamat Pengiriman --}}
  {{-- ========================================== --}}


  {{-- Section Order Detail --}}
  <div class="row">
    <div class="col s12">
      <h3 class="subtitle">Order #{{$order->id}}</h3>
      @foreach($order->orderDetails as $orderItem)
      <div class="card horizontal">
        <div class="card-image card-image-pembayaran">
          <img src="{{Voyager::image($orderItem->product->thumb_image)}}">
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <h3 class="produk-title activator"><a href="{{url('/detail-coffee/'.$orderItem->product->id)}}">{{$orderItem->product->name}}</a></h3>
            <p>{{$orderItem->option}}</p>
            <p>{{$orderItem->quantity}} x Rp {{ number_format($orderItem->price) }}</p>
            <p style="padding: 5px;">Sub Total : <b>Rp. {{ number_format($orderItem->price * $orderItem->quantity) }}</b></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <div class="row">
    <div class="col s12">
      <div class="total-order ppading">
        <div class="row" style="margin-bottom:0px">
          <div class="col s6"><p class="p12" style="text-align: right;">Total Belanja :</p></div>
          <div class="col s6"><p class="p12">Rp. {{ number_format($order->amount) }}</p></div>
        </div>
        <div class="row" style="margin-bottom:0px">
          <div class="col s6"><p class="p12" style="text-align: right;">Kode Unik :</p></div>
          <div class="col s6"><p class="p12">Rp. {{ number_format($order->unique_code) }}</p></div>
        </div>

        <div class="row" style="margin-bottom:0px">
          <div class="col s12">
            <p class="p14" style="text-align: center"><b>TOTAL PEMBAYARAN : Rp. {{ number_format($order->transfer_amount) }}</b></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Trigger -->
  @if($order->status == App\Order::WAITING_PAYMENT || $order->status == App\Order::PAYMENT_CONFIRMED)
  <div class="row">
    <a class="col s12 waves-effect waves-light btn" href="#modal1">Konfirmasi Pembayaran</a>
  </div>

  {!! Form::open(['url'=>'/order/confirmation/'.$order->id, 'OrderController@paymentConfirmation']) !!}
  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h3>Konfirmasi Pembayaran</h3>
      <div class="row">
        <div class="col s12">
          <div class="total-order ppading">
            <div class="row" style="margin-bottom:0px">
              <div class="col s6"><p class="p12" style="text-align: right;">Total Belanja :</p></div>
              <div class="col s6"><p class="p12">Rp. {{ number_format($order->amount) }}</p></div>
            </div>
            <div class="row" style="margin-bottom:0px">
              <div class="col s6"><p class="p12" style="text-align: right;">Kode Unik :</p></div>
              <div class="col s6"><p class="p12">Rp. {{ number_format($order->unique_code) }}</p></div>
            </div>

            <div class="row" style="margin-bottom:0px">
              <div class="col s12">
                <p class="p14" style="text-align: center"><b>TOTAL PEMBAYARAN : <br>Rp. {{ number_format($order->transfer_amount) }}</b></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="input-field col s12">
        {!! Form::text('lblSender',null,['class'=>'form-control','placeholder'=>'Nama Pengirim', 'required']) !!}
      </div>
      <div class="input-field col s12">
        {!! Form::text('lblAmount',null,['class'=>'form-control','placeholder'=>'Jumlah Transfer', 'required']) !!}
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Batal</a>
      <button type="submit" class="modal-action waves-effect waves-light btn">Konfirmasi</button>
    </div>
  </div>
  {!! Form::close() !!}

  @endif
  {{-- End Section Order Detail --}}
  {{-- ========================================== --}}


@endsection

@section('js')
  <script !src="">
      $(document).ready(function () {
          // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
          $('.modal').modal();
      });
  </script>
@endsection
