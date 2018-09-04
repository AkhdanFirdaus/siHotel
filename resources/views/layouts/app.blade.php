<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'siHotel') }} @yield('title')</title>    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{ Html::style('css/app.css') }}
    {{ Html::style('css/custom.css') }}
    @yield('styles')

    <!-- Scripts -->
    {{ Html::script('js/app.js')}}
    {{ Html::script('fontAwesome5.2/js/all.min.js')}}    
    @yield('scripts')
</head>
<body>
    <div id="app" class="row">
        @yield('kiri')
        <main class="col">
            @include('partials.navbar')        
            @yield('content')
        </main>
    </div>
    
    <!-- Scripts -->
    @yield('script')
</body>
</html>
