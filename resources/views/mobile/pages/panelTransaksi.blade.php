@extends('layouts.mobile')

@section('title','| Homepage')

@section('content')

{{-- Section History Transaksi Akun --}}
	<div class="row">
		<h3 class="subtitle">History Transaksi</h3>
		<div class="col s12">
			<table class="striped centered table12">
		        <thead>
		          <tr>
		              <th>Pesanan</th>
		              <th>Dipesan Pada</th>
		              <th>Total</th>
		              <th>Status</th>
		          </tr>
		        </thead>

		        <tbody>
			        <tr>
			            <td><a href="">10</a></td>
			            <td>2017-05-28 07:08:21</td>
			            <td>3200000</td>
			            <td>Pembayaran Sedang Diproses</td>
			        </tr>
			        <tr>
			            <td><a href="">20</a></td>
			            <td>2017-05-28 07:08:21</td>
			            <td>3200000</td>
			            <td>Pembayaran Sedang Diproses</td>
			        </tr>
		        </tbody>
	      	</table>
	    </div>
	</div>

	<div class="row">
		<div class="col s12">
			<ul class="pagination" style="bottom: 10px;text-align: center;">
			    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
			    <li class="active"><a href="#!">1</a></li>
			    <li class="waves-effect"><a href="#!">2</a></li>
			    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
			</ul>
		</div>
	</div>
{{-- End Section History Transaksi Akun --}}
{{-- ========================================== --}}
	
@endsection

@section('js')
@endsection