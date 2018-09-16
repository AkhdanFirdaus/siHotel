@extends('layouts.app')

@section('styles')
<style type="text/css">
	textarea {
		height: 22vh;
	}
</style>
@endsection

@section('content')
{!! Form::open(['route' => ['book.pesan', $kode_booking] , 'method' => 'POST']) !!}				
<div class="container p-5">		
	<div class="row">
		<div class="col-lg-8">				
			<div class="card mb-3 shadow">
				<div class="card-header bg-primary text-light">Tinjauan Pesanan Anda</div>
				<div class="card-body">					
					<div class="row">
						<div class="col-lg-3" style="background-image: url(/img/hotel_image/{{ $kamar->hotel->hotel_image }}); background-size: cover; border-radius: 10px;"></div>
						<div class="col-lg-9">
							<h2>{{ $kamar->hotel->nama }}</h2>
							<hr class="border">
							<dl class="row mb-0">
								<dt class="col-4">Tipe Kamar</dt>
								<dd class="col">{{ $kamar->fasilitas->tipe }}</dd>
							</dl>
							<dl class="row mb-0">
								<dt class="col-4">Kode Kamar</dt>
								<dd class="col">{{ $kamar->kode_kamar }}</dd>
							</dl>
							<dl class="row mb-0">
								<dt class="col-4">Jumlah Tamu</dt>
								<dd class="col">{{ $detail['jml'] }}</dd>
							</dl>
							<dl class="row mb-0">
								<dt class="col-4">Check In</dt>
								<dd class="col">{{ $detail['checkin'] }}</dd>
							</dl>
							<dl class="row mb-0">
								<dt class="col-4">Check In</dt>
								<dd class="col">{{ $detail['checkout'] }}</dd>
							</dl>
						</div>
					</div>
				</div>		        			
			</div>	

			@if(!Auth::check())			            
        	<div class="card shadow">
        		<div class="card-header bg-primary text-light">Detail Pemesan</div>
        		<div class="card-body">
					<div class="form-group">
						{{ Form::label('nama', 'Nama') }}
						{{ Form::text('nama',  old('nama'), ['class' => 'form-control', 'required' => 'required']) }}
					</div>

					<div class="form-group">
						{{ Form::label('email', 'Email') }}
						{{ Form::text('email', old('email'), ['class' => 'form-control', 'required' => 'required']) }}
					</div>

					<div class="form-group">
						{{ Form::label('kontak', 'No Telepon') }}
						{{ Form::text('kontak', old('kontak'), ['class' => 'form-control', 'required' => 'required']) }}
					</div>	                					            
        		</div>						
            </div>			
            @endif            
		</div>
		<div class="col-lg-4">
			<div class="position-fixed">
			<div class="card mb-4 shadow bg-success text-light">
				<div class="card-body">
					<dl>
						<dd><h4>Kode Pemesanan</h4></dd>
						<dt>{{$kode_booking}}</dt>
					</dl>
				</div>
			</div>
			<h4><strong>Detail Harga</strong></h4>
			<div class="card shadow">
				<div class="card-body">					
					<dl>
						<dd>Harga per malam</dd>
						<dt>IDR {{ number_format($kamar->harga, null, ",", ".") }}</dt>
					</dl>
					<hr class="border">
					<dl>
						<dd>Harga per {{ $diff }} malam</dd>
						<dt class="row">
							<div class="col">
								IDR {{ number_format($kamar->harga, null, ",", ".") }} * {{ $diff }}
							</div>
							<div class="col"> = IDR {{ number_format($kamar->harga * $diff, null, ",", ".") }}</div>
						</dt>
					</dl>
				</div>
			</div>
			<div class="form-row mt-3">
				<div class="col-6">
					<a class="btn btn-danger btn-block shadow text-light" onclick="history.go(-1)">Batal Pesan</a>
				</div>		              
				<div class="col-6">
					{{ Form::submit('Pesan', ['class' => 'btn btn-primary btn-block shadow'])}}
				</div>		              
			</div>
			</div>			
		</div>
	</div>					        			            			            
	{!! Form::close() !!}
</div>
@include('partials.message')
@endsection