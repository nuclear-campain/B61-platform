<!DOCTYPE html>
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
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if (Request::is('admin*')) {{-- Authenticated user is admin section or has admin role --}}
                            @include('layouts.partials.navbar-admin')
                        @else {{-- Authenticated user is an normal user.  --}}
                            @include('layouts.partials.navbar-user')
                        @endif
                    </ul>

                    <ul class="navbar-nav ml-auto"> {{-- Right Side Of Navbar --}}
                        @guest {{-- Authentication Links --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="mr-1 fe fe-log-in"></i> {{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}"><i class="mr-1 fe fe-user-plus"></i> {{ __('Register') }}</a>
                                @endif
                            </li>
                        @else {{-- user is authenticated --}}
                            <li class="nav-item">
                                <a href="{{ route('notifications.index') }}" class="nav-link">
                                    <i class="fe fe-bell"></i>

                                    <span style="margin-top: -.25rem;" class="badge align-middle badge-pill badge-danger">
                                        {{ Auth::user()->unreadNotifications->count() }}
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->hasRole('admin') && ! Request::is('admin*'))
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            <i class="fe fe-home mr-1 text-secondary"></i> Admin panel
                                        </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('issue.report') }}">
                                        <i class="fe fe-alert-octagon mr-1 text-secondary"></i> Report bug
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('account.settings') }}">
                                        <i class="fe fe-sliders mr-1 text-secondary"></i> Settings
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fe fe-log-out mr-1 text-danger"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="{{ isset($py) ? $py : 'py-4' }}">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">
                <span class="text-muted">&copy; {{ config('app.name') }}</span>

                <div class="float-right">
                    <a href="" class="no-underline text-muted">Privacy</a>
                    <span class="text-muted">|</span>
                    <a href="" class="no-underline text-muted">Terms of Service</a>
                    <span class="text-muted">|</span>
                    <a target="_blank" href="https://github.com/Scouting-Compass/Compass.app" class="no-underline text-muted">Github</a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
