@extends('layouts.app')

@section('styles')
<style type="text/css">
    .parallax {
        background: url(img/bg/pexels-photo-271639.jpeg) no-repeat;
        -webkit-background-size: cover;
        background-size: cover;
        height: 60vh;
    }
    .foto {
        background: url(img/bg/pexels-photo-271639.jpeg) no-repeat;
        -webkit-background-size: cover;
        background-size: cover;
        height: 60vh;     
    }
    .min-nav {
        font-size: 4em;
    }
    .konten {
        background: #FF416C;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #FF4B2B, #FF416C);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #FF4B2B, #FF416C); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    .more-info {
        background-color: #eee;
    }
    i.fas {
        font-size: 40px;
    }
    .nav-item {
        padding: 20px;
    }
    .konten .nav-link {
        font-size: 4em;    
        background-color: #fff;    
        border-radius: 2px;
        text-align: center;
    }
</style>
@endsection

@section('scripts')
{!! Html::script('scrollMagic/ScrollMagic.min.js') !!}
{!! Html::script('scrollMagic/plugins/animation.gsap.min.js') !!}
@endsection

@section('content')
<section class="text-center rounded-0 my-0">
    <h1>siHotel</h1>
    <p class="lead">Tempat istirahat kamu</p>
</section>
<section class="parallax text-center">
    <div class="container-fluid py-5 thumbnail">
        <h1 class="display-3">Welcome</h1>
    </div>
</section>
<section class="konten">
    <ul class="nav justify-content-center py-4">
        <li class="nav-item">
            <a class="nav-link active" href="#">
                <i class="fas fa-paper-plane"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-eye"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link disabled" href="#">
                <i class="fas fa-key"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-hotel"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-image"></i>
            </a>
        </li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="row p-5 foto" style="background-color: #ddd;">
                    <div class="col">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto pariatur amet, placeat? Perspiciatis laboriosam pariatur quas unde ab facilis nulla?
                    </div>                    
                </div>
                <div class="row p-5 capt-foto" style="background-color: #222; color: #fff;">
                    <div class="col">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, nulla perferendis aspernatur neque, totam modi eius. At error suscipit nulla.
                    </div>                    
                </div>
            </div>
            <div class="col-md-5 p-4" style="background-color: #fff;">
                @include("form.reserve")
            </div>
        </div>
    </div>
    <div class="container mt-4" style="color: #fff; font-weight: 600;">
        <div class="row text-center">
            <div class="col-md-4 py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum dolorum soluta doloremque deleniti, excepturi fugiat ut ex provident sunt libero!</div>
            <div class="col-md-4 py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum dolorum soluta doloremque deleniti, excepturi fugiat ut ex provident sunt libero!</div>
            <div class="col-md-4 py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum dolorum soluta doloremque deleniti, excepturi fugiat ut ex provident sunt libero!</div>
        </div>
    </div>
</section>
<section class="more-info">
    <div class="container">
        <div class="row">
            <div class="col-md-4 py-3">
                <div class="card rounded-0">
                    <img src="img/bg/pexels-photo-271639.jpeg" alt="" class="card-img-top rounded-0">
                    <div class="card-body">
                        <h5 class="card-title">Ini Judul</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae tenetur ipsum voluptate nulla blanditiis, dolore aliquam dolores, expedita dolorem voluptatibus!</p>
                        <hr>
                        <a href="" class="btn btn-success btn-block">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3">
                <div class="card rounded-0">
                    <img src="" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Ini Judul</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae tenetur ipsum voluptate nulla blanditiis, dolore aliquam dolores, expedita dolorem voluptatibus!</p>
                        <hr>
                        <a href="" class="btn btn-success btn-block">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3">
                <div class="card rounded-0">
                    <img src="" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Ini Judul</h5>
                        <p class="card-text text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae tenetur ipsum voluptate nulla blanditiis, dolore aliquam dolores, expedita dolorem voluptatibus!</p>
                        <hr>
                        <a href="" class="btn btn-success btn-block">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="p-4">
    <ul class="nav justify-content-center">
        <li class="nav-item"><a href="" class="nav-link">Test</a></li>
        <li class="nav-item"><a href="" class="nav-link">Test</a></li>
        <li class="nav-item"><a href="" class="nav-link">Test</a></li>
    </ul>
</footer>
@endsection

@section('script'){{-- 
<script type="text/javascript">
    var controller = new ScrollMagic.Controller();

    new ScrollMagic.Scene({
        triggerElement: ".parallax",
        triggerHook: "onLeave"
    })
    .setPin(".parallax")
    .addTo(controller);kb
</script> --}}
@endsection