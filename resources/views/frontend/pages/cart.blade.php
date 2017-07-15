@extends('layouts.frontend')

@section('title', 'Your Cart')

@section('content')
  <div class="section-cart-list">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <div class="panel-cart">
            <div class="panel-cart-count">
              <h3 class="cart-count">Keranjang Belanja ({{ $cart->count() }})</h3>
            </div>
            <div class="panel-cart-header">
              <table class="table table-cart">
                <tr>
                  <td colspan="2" class="f1">&nbsp;</td>
                  <td>
                    Harga
                  </td>
                  <td class="cart-item-quantity">
                    Jumlah
                  </td>
                  <td>
                    Subtotal
                  </td>
                  <td>&nbsp;</td>
                </tr>
              </table>
            </div>
            {!! Form::open(['url'=>'checkout', 'method'=>'POST']) !!}
            <div class="panel-cart-body">
              <div class="table-responsive">
                @if($cart->count() > 0)
                  <table class="table table-cart">
                    @foreach($cart as $cartItem)
                          <?php
                          $product = App\Product::find($cartItem->id);
                          ?>
                      <tr>
                        <td class="cart-item-preview f2">
                          <img src="{{ Voyager::image($product->thumb_image) }}" alt="{{$cartItem->name}}">
                        </td>
                        <td class="cart-item-name f2">
                          <a href="/detail-coffee/{{ $cartItem->id }}">{{ $cartItem->name }}</a>
                          <p class="cart-item-brew-method">{{ $cartItem->options->option }}</p>
                        </td>
                        <td class="cart-item-price">
                          <p id="price-{{$cartItem->rowId}}" class="cart-item-price-new">
                            Rp {{ number_format($cartItem->price)}}</p>
                        </td>
                        <td class="cart-item-quantity">
                          <input id="qty-{{$cartItem->rowId}}" name="qty-{{$cartItem->rowId}}" type="number" min="1"
                                 value="{{$cartItem->qty}}">
                        </td>
                        <td class="cart-item-subtotal">
                          <p id="subtotal-{{$cartItem->rowId}}" class="cart-subtotal">
                            Rp {{ number_format($cartItem->price * $cartItem->qty) }}</p>
                        </td>
                        <td class="cart-item-delete">
                          <a href="{{ url('ajax/deletecartitem/'.$cartItem->rowId) }}" class="btn btn-cart-delete">
                            <i class="fa fa-times-circle"></i>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </table>
                @else
                  {{-- Jika Cart Kosong --}}
                  <div class="panel-cart-body cart-kosong">
                    <h2>Keranjang Anda Kosong, Silahkan lakukan pembelian.</h2>
                  </div>
                @endif
              </div>
            </div>
            <div class="panel-cart-footer">
              <button type="button" onclick="window.history.back()" href="/" class="btn btn-tohome">Kembali
              </button>
              @if($cart->count() > 0)
                {!! Form::submit('Lanjutkan Pembayaran', ['class'=>'btn btn-success btn-tocheckout']) !!}
              @endif
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      @foreach($cart as $cartItem)

document.getElementById('qty-{{$cartItem->rowId}}').onchange = function () {
          $('#subtotal-{{$cartItem->rowId}}').text('Rp ' + numeral(parseInt({{$cartItem->price}}) * parseInt(document.getElementById('qty-{{$cartItem->rowId}}').value)).format('0,0'))
      };
    @endforeach
  </script>
@endsection