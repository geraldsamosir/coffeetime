@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

  {{-- Section Sorting --}}
  <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">search</i>Filter</div>
      <div class="row collapsible-body">
        <div class="input-field col s12">
          <input id="namaproduk" type="text" class="validate">
          <label for="namaproduk">Cari Produk</label>
        </div>

        <div class="input-field col s6">
          <select>
            <option value="" disabled selected>Kategori</option>
            <option value="1">Coffee A</option>
            <option value="2">Coffee B</option>
          </select>
        </div>

        <div class="input-field col s6">
          <select>
            <option value="" disabled selected>Harga</option>
            <option value="0">Reset</option>
            <option value="1">0 - Rp. 100.00</option>
            <option value="2">Rp. 100.000 - Rp. 500.00</option>
            <option value="3">>Rp. 500.000</option>
            </optgroup>
          </select>
        </div>

        <div class="input-field col s6">
          <select>
            <option value="" disabled selected>Urutkan</option>
            <option value="0">Reset</option>
            <option value="1">Harga Terendah</option>
            <option value="2">Harga Tertinggi</option>
            <option value="3">Paling Lama</option>
            <option value="4">Paling Baru</option>
            </optgroup>
          </select>
        </div>

        <div class="input-field col s6">
          <a class="waves-effect waves-light btn">Filter</a>
        </div>
      </div>
    </li>
  </ul>
  {{-- End Section Sorting --}}
  {{-- ========================================== --}}

  {{-- Section Card Kopi --}}
  <div class="row">
    @foreach($coffees as $coffee)
      @if($coffee->discount_percent == 0)
        <div class="col s6 m3">
          <a class="voucher-link" href="{{ url('detail-coffee/'.$coffee->id) }}">
          <div class="card">
            <div class="card-image card-image-promo">
              <img src="{{ Voyager::image($coffee->thumb_image) }}">
            </div>
            <div class="card-content card-content-promo">
              <h3 class="promo-title">{{$coffee->name}}</h3>
              <p class="hargapromo">Rp {{number_format($coffee->original_price)}}</p>
            </div>
          </div>
          </a>
        </div>
      @else

        <div class="col s6 m3">
          <a class="voucher-link" href="{{ url('detail-coffee/'.$coffee->id) }}">
          <div class="card">
            <div class="card-image card-image-promo">
              <img src="{{ Voyager::image($coffee->thumb_image) }}">
            </div>
            <div class="card-content card-content-promo">
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
  {{-- End Section Card Kopi --}}
  {{-- ========================================== --}}

@endsection

@section('js')


  <script>

      $(document).ready(function () {
          $('select').material_select();
          $('.collapsible').collapsible();
      });


  </script>


@endsection