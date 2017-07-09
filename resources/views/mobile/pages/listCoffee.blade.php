@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

  {{-- Section Sorting --}}
  <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">search</i>Filter</div>
      <div class="row collapsible-body">
        {!! Form::open(['url'=>'/search-product', 'method'=>'GET']) !!}
        <div class="input-field col s12">
          <input name="query" id="namaproduk" type="text" class="validate">
          <label for="namaproduk">Cari Produk</label>
        </div>

        <div class="input-field col s6">
          <select name="category" class="select-kategori form-control">
            <option value="" disabled selected>Kategori</option>
            <option value="">Reset</option>
            @foreach($categoryProduct as $category)
              <option @if((app('request')->input('category') ? app('request')->input('category') : null) == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="input-field col s6">
          <select name="price" class="select-merek form-control">
            <option value="" selected disabled>Harga</option>
            <option value="" >Reset</option>
            <option @if((app('request')->input('price') ? app('request')->input('price') : null) == 'to100') selected @endif value="to100">Rp. 0 - Rp. 100.000</option>
            <option @if((app('request')->input('price') ? app('request')->input('price') : null) == 'between100-500') selected @endif value="between100-500">Rp. 100.000 - Rp. 500.000</option>
            <option @if((app('request')->input('price') ? app('request')->input('price') : null) == 'over500') selected @endif  value="over500"> > Rp. 500.000 </option>
          </select>
        </div>

        <div class="input-field col s6">
          <select name="sort" class="select-merek form-control">
            <option value="" selected disabled>Urutkan</option>
            <option value="" >Reset</option>
            <option value="lowprice">Harga Terendah</option>
            <option value="highprice">Harga Tertinggi</option>
            <option value="" disabled>---</option>
            <option value="oldest">Paling Lama</option>
            <option value="latest">Paling Baru</option>
          </select>
        </div>

        <div class="input-field col s6">
          <button type="submit" class="waves-effect waves-light btn">Filter</button>
        </div>
      </div>
    </li>
  </ul>
  {{-- End Section Sorting --}}
  {!! Form::close() !!}
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