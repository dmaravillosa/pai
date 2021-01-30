<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Font Awesome 5 -->
    <script src="https://kit.fontawesome.com/e418ef6728.js" crossorigin="anonymous"></script>

    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        body {
            background-color: #f4f0ea;
        }

        .main {
            width: 50%;
            margin: 50px auto;
        }

        .form-group .form-control {
            padding-left: 2.375rem;
        }

        .form-group .form-control-icon {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <u><a class="nav-link text-dark" style="text-decoration: none;" href="{{ route('login') }}">{{ __('Login') }}</a></u>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <u><a href="{{ auth()->user()->role == 'Administrator' || auth()->user()->role == 'Principal' ? route('admin') : route('home') }}" a class="nav-link text-dark">Home</a></u>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <img width="250" src="{{ asset('pai-logo.png') }}">
                        
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <form action="/students/list" method="GET">
                                <div class="input-group">
                                    <span class="fas fa-user form-control-icon"></span>
                                    <input type="text" name="filter" class="form-control" style="border-radius: 50px;" placeholder="ex. Ramos, John C.">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary rounded ml-2"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </div>
        </main>

        <div class="footer mb-4">
            <a class="text-dark" href="https://www.facebook.com/papayaacademy" target="_blank">
            <i class="fab fa-facebook"></i> Papaya Academy Inc.</a>  
            &nbsp;&nbsp;&nbsp;&nbsp;

            <a class="text-dark" href="http://www.papaya-academy.magix.net/contact.htm" target="_blank">
            <i class="fab fa-chrome"></i> Papaya Academy Inc.</a>  
            &nbsp;&nbsp;&nbsp;&nbsp;

            <a target="_blank">
            <i class="far fa-envelope"></i> papayaacademy@yahoo.com</a>  
        </div>
    </div>
</body>
</html>
