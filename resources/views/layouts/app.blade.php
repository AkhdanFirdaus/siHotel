<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>siHotel @yield('title')</title>    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{ Html::style('css/app.css') }}
    {{ Html::style('css/custom.css') }}
    {{ Html::style('css/responsive.css') }}
    @yield('styles')

    <!-- Scripts -->
    {{ Html::script('js/app.js')}}
    {{ Html::script('fontAwesome5.3/js/all.min.js')}}    
    @yield('scripts')
</head>
<body>
    @if(!Request::is('/'))
        <div class="backBtn fixed-bottom">
            <button onclick="history.go(-1)" class="btn btn-link rounded-circle"><span><i class="fas fa-arrow-left fa-2x"></i></span></button>
        </div>
    @endif    
    @yield('content')
    
    <!-- Scripts -->
    @yield('script')
</body>
</html>
