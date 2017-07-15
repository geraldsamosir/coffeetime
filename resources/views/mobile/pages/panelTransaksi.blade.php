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
							@foreach($orderHistory as $order)
								<tr>
									<td>
										<a href="{{ url('order/summary/'.$order->id) }}">{{$order->id}}</a>
									</td>
									<td>
										{{$order->created_at}}
									</td>
									<td>
										Rp. {{number_format($order->amount)}}
									</td>
									<td>
										{{App\Order::status[$order->status]}}
									</td>
								</tr>
							@endforeach
		        </tbody>
	      	</table>
			<center>{{ $orderHistory->links() }}</center>
	    </div>
	</div>
{{-- End Section History Transaksi Akun --}}
{{-- ========================================== --}}
	
@endsection

@section('js')
@endsection