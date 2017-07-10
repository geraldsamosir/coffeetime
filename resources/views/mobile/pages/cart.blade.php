@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

  {{-- Section Cart --}}
  <div class="row">
    <h3 class="subtitle">Keranjang Belanja ({{$cart->count()}})</h3>

    @foreach($cart as $cartItem)
          <?php
          $product = App\Product::find($cartItem->id);
          ?>
      <div class="col s12 m6">
        <div class="card horizontal">
          <div class="card-image">
            <img src="{{Voyager::image($product->thumb_image)}}">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <h3 class="produk-title activator">{{$cartItem->name}}<i class="material-icons right">more_vert</i>
              </h3>
              <p>{{$cartItem->options->option}}</p>
              <p id="price-{{$cartItem->rowId}}" class="cart-item-price-new">
                Rp {{ number_format($cartItem->price)}}</p>
              <div class="input-field col s12">
                <input id="qty-{{$cartItem->rowId}}" name="qty-{{$cartItem->rowId}}" type="number" min="1"
                       value="{{$cartItem->qty}}">
              </div>
              <p id="subtotal-{{$cartItem->rowId}}" class="cart-subtotal">
                Sub Total : Rp {{ number_format($cartItem->price * $cartItem->qty) }}</p>
            </div>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">&nbsp;<i class="material-icons right">close</i></span>
            <a class="waves-effect waves-light btn" style="width:100%;margin-bottom: 16px;">Update</a>
            <a class="waves-effect waves-light btn" style="width:100%;margin-bottom: 16px;background: #ff5a5f">Hapus</a>
          </div>
        </div>
      </div>
    @endforeach

  </div>
  {{-- End Section Cart --}}

  {{-- Section Button --}}
  <div class="row">
    <div class="col s6 m6">
      <button onclick="window.history.back()" class="waves-effect waves-light btn" style="background: #999999;">Lanjutkan Belanja</button>
    </div>
    <div class="col s6 m6">
      <a class="waves-effect waves-light btn" style="background: #2ab27b;">Pembayaran</a>
    </div>
  </div>
  {{-- End Section Button --}}

@endsection

@section('js')
  <script>
      @foreach($cart as $cartItem)

document.getElementById('qty-{{$cartItem->rowId}}').onchange = function () {
          $('#subtotal-{{$cartItem->rowId}}').text('Sub Total : Rp ' + numeral(parseInt({{$cartItem->price}}) * parseInt(document.getElementById('qty-{{$cartItem->rowId}}').value)).format('0,0'))
      };
    @endforeach
  </script>
@endsection