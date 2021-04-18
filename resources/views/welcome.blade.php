<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Animal Sanctuary') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/customStyles.css') }}" rel="stylesheet">
    </head>
    <body class="bg-light-blue">
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-blue shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Animal Sanctuary
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @if (Route::has('login'))
                                <div>
                                    @auth
                                        <a href="{{ url('/home') }}" class="btn btn-yellow">Home</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-yellow">Log in</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 btn btn-yellow">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <h1 class="centre">Animal Sanctuary</h1>
                <h2 class="centre">Welcome to the animal sanctuary.</h2>
                <img style="display: block; margin-left: auto; margin-right: auto; width: 35%;"src="{{ asset('assets/welcome.png') }}" alt="welcome.png" />   
                <br />
                <h4 style="margin: 0px 60px;">After registering you will be able to view all the available animals for adoption.
                    You can view information about the animal, such as their name and a description.
                    You will then be able to request an animal for adoption. Your adoption request will be
                    checked by a staff member, after which it will be accepted or denied.
                </h4>       
            </main>
        </div>
    </body>
</html>
