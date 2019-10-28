@extends('layouts.app')

@section('content')
	<div class="container py-5">
		<h1>Hotelku</h1>
		<hr>
		<div class="card shadow my-4">
			<div class="card-body">
				<div class="row">
					<div class="col-md-4" style="background-image: url('/img/hotel_image/{{$hotel->hotel_image}}'); background-size: cover; border-radius: 5px;">					
					</div>
					<div class="col p-4">					
						<h3>{{ $hotel->nama }}</h3>
						<p class="lead"><small><i class="fas fa-map-marker-alt"></i> {{ $hotel->alamat }}</small></p>
						<hr class="border">
						<dl class="row mb-0">
							<dt class="col-3">No Rekening</dt>
							<dd class="col">{{ $hotel->rekening }} | {{ $hotel->no_rekening }}</dd>
						</dl>
						<dl class="row mb-0">
							<dt class="col-3">Kamar tersedia</dt>
							<dd class="col">{{ $hasilkamar->kamar_count }}</dd>
						</dl>	
					</div>
				</div>
			</div>
		</div>
	</div>

@include('hotel.lookhotel')
@endsection