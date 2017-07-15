@extends('layouts.frontend')

@section('title', 'Panel Cart')

@section('content')
	<div class="section-panel">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					{{-- Sidepanel from components --}}
					@include('frontend.components.sidepanel')
				</div>
				<div class="col-md-8">
					<div class="section-panel-header-header">
						<div class="panel-card">
							<div class="panel-card-header">
								<h3 class="panel-title">History Transaksi</h3>
							</div>
						</div>
					</div>
					<div class="section-panel-cart">
						<div class="panel-cart">
							<div class="panel-cart-body">
								<div class="table-responsive">
									<table class="table table-cart">
										<tr>
											<td style="font-weight:900">Pesanan</td>
											<td style="font-weight:900">Dipesan Pada</td>
											<td style="font-weight:900">Total</td>
											<td style="font-weight:900">Status</td>
										</tr>
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
									</table>
									<center>{{ $orderHistory->links() }}</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection