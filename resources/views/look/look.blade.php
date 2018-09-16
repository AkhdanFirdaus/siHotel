@extends('layouts.app')

@section('content')
	<div class="jumbotron">
		<h1>Ini halaman lihat</h1>
		<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum eius, ratione velit voluptatum fugit corrupti vel necessitatibus, eos deserunt aspernatur.</p>
	</div>

	<div class="container">
		<div class="row">
			@foreach($rooms as $count => $room)
				@if($count % 3 == 0)
				</div><div class="row">
				@endif
				<div class="col-md-4">
					<div class="card">					
						<div class="card-body">
							<h3 class="card-title">Kode Kamar: {{ $room->kode_kamar }}</h3>
							<p class="card-text">{{ $room->fasilitas['deskripsi'] }}</p>
						</div>
						<ul class="list-group list-group-flush">								
							<li class="list-group-item">{{ $room->fasilitas['tipe'] }}</li>
							<li class="list-group-item">{{ $room->fasilitas['harga'] }}</li>
						</ul>				
						<div class="card-body">																
							@if($room->status == 0)					
								<div class="alert alert-danger">
									<strong>Kamar sudah terpesan </strong>
								</div>
							@else
								<a href="/look/{{ $room->kode_kamar }}/edit" class="card-link btn btn-primary">Pesan</a>
							@endif							
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection