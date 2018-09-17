@extends('layouts.app')

@section('content')
<div class="container p-5">
	@include('partials.message')
			<div class="row">				
				<div class="col-lg-6">
					{!! Form::open(['route' => ['book.inverifikasi', $reservasi->id], 'method' => 'POST']) !!}
						<div class="form-group">
							{{ Form::label('kodenya', 'Kode Verifikasi') }}
							{{ Form::text('kodenya', old('kodenya'), ['class' => 'form-control']) }}
						</div>
						
						<div class="form-row">
							<div class="col form-group">
								{{ Form::label('status', 'Status') }}
								{{ Form::select('status', ['Uang Muka', 'Lunas'], old('status'), ['placeholder' => 'Status Pembayaran...', 'class' => 'custom-select']) }}
							</div>
							<div class="col form-group">
								{{ Form::label('jumlah', 'Jumlah') }}
								{{ Form::text('jumlah', old('jumlah'), ['placeholder' => 'Minimal 50% dari harga sewa', 'class' => 'form-control']) }}
							</div>
						</div>						

						<hr class="border">
						<h3 class="mt-4">Feedback</h3>

						<div class="form-group">
							{{ Form::label('review', 'Review') }}
							{{ Form::textarea('review', old('review'), ['class' => 'form-control']) }}
						</div>

						<div class="form-group">
							{{ Form::label('rate', 'Rating') }}
							{{ Form::number('rate', old('rate'), ['class' => 'form-control']) }}
						</div>
						<div class="form-group">
							{{ Form::submit('Verifikasi', ['class' => 'btn btn-primary btn-block']) }}
						</div>
					{!! Form::close() !!}
				</div>
				<div class="col-lg-6">
					<div class="position-fixed">
						<div class="card">
							<div class="card-header bg-primary text-light">Detail Pemesanan</div>
							<div class="card-body">
								<dl class="row mb-0">
									<dt class="col-4">Kode Pemesanan</dt>
									<dd class="col">{{ $reservasi->pembayaran['kode_booking'] }}</dd>
								</dl>
								<dl class="row mb-0">
									<dt class="col-4">Nama Pemesan</dt>
									<dd class="col">{{ $reservasi->guest['nama'] }}</dd>
								</dl>
								<dl class="row mb-0">
									<dt class="col-4">Alamat Email</dt>
									<dd class="col">{{ $reservasi->guest['email'] }}</dd>
								</dl>
								<dl class="row mb-0">
									<dt class="col-4">Memesan</dt>
									<dd class="col">{{ $reservasi->kamar['kode_kamar'] }} di {{ $reservasi->kamar->hotel['nama'] }}</dd>
								</dl>
								<dl class="row mb-0">
									<dt class="col-4">Waktu</dt>
									<dd class="col">{{ $diff }} hari | {{ $reservasi->check_in }} hingga {{ $reservasi->check_out }}</dd>
								</dl>
								<dl class="row mb-0">
									<dt class="col-4">Total Harga Sewa</dt>
									<dd class="col">IDR {{ number_format($reservasi->kamar['harga'], null, ',', '.') }} </dd>
								</dl>	
							</div>
						</div>						
					</div>					
				</div>
			</div>
</div>
@endsection