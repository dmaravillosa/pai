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
                            <span class="fas fa-search form-control-icon"></span>
                            <input type="text" class="form-control" style="border-radius: 50px;" placeholder="Student Name/Number">
                        </div>
                    </div>

                    <div class="col-md-10 mt-3 bg-white">
                        <div class="row m-2 justify-content-center">
                            <div class="col-md-3">
                                <a>Events</a>
                            </div>
                            <div class="col-md-3">
                                <a>About</a>
                            </div>
                            <div class="col-md-3">
                                <a>Contact Us</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
</body>
</html>
