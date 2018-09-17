@extends('dashboard.dashboard')

@section('dashcontent')
@include('partials.navbar')
<h1>Data Reservasi</h1>
<div class="container">
	<div class="row">
	@foreach($reservasis as $count => $reservasi)
	@if($count % 3 == 0)
		</div><div class="row mt-4">
		@endif
		<div class="col-lg-4">
			<div class="card border-0 shadow">
			@if($reservasi->pembayaran->status == 'Lunas')
			<div class="card-header bg-success text-light">
			@elseif($reservasi->pembayaran->status == 'Uang Muka')
			<div class="card-header bg-warning">
			@else
			<div class="card-header">
			@endif
				{{ decrypt($reservasi->pembayaran['kode_verifikasi']) }}</div>
			<div class="card-body">
				<h5><small>a.n. </small> 
					@if($reservasi->user == null)
						{{ $reservasi->guest['nama'] }}
					@else
						{{ $reservasi->user['name'] }}
					@endif
				</h5>
				<hr>
				<div class="card-text">
					<dl class="row mb-0">
						<dd class="col-4">Check In</dd>
						<dt class="col">{{$reservasi->check_in}} | {{ Carbon\Carbon::parse($reservasi->check_in)->diffForHumans(\Carbon\Carbon::now())}}</dt>
					</dl>
					<dl class="row mb-0">
						<dd class="col-4">Check Out</dd>
						<dt class="col">{{$reservasi->check_out}}</dt>
					</dl>
					<dl class="row mb-0">
						<dd class="col-4">Status</dd>					
						<dt class="col">{{$reservasi->pembayaran->status}} | IDR {{ number_format($reservasi->pembayaran['jumlahPembayaran'] - $reservasi->kamar['harga'], null, ',', '.') }}</dt>
					</dl>
				</div>
				<hr>
				<div class="form-row">
					<div class="col">
						@if($reservasi->pembayaran->status == 'Lunas')
						<button class="btn btn-primary btn-block">Approve</button>
						@else
						<button class="btn btn-warning btn-block">Warn</button>
						@endif
					</div>					
					<div class="col">
						<button class="btn btn-danger btn-block">Cancel Booking</button>
					</div>					
				</div>
			</div>
		</div>
		</div>
	@endforeach
	</div>
</div>
@endsection