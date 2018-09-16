@extends('layouts.app')

@section('styles')
{!! Html::style('/css/bookstyle.css') !!}
@endsection

@section('kiri')	
	<div id="kiri" class="col-md-6 bgkiri">
			<div class="konten px-3 atas">
				<div class="kata">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam delectus accusantium nostrum, repellendus labore tenetur quod eum. Officia, ea nulla!
					<div class="my-5">
						@include('partials.message')
					</div>
				</div>				
			</div>		
			<div class="d-flex align-content-end justify-content-end flex-wrap row bawah">
				<a href="{{ route('home') }}" class="btn btn-success rounded-0 p-4 col" style="color: #fff;"><i class="fas fa-arrow-left"></i></a>
				<a class="btn btn-success rounded-0 p-4 col" style="color: #fff;"><i class="fas fa-eye"></i></a>
				<a class="btn btn-success rounded-0 p-4 col" style="color: #fff;"><i class="fas fa-book"></i></a>
			</div>			
	</div>
@endsection

@section('content')
	<div class="container p-4 kanan">		
		@include('form.reserve')
	</div>
@endsection