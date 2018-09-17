@extends('layouts.app')

@section('content')
	<div class="jumbotron">
		<h1>Ini halaman lihat</h1>
		<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum eius, ratione velit voluptatum fugit corrupti vel necessitatibus, eos deserunt aspernatur.</p>
	</div>

	<div class="container">
		<div class="card-body">
			<h5><small>a.n. </small>{{ $pembayaran->reservasi->guest['nama'] }}</h5>
			<hr>
			<div class="card-text">
				<dl class="row mb-0">
					<dd class="col-4">Check In</dd>
					<dt class="col">{{$pembayaran->reservasi->check_in}} | {{ Carbon\Carbon::parse($pembayaran->reservasi->check_in)->diffForHumans(\Carbon\Carbon::now())}}</dt>
				</dl>
				<dl class="row mb-0">
					<dd class="col-4">Check Out</dd>
					<dt class="col">{{$pembayaran->reservasi->check_out}}</dt>
				</dl>
				<dl class="row mb-0">
					<dd class="col-4">Status</dd>					
					<dt class="col">{{$pembayaran->reservasi->pembayaran->status}} | IDR {{ number_format($pembayaran->reservasi->pembayaran['jumlahPembayaran'] - $pembayaran->reservasi->kamar['harga'], null, ',', '.') }}</dt>
				</dl>
				<dl class="row mb-0">
					<dd class="col-4">PIN Kamar</dd>
					<dt class="col">{{$pembayaran->reservasi->pembayaran->pin}}</dt>
				</dl>
			</div>
			<hr>
			<div class="form-row">
				<div class="col">
					@if($pembayaran->reservasi->pembayaran->status == 'Lunas')
					<button class="btn btn-primary btn-block">Print</button>
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
@endsection