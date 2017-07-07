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
          <label for="namaproduk">Cari Artikel</label>
        </div>
     
        <div class="input-field col s6">
          <select>
              <option value="" disabled selected>Sorting Artikel</option>
              <option value="1">Like Terbanyak</option>
              <option value="2">View Terbanyak</option>
              <option value="3">Terbaru</option>
              <option value="4">Terlama</option>
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


{{-- Section Card Resep --}}
  <div class="row">
    <div class="col s12 m6">
        <div class="card horizontal">
          <div class="card-image card-image-resep">
            <img src="images/coffee/example9.jpg">
          </div>
          <div class="card-stacked card-stacked-resep">
            <div class="card-content">
              <p class="ptitle">Capuccino Nias <span class="pdate">Date: 12-12-2016</span></span>
              <p class="pcreated">Created by : <a href="">Invokerista</a></p>
              <p class="p12 social-stat">
                  <i class="material-icons" style="font-size:14px;">content_copy</i>10
                  <i class="material-icons" style="font-size:14px;">visibility</i>10
                  <i class="material-icons" style="font-size:14px;">thumb_up</i>10
              </p>
            </div>
            <div class="card-action">
              <a class="p12" href="#">Lihat</a>
            </div>
          </div>
        </div>
    </div>
    <div class="col s12 m6">
        <div class="card horizontal">
          <div class="card-image card-image-resep">
            <img src="images/coffee/example9.jpg">
          </div>
          <div class="card-stacked card-stacked-resep">
            <div class="card-content">
              <p class="ptitle">Capuccino Nias <span class="pdate">Date: 12-12-2016</span></span>
              <p class="pcreated">Created by : <a href="">Invokerista</a></p>
              <p class="p12 social-stat">
                  <i class="material-icons" style="font-size:14px;">content_copy</i>10
                  <i class="material-icons" style="font-size:14px;">visibility</i>10
                  <i class="material-icons" style="font-size:14px;">thumb_up</i>10
              </p>
            </div>
            <div class="card-action">
              <a class="p12" href="#">Lihat</a>
            </div>
          </div>
        </div>
    </div>
  </div>
{{-- End Section Card Resep --}}
{{-- ========================================== --}}

@endsection

@section('js')
	
	 
	<script>
	
	  $(document).ready(function() {
		  $('select').material_select();
      $('.collapsible').collapsible();
		});
       

	</script>
        

@endsection