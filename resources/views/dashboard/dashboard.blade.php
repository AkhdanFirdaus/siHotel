@extends('layouts.app')

@section('title', '| '. 'Dashboard')

@section('content')	
<div class="container-fluid">
	<div class="row">
	<div class="col-lg-3 text-center p-0 m-0">
		@include('partials.sidebar')
	</div>
	<div class="col-lg-9">
		@if(Request::is('dashboard'))		
		<div class="py-4">
			<h1>Dashboard</h3>
			<hr>
			<div class="row">
				<div class="col-lg-4">
					<div class="card border-0">
						<div class="card-body">							
							<div class="media">
								<i class="text-primary fas fa-book fa-4x mr-3"></i>
								<div class="media-body text-right">									
									<h4 class="mt-0 mb-1">Reservasi</h4>
									<h3><strong>{{ $reservasis->count() }}</strong></h3>
								</div>
							</div>
							<hr>
							<a href="{{ route('dashboard.reservasi') }}" class="text-light btn btn-info btn-block">Selengkapnya</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card border-0">
						<div class="card-body">
							<div class="media">
								<i class="text-primary fas fa-user-tie fa-4x mr-3"></i>
								<div class="media-body text-right">									
									<h4 class="mt-0 mb-1">Customer</h4>
									<h3><strong>{{ $guest->count() + $user->count()}}</strong></h3>
								</div>
							</div>
							<hr>
							<a class="text-light btn btn-info btn-block" href="{{ route('dashboard.manageUser') }}">Selengkapnya</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card border-0">
						<div class="card-body">
							<div class="media">
								<i class="text-primary fas fa-hotel fa-4x mr-3"></i>
								<div class="media-body text-right">									
									<h4 class="mt-0 mb-1">Hotel</h4>
									<h3><strong>{{ $hotels->count() }}</strong></h3>
								</div>								
							</div>
							<hr>
							<a class="text-light btn btn-info btn-block">Selengkapnya</a>
						</div>
					</div>
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="card border-0">
					<div class="card-body">
						<h2>{{ \Carbon\Carbon::now()->toFormattedDateString() }}</h2>
					</div>
				</div>
			</div>
		</div>		
		@else
		@yield('dashcontent')
		@endif
	</div>
</div>
</div>
{{-- @include('partials.footer') --}}
@endsection
