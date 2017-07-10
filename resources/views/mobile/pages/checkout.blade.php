@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

{{-- Section Alamat dan Total --}}
  <div class="row">

    <div class="col s12 m6">
      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header"><i class="material-icons">add</i>Tambah Alamat</div>
          <div class="row collapsible-body">
            <div class="input-field col s12">
              <input id="nama" type="text" class="validate">
              <label for="nama">Nama Penerima</label>
            </div>
         
            <div class="input-field col s12">
              <select>
                  <option value="" disabled selected>Provinsi</option>
                  <option value="1">Provinsi 1</option>
                  <option value="2">Provinsi 2</option>
                  <option value="3">Provinsi 3</option>
              </select>
            </div>

            <div class="input-field col s12">
              <select>
                  <option value="" disabled selected>Kota</option>
                  <option value="1">Kota 1</option>
                  <option value="2">Kota 2</option>
                  <option value="3">Kota 3</option>
              </select>
            </div>

            <div class="input-field col s12">
              <select>
                  <option value="" disabled selected>Kecamatan</option>
                  <option value="1">Kecamatan 1</option>
                  <option value="2">Kecamatan 2</option>
                  <option value="3">Kecamatan 3</option>
              </select>
            </div>

            <div class="input-field col s12">
              <textarea id="alamat" class="materialize-textarea"></textarea>
              <label for="alamat">Alamat</label>
            </div>

            <div class="input-field col s12">
              <input id="kodepos" type="text" class="validate">
              <label for="kodepos">Kode Pos</label>
            </div>

            <div class="input-field col s12">
              <input id="telp" type="text" class="validate">
              <label for="telp">Nomor Handphone</label>
            </div>

            <div class="input-field col s6">
              <a class="waves-effect waves-light btn">Tambah</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
    
    <div class="col s12 m6">
          <div class="total">
           <p class="p14">Total Pembayaran: <b>Rp. 200.000</b></p>
          </div>
    </div>

  </div>
{{-- End Section Alamat dan Total --}}
{{-- ========================================== --}}


{{-- Section Cart --}}
  <div class="row">
    <div class="col s12 m6">
        <div class="card horizontal">
            <div class="card-image">
              <img src="images/coffee/example1.jpg">
            </div>
            <div class="card-stacked">
              <div class="card-content">
                  <h3 class="produk-title activator">NIAS 200G KOPI ARABICA<i class="material-icons right">more_vert</i></h3>
                  <p>wholebean</p>
                  <p>Rp 100.000</p>
                  <div class="input-field col s12">
                  <input placeholder="1" id="jumlah" type="number" class="validate" value="1" disabled="">
                </div>
                <p style="padding: 5px;">Sub Total : <b>Rp. 100.000</b></p>
              </div>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">&nbsp;<i class="material-icons right">close</i></span>
              <a class="waves-effect waves-light btn" style="width:100%;margin-bottom: 16px;background: #ff5a5f">Hapus</a>
          </div>
        </div>
      </div>

      <div class="col s12 m6">
        <div class="card horizontal">
            <div class="card-image">
              <img src="images/coffee/example1.jpg">
            </div>
            <div class="card-stacked">
              <div class="card-content">
                  <h3 class="produk-title activator">NIAS 200G KOPI ARABICA<i class="material-icons right">more_vert</i></h3>
                  <p>wholebean</p>
                  <p>Rp 100.000</p>
                  <div class="input-field col s12">
                  <input placeholder="1" id="jumlah" type="number" class="validate" value="1" disabled>
                </div>
                <p style="padding: 5px;">Sub Total : <b>Rp. 100.000</b></p>
              </div>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">&nbsp;<i class="material-icons right">close</i></span>
              <a class="waves-effect waves-light btn" style="width:100%;margin-bottom: 16px;background: #ff5a5f">Hapus</a>
          </div>
        </div>
      </div> 

  </div>
{{-- End Section Cart --}}
{{-- ========================================== --}}


{{-- Section Button --}}
  <div class="row">
    <div class="col s12">
      <a class="waves-effect waves-light btn" style="background: #2ab27b;">Lanjut Ke Pembayaran</a>
    </div>
  </div>
{{-- End Section Button --}}
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