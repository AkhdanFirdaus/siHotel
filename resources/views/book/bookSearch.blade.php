@extends('layouts.app')

@section('styles')
<style type="text/css">
	a:hover {
		text-decoration: none;
	}	
</style>
@endsection

@section('content')

<div class="warna-oren">
	@include('partials.navbar')
</div>
<div class="jumbotron pb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-4">				
				<i class="fas fa-search-location fa-4x fa-pull-left"></i>
				<h1 class="headingtfa">{{ $lokasis->lokasi }}</h1>
			</div>
			<div class="col text-justify">
				<dl class="row">
					<dt class="col-3">Waktu</dt>
					<dd class="col">{{ $detail['checkin'] }} <strong>sampai</strong> {{ $detail['checkout'] }}</dd>
				</dl>
				<dl class="row">
					<dt class="col-3">Jumlah Tamu</dt>
					<dd class="col">{{ $detail['jml'] }} Orang</dd>
				</dl>
				<dl class="row">
					<dt class="col-3">Hasil Pencarian</dt>
					<dd class="col">{{ $hasil->hotel_count }} Hotel ditemukan</dd>
				</dl>				
			</div>			
		</div>		
	</div>	
</div>

<div class="container mb-5">			
	<div class="row">
		@foreach($lokasis->hotel as $count => $hotel)
		@if($count % 3 == 0)
		</div><div class="row mt-4">
		@endif
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top img-fluid" src="{{ asset('/img/hotel_image/'.$hotel->hotel_image )}}" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">{{ $hotel->nama }}</h5>
					<p class="card-text">{{ $hotel->alamat }}</p>
					<a href="{{ route("book.show", $hotel->slug)}}" class="card-link">Pesan Sekarang</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>	
</div>

@include('partials.footer')

@endsection