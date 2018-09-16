@extends('layouts.app')

@section('title', '| '. 'Dashboard')

@section('content')	
<div class="row">
	<div class="col-lg-3 p-0 text-center">
		<ul class="nav flex-column">
			<li class="nav-item bg-success p-3 text-light">
				<h3>siHotel</h3>					
			</li>
			<li class="nav-item jumbotron shadow">
				<h3>{{ Auth::user()->name }}</h3>						
				{{-- <p class="lead">{{ Auth::user()->roles['nama'] }}</p> --}}
			</li>
			<li class="nav-item">
				<a href="" class="nav-link">Dashboard</a>
			</li>
			<li class="nav-item">
				<a href="" class="nav-link">Hotel</a>
			</li>
			<li class="nav-item">
				<a href="" class="nav-link">Room</a>
			</li>
			<li class="nav-item">
				<a href="" class="nav-link">Guest</a>
			</li>
			<li class="nav-item">
				<a href="" class="nav-link">Feedback</a>
			</li>
		</ul>				
	</div>
	<div class="col-lg-9 p-0">
		<ul class="nav nav-fill text-light">
			<li class="nav-item p-2 bg-primary">
				<a href="" class="nav-link text-light">
					<h3><small>Lorem</small></h3>
				</a>
			</li>
			<li class="nav-item p-2 bg-primary">
				<a href="" class="nav-link text-light">
					<h3><small>Lorem</small></h3>
				</a>
			</li>
			<li class="nav-item p-2 bg-primary">
				<a href="" class="nav-link text-light">
					<h3><small>Lorem</small></h3>
				</a>
			</li>
			<li class="nav-item p-2 bg-primary">
				<a href="" class="nav-link text-light">
					<h3><small>Lorem</small></h3>
				</a>
			</li>
		</ul>
		<div class="container py-4">
			<div class="row px-4">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">							
							<div class="media">
								<i class="text-primary fas fa-book fa-4x mr-3"></i>
								<div class="media-body text-right">									
									<h4 class="mt-0 mb-1">Reservasi</h4>
									<h3><strong>{{ $reservasis->count() }}</strong></h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<i class="fas fa-book fa-2x pull-left"></i>
							Reservasi
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<i class="fas fa-book fa-2x pull-left"></i>
							Reservasi
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>
@endsection
