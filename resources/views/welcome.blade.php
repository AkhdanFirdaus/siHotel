@extends('layouts.app')

@section('content')
<header>
    <div class="container">
        <div class="row">
            <div class="header-wrapper warna-oren offset-md-1 col-md-10">
                @include('partials.navbar')
            </div>
        </div>
    </div>
</header>

<section class="intro-section">
    <div class="container-fluid">
        <div class="offset-md-1 offset-lg-2 col-md-10 col-lg-8 intro">
            <div class="form-offset jumbotron shadow">
                <div class="heading">
                    <i class="fas fa-search fa-pull-left fa-2x" data-fa-transform="shrink-5 down-1.2 right-1" data-fa-mask="fas fa-circle" style="margin-top: 3px; color: #FFA804;"></i>
                    <h2>Cari Hotelmu</h2>
                </div>                
                <hr>
                {!! Form::open(['route' => "book.search", "method" => "POST"]) !!}
                @include('form.reserve')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

@include('partials.message')

<section class="about-section mt-5 p-4 border-bottom warna-oren text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-hands-helping fa-4x" data-fa-transform="shrink-2 down-1" data-fa-mask="fas fa-circle" style="color: #E91E63;"></i>
                        <h5 class=" mt-3 card-title">Terpercaya</h5>
                        <p class="card-text px-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="card-link" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">Cek Status Bookingmu</a>
                    </div>
                </div>
            </div>        
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-hand-holding-usd fa-4x" data-fa-transform="shrink-6" data-fa-mask="fas fa-circle" style="color: #009688;"></i>
                        <h5 class="mt-3 card-title">Harga Terjangkau</h5>                    
                        <p class="card-text px-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2" class="card-link">Lihat Rekomendasi</a>
                    </div>
                </div>
            </div>        
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-comments fa-4x" data-fa-transform="shrink-7" data-fa-mask="fas fa-circle" style="color: #FFC107;"></i>
                        <h5 class="mt-3 card-title">Real Time Review</h5>                    
                        <p class="card-text px-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="card-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Lihat Review</a>
                    </div>
                </div>
            </div>        
        </div>  
    </div>
</section>

@include('partials.welcomeCollapse')

<section class="form-section my-5">
    <div class="container">
        <div class="text-center">
            <h2>Drop Us a Message</h2>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                @include('form.email')
            </div>
        </div>
    </div>
</section>

@include('partials.footer')
@endsection