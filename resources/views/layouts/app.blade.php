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
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        @else

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <form action="logout" method="POST">
                                @csrf

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Logout') }}
                                </button>
                            </form>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

{{--    <div align="center">--}}
{{--        <div id=area>--}}

{{--            Something--}}

{{--        </div>--}}


{{--        <buttons-body>--}}

{{--            <button id="good" type="button" class="add-good">Add Good</button>--}}

{{--            <button id="bad" type="button" class="add-bad">Add Bad</button>--}}

{{--            <button id="cancel" type="button" class="cancel">Cancel</button>--}}

{{--        </buttons-body>--}}

{{--    </div>--}}


{{--<script>--}}


{{--    (function () {--}}

{{--        const body = document.querySelector('buttons-body');--}}

{{--        body.addEventListener('click', function (e) {--}}

{{--            if (e.target.matches('.add-good')) {--}}
{{--                addSomethingToTemplate('Good');--}}
{{--            }--}}

{{--            else if (e.target.matches('.add-bad')) {--}}
{{--                addSomethingToTemplate('Bad');--}}
{{--            }--}}

{{--            else {--}}
{{--                addSomethingToTemplate('Something');--}}
{{--            }--}}
{{--        });--}}


{{--        function addSomethingToTemplate (text) {--}}
{{--            template = document.getElementById('area');--}}
{{--            template.innerHTML = text;--}}
{{--        }--}}


{{--    })();--}}
{{--</script>--}}





</body>
</html>
