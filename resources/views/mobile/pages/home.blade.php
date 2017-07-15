@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

  {{-- Section Slider --}}
  <div class="slider">
    <ul class="slides">
      <li><img src="images/slide-1.jpg"></li>
      <li><img src="images/slide-2.jpg"></li>
    </ul>
  </div>
  {{-- End Section Slider --}}
  {{-- ========================================== --}}



  {{-- Section Kopi Terbaru --}}
  <div class="row">
    <h3 class="subtitle">Kopi Terbaru<span class="nextlink pull-right"><a
          href="{{url('list-product/1')}}">lihat semua</a></span></h3>
    @foreach($latestCoffee as $coffee)
      <div class="col s12 m6">
        <div class="card horizontal">
          <div class="card-image">
            <img src="{{Voyager::image($coffee->thumb_image)}}">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <h3 class="produk-title">{{$coffee->name}}</h3>
              <p>
                Rp {{$coffee->discounted_price > 0 ? number_format($coffee->discounted_price) : number_format($coffee->original_price)}}</p>
            </div>
            <div class="card-action">
              <a href="{{url('/detail-coffee/'.$coffee->id)}}" class="waves-effect waves-light btn">Beli</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  {{-- End Section Kopi Terbaru --}}
  {{-- ========================================== --}}



  {{-- Section Mesin Terbaru --}}
  <div class="row">
    <h3 class="subtitle">Mesin Terbaru<span class="nextlink pull-right"><a
          href="{{url('list-product/9')}}">lihat semua</a></span></h3>
    @foreach($latestMachine as $coffee)
      <div class="col s12 m6">
        <div class="card horizontal">
          <div class="card-image">
            <img src="{{Voyager::image($coffee->thumb_image)}}">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <h3 class="produk-title">{{$coffee->name}}</h3>
              <p>
                Rp {{$coffee->discounted_price > 0 ? number_format($coffee->discounted_price) : number_format($coffee->original_price)}}</p>
            </div>
            <div class="card-action">
              <a href="{{url('/detail-coffee/'.$coffee->id)}}" class="waves-effect waves-light btn">Beli</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  {{-- End Section Mesin Terbaru --}}
  {{-- ========================================== --}}



  {{-- Section Promo Terbaru --}}
  <div class="row">
    <h3 class="subtitle">Promo Kopi</h3>
    @foreach($bestPromoCoffee as $coffee)
      <div class="col s6 m3">
        <div class="card">
          <div class="card-image card-image-promo">
            <img src="{{Voyager::image($coffee->thumb_image)}}">
          </div>
          <div class="card-content card-content-promo">
            <h3 class="promo-title">{{ str_limit($coffee->name, $limit = 20, $end = '...') }}</h3>
            <p class="hargapromo">Rp {{number_format($coffee->discounted_price)}} <span class="hargalamapromo">Rp. {{number_format($coffee->original_price)}}</span> - <span
                class="diskon">{{$coffee->discount_percent}}%</span></p>
          </div>
          <div class="card-action card-action-promo">
            <a href="{{url('/detail-coffee/'.$coffee->id)}}" class="waves-effect waves-light btn">Beli</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="row">
    <h3 class="subtitle">Promo Alat Kopi</h3>
    @foreach($bestPromoMachine as $coffee)
      <div class="col s6 m3">
        <div class="card">
          <div class="card-image card-image-promo">
            <img src="{{Voyager::image($coffee->thumb_image)}}">
          </div>
          <div class="card-content card-content-promo">
            <h3 class="promo-title">{{ str_limit($coffee->name, $limit = 20, $end = '...') }}</h3>
            <p class="hargapromo">Rp {{number_format($coffee->discounted_price)}} <span class="hargalamapromo">Rp. {{number_format($coffee->original_price)}}</span> - <span
                class="diskon">{{$coffee->discount_percent}}%</span></p>
          </div>
          <div class="card-action card-action-promo">
            <a href="{{url('/detail-coffee/'.$coffee->id)}}" class="waves-effect waves-light btn">Beli</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  {{-- End Section Promo Terbaru --}}
  {{-- ========================================== --}}



@endsection

@section('js')


  <script>
      $(document).ready(function () {
          $('.slider').slider({
              height: 120
          });
      });
  </script>


@endsection