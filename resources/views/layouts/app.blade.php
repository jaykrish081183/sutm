<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'માતાજીની પધરામણી') }} - @yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @vite('resources/js/app.js')
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugin.css')}}">
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/daterangepicker.css')}}">
</head>
<body >
    <div id="app">
        <header>
            <div class="logo">
                <a href="{{route('home')}}">
                    <img src="{{asset('assets/img/logo-umiya.png')}}" alt="" height="70px" width="150px">
                </a>
            </div>
            <div class="contact-info">
                <a href="{{route('admin.login')}}">Login</a>
                <a href="https://www.facebook.com/sutmelb/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/Sutmelb" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <div>
                <p>© 2024 All rights reserved by Umiyamataji.</p>
                <p>Contact us: <a href="mailto:info@sutm.org.au" style="color:blue">info@sutm.org.au</a> | Phone: 043-231-3214 <a href="https://www.facebook.com/sutmelb/" target="_blank" style="margin-left:20px;font-size: 20px"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/Sutmelb" target="_blank" style="margin-left:20px;font-size: 20px"><i class="fab fa-instagram"></i></a></p>
                    <p>Designed &amp; Developed By:
                        <span style="color:black">Jayesh Patel</span>
                        (<a href="mailto:jaykrish081183@gmail.com" target="_blank" style="color:blue">jaykrish081183@gmail.com</a>)
                    </p>
            </div>
        </footer>
    </div>
    @yield('script')
    <script src="{{asset('assets/js/jquery-3.5.1.slim.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/daterangepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
