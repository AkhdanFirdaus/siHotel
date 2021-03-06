@extends('dashboard.dashboard')

@section('dashcontent')
@include('partials.navbar')
@include('partials.message')
<div class="container">
	<h1>Reservasi</h1>	
	<hr class="border">
	<h3>Terproses</h3>
	@if(count($pembayaran) > 0)
	<div class="row">	
		@foreach($pembayaran as $count => $pem)
		@if($count % 3 == 0)
		</div><div class="row">			
		@endif			
			<div class="col-lg-4 mt-2 mt-2">
				<div class="card border-0 shadow">
					<div class="card-header bg-success text-light" data-toggle="collapse" href="#terproses{{ $pem->id }}" role="button" aria-expanded="false" aria-controls="terproses">
						{{ decrypt($pem->kode_booking) }} | 
							{{ Carbon\Carbon::parse($pem->reservasi['check_in'])->diffForHumans(\Carbon\Carbon::now()) }} <i class="fas fa-caret-down"></i>
					</div>
					<div class="collapse" id="terproses{{ $pem->id }}">
						<div class="card-body">
							<h5><small>a.n. </small> 
								@if($pem->reservasi['user'] == null)
									{{ $pem->reservasi->guest['nama'] }}
								@else
									{{ $pem->reservasi->user['name'] }}
								@endif
							</h5>
							<hr>
							<div class="card-text">
								<dl class="row mb-0">
									<dd class="col-5">Check In</dd>
									<dt class="col">{{$pem->reservasi['check_in']}}</dt>
								</dl>
								<dl class="row mb-0">
									<dd class="col-5">Check Out</dd>
									<dt class="col">{{$pem->reservasi['check_out']}}</dt>
								</dl>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		@else
		<div class="jumbotron text-center w-100">
		  <h3>Tidak ada bookingan</h3>
		</div>
		@endif
	<hr>
	<h3>Proses</h3>
	@if(count($pembayaran1) > 0)
		<div class="row">
			@foreach($pembayaran1 as $count => $pem1)
			@if($count % 3 == 0)
				</div><div class="row">
				@endif
				<div class="col-lg-4 mt-2 mb-2">
					<div class="card border-0 shadow">
					@if($pem1->status == 'Lunas')
					<div class="card-header bg-success text-light" data-toggle="collapse" href="#terproses{{ $pem1->id }}" role="button" aria-expanded="false" aria-controls="terproses">
					@elseif($pem1->status == 'Uang Muka')
					<div class="card-header bg-warning text-light" data-toggle="collapse" href="#terproses{{ $pem1->id }}" role="button" aria-expanded="false" aria-controls="terproses">
					@else
					<div class="card-header bg-danger text-light" data-toggle="collapse" href="#terproses{{ $pem1->id }}" role="button" aria-expanded="false" aria-controls="terproses">
					@endif
						{{ decrypt($pem1->kode_booking) }} |
						{{ Carbon\Carbon::parse($pem1->reservasi['check_in'])->diffForHumans(\Carbon\Carbon::now()) }} <i class="fas fa-caret-down"></i>
					</div>
					<div class="collapse" id="terproses{{ $pem1->id }}">
					<div class="card-body">
						<h5><small>a.n. </small> 
							@if($pem1->reservasi->user == null)
								{{ $pem1->reservasi->guest['nama'] }}
							@else
								{{ $pem1->reservasi->user['name'] }}
							@endif
						</h5>
						<hr>
						<div class="card-text">
							<dl class="row mb-0">
								<dd class="col-6">Check In</dd>
								<dt class="col">{{$pem1->reservasi->check_in}}</dt>
							</dl>
							<dl class="row mb-0">
								<dd class="col-6">Check Out</dd>
								<dt class="col">{{$pem1->reservasi->check_out}}</dt>
							</dl>
							<dl class="row mb-0">
								<dd class="col-6">Status</dd>					
								<dt class="col">{{$pem1->status}} | IDR {{ number_format($pem1->jumlahPembayaran - $pem1->reservasi->kamar['harga'], null, ',', '.') }}</dt>
							</dl>
							<dl class="row mb-0">
								<dd class="col-6">Kode Verifikasi</dd>					
								<dt class="col">{{ decrypt($pem1->kode_verifikasi) }}</dt>
							</dl>
						</div>
						<hr>
						<div class="form-row">
							@if($pem1->pin == null)
							<div class="col">
								@if($pem1->status == 'Lunas')
								{!! Form::open(['route' => ['dashboard.approve', $pem1->kode_booking]]) !!}
								<button type="submit" class="btn btn-primary btn-block">Approve</button>
								{!! Form::close() !!}
								@else
								{!! Form::open(['route' => ['dashboard.warn', $pem1->reservasi['id']]]) !!}
								<button class="btn btn-warning btn-block">Warn</button>
								{!! Form::close() !!}	
								@endif
							</div>
							@endif
							<div class="col">
								{!! Form::open(['route' => ['dashboard.reservasi.delete', $pem1->reservasi['id']], 'method' => 'DELETE']) !!}
								<button type="submit" class="btn btn-danger btn-block">Cancel Booking</button>
								{!! Form::close() !!}
							</div>					
						</div>
					</div>
					</div>
				</div>
				</div>
			@endforeach
		</div>
		@else
		<div class="jumbotron text-center">
			<h2>Tidak ada bookingan</h2>
		</div>
		@endif

	</div>
</div>
@endsection

@section('script')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    $('.card-header').on('click', function () {
      $(this)
        .find('[data-fa-i2svg]')
        .toggleClass('fa-caret-down')
        .toggleClass('fa-caret-up');
    });
  });
</script>
@endsection