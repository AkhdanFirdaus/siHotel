@extends('layouts.app')

@section('styles')
{!! Html::style('/css/bookstyle.css') !!}
@endsection

<section class="container">
	<div class="card shadow">
		<div class="card-body">
			<div class="row text-center">
				<div class="col-md-4">
					<i class="fas fa-swimming-pool fa-2x"></i>
					<p class="lead"><strong>Kolam Renang</strong></p>
				</div>
				<div class="col-md-4">
					<i class="fas fa-wifi fa-2x"></i>
					<p class="lead"><strong>Free WiFi</strong></p>
				</div>
				<div class="col-md-4">
					<i class="fas fa-utensils fa-2x"></i>
					<p class="lead"><strong>Restaurant</strong></p>
				</div>
			</div>
			@if(Session::has('detail'))
			<hr class="border">
			<div class="row">
				<div class="container">				
					<div class="col-5">
						<table class="table table-borderless">
							<thead>
								<tr>
									<th scope="col">Check-In</th>
									<th scope="col">Check-Out</th>						
									<th scope="col">Jumlah Tamu</th>						
								</tr>
							</thead>
							<tbody>
								<tr>							
									<td>{{ $detail['checkin'] }}</td>
									<td>{{ $detail['checkout'] }}</td>
									<td>{{ $detail['jml'] }}</td>
								</tr>
							</tbody>
						</table>		
					</div>					
				</div>
			</div>
		</div>		
		@endif
	</div>
</section>

<section class="container my-4">
	<div class="card shadow">
		<div class="row">
			<div class="col">
				<table class="table table-strip">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Kode Kamar</th>						
							<th scope="col">Fasilitas</th>						
							<th scope="col">Action</th>
						</tr>
					</thead>
					@foreach($hotel->kamar as $index => $kamar)
						@if($kamar->status == 'Terisi')
						<tr class="bg-danger text-light">
						@else
						<tr>							
						@endif
						<th scope="row">{{ $index+1 }}</th>
							<td>{{ $kamar->kode_kamar }}</td>
							<td>{{ $kamar->fasilitas->tipe }}</td>							
							<td>
								{{ Form::open(['route' => ['book.kamar', $kamar->kode_kamar], 'method' => 'GET']) }}
								@if($kamar->status == 'Terisi')
									{{Form::submit('Terisi', ['class' => 'btn btn-danger btn-block', 'disabled'])}}
								@else
			                        {{Form::submit('Pesan', ['class' => 'btn btn-primary btn-block'])}}
			                    @endif
			                        {{ Form::token() }}
		                        {{ Form::close() }}
							</td>							
						</tr>
					@endforeach
				</table>		
			</div>
		</div>
	</div>
</section>