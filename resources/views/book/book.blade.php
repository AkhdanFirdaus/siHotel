@extends('layouts.app')

@section('styles')
{!! Html::style('css/wizard.css') !!}
<style type="text/css">
	html, body {
		overflow-x: hidden;
		height: 100%;
	}
	.bgkiri {
		position: relative;
		opacity: 0.8;
		background-attachment: fixed;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		color: #fff;
		font-weight: 600;
		background-image: url(img/bg/pexels-photo-453201.jpeg);
		height: 100%;
	}
	.kanan{
		overflow: auto;
	}
	.atas {
		height: 80vh;
		padding-top: 30%;	
	}
	.bawah {
		height: 20vh;		
	}
	.bawah a {
		font-size: 3.5em;
	}
	.kata {
		height: 50%;
		overflow: auto;
		margin: auto;
		position: absolute;
		top: 0; left: 0; bottom: 0; right: 0;
		padding: 50px;
	}/*
	.breadcrumb-item + .breadcrumb-item::before 
	{
	    font-family: 'fontAwesome';
	    content: "\f105" !important; 
	}*/


	@media(max-width: 768px) {
		.atas {
			height: 80vh;
			width: 50%;			
		}
		.bawah {
			height: 20vh;			
		}
		.bawah a {
			font-size: 3em;
		}
		.navbar {
			padding-top: 20px;
			padding-bottom: 20px;
			border-bottom: 2px solid #ddd;
		}		
	}
</style>
@endsection

@section('scripts')
{{ Html::script('js/jquery.steps.min.js') }}
@endsection

@section('kiri')	
	<div id="kiri" class="col-md-6 bgkiri">
			<div class="konten px-3 atas">
				<div class="kata">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam delectus accusantium nostrum, repellendus labore tenetur quod eum. Officia, ea nulla!
				</div>				
			</div>		
			<div class="d-flex align-content-end justify-content-end flex-wrap row bawah">
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