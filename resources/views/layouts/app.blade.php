<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Online Blood Donation Management System' }}</title>
    <link rel="stylesheet" href="{{ url('css/style.css')}}">
    <link rel="stylesheet" href="{{ url('css/obdms.css')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @guest
            <nav class="navbar navbar-expand-md navbar-light bg-danger text-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand text-white" href="{{ url('/') }}">
                        {{ 'Online Blood Donation Management System' }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        @endguest
    </div>
    @if (Auth::user())
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar" style="background-color: #E62242;">
                <div class="custom-menu">
                    <button type="button" id="sidebarCollapse" class="btn text-white"  style="background-color: #E62242;">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
                <div class="p-4 text-white">
                    <h1><a href="index.html" class="logo text-decoration-none">OBDMS <span class="text-white my-3">Obline Blood Donor Management System</span></a></h1>
                    <ul class="list-unstyled components mb-5">
                        <li class="active">
                            <a href="#"><span class="fa fa-home mr-3 text-white"></span> Home</a>
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-user mr-3 text-white"></span> About</a>
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-briefcase mr-3 text-white"></span> Works</a>
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-sticky-note mr-3 text-white"></span> Blog</a>
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-suitcase mr-3 text-white"></span> Gallery</a>
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-cogs mr-3 text-white"></span> Services</a>
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-paper-plane mr-3 text-white"></span> Contacts</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="fa fa-sign-out mr-3 text-white"></span>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    <a id="navbarDropdown" class="navbar-brand text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Welcome Dear {{ Auth::user()->name }}
                    </a>
                </div>
            </nav>

            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <nav class="navbar navbar-expand-md navbar-light bg-danger text-white shadow-sm" style="margin-top: -50px; width: 100%; margin-left: -28px" hidden>
                    <div class="container">
                        <a id="navbarDropdown" class="navbar-brand text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Welcome Dear {{ Auth::user()->name }}
                        </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                </li>
            </div>
        </div>
    @endif

    {{-- <script src="{{ url("js/bootstrap.bundle.js")}}"></script> --}}
    {{-- <script src="{{ url("js/bootstrap.min.js")}}"></script> --}}
    <script src="{{ url("js/custom.js")}}"></script>
    <script src="{{ url("js/jquery.min.js")}}"></script>
    <script src="{{ url("js/main.js")}}"></script>

</body>
</html>
