@extends('layouts.mobile')

@section('title','| Komparasi')

@section('content')

{{-- Section Komparasi --}}
	<div class="row">
		<h3 class="subtitle">Komparasi Kopi</h3>

	    <form class="col s12">
	      <div class="row">
	        <div class="input-field col s6">
	           <input id="last_name" type="text" class="validate">
	          	<label for="last_name">Kopi 1</label>
	        </div>
	        <div class="input-field col s6">
	          	<input id="last_name" type="text" class="validate">
	          	<label for="last_name">Kopi 1</label>
	        </div>
	      	<div class="input-field col s12">
	      		<a class="waves-effect waves-light btn" style="width: 100%">Bandingkan</a>
	      	</div>
	      </div>
	    </form>

		<div class="col s12">
			<table class="bordered striped table-komparasi">
				<tbody>
					<tr>
                    	<td>Region</td>
                    	<td>Brazil "Fazenda El Progresso"</td>
                    	<td>BColombia "Inza Cauca" South America</td>
                  	</tr>

                  	<tr>
                    	<td>Altitude</td>
                    	<td>1160m</td>
                    	<td>1500 - 2000m</td>
                  	</tr>

                  	<tr>
                    	<td>Varietas</td>
                    	<td>Catucai Castillo Topazio</td>
                    	<td>Caturra</td>
                  	</tr>

                  	<tr>
                    	<td>Processing Method</td>
                    	<td>Pulped Natural</td>
                    	<td>Fully Washed</td>
                  	</tr>
				</tbody>
			</table>
		</div>
    	
  	</div>

{{-- End Section Komparasi --}}



@endsection	

@section('js')
	
	 
	<script>
	

	</script>
        

@endsection