<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Online Blood Donation Management System' }}</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ url('css/obdms.css')}}">
    <link rel="stylesheet" href="{{ url('css/style.css')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

</head>
<body>
    @guest
        <div id="app">
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
        </div>
    @endguest

    @if (Auth::user())
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar" class="bg-danger">
                <div class="custom-menu">
                    <button type="button" id="sidebarCollapse" class="btn text-white bg-danger">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
                <div class="p-4 text-white">
                    <h1><a href="{{ url('home') }}" class="logo text-decoration-none">{{"OBDMS"}} <span class="text-white my-3">{{'Obline Blood Donor Management System'}}</span></a></h1>
                    <ul class="list-unstyled components mb-5">
                        <li class="active">
                            <a href="{{ url('home') }}"><span class="fa fa-home mr-3 text-white"></span> {{'Home'}}</a>
                        </li>
                        <li>
                            <a href="{{ url('donar/index') }}"><span class="fa fa-user mr-3 text-white"></span> {{'Donars'}}</a>
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-h-square mr-3 text-white"></span> {{'Hospitals'}}</a>
                        </li>
                        <li>
                            <a href="{{ url('blood/') }}"><span class="fa fa-paper-plane mr-3 text-white"></span> {{__('Blood')}}</a>
                        </li>
                        <li>
                            <a href="{{ url('roles/') }}"><span class="fa fa-paper-plane mr-3 text-white"></span> {{__('Roles')}}</a>
                        </li>
                        <li>
                            <a href="{{ url('news/') }}"><span class="fa fa-newspaper-o mr-3 text-white"></span> {{__('News & Update')}}</a>
                        </li>
                        <li>
                            <a href="{{ url('contact-messages/') }}"><span class="fa fa-envelope-o mr-3 text-white"></span> {{__('Messages')}}</a>
                        </li>
                        <li>
                            <a href="{{ url('residence-locations/') }}"><span class="fa fa-globe mr-3 text-white"></span> {{__('Residence')}}</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="fa fa-sign-out mr-3 text-white"></span>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <a id="navbarDropdown" class="navbar-brand text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{' Welcome Dear'}} <br> {{ Auth::user()->name }}
                        </a>
                    </ul>
                </div>
            </nav>

            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <nav class="navbar navbar-expand-md navbar-light bg-danger text-white shadow-sm" style="margin-top: -50px; width: 100%; margin-left: -28px" hidden>
                    <div class="container">
                        <a id="navbarDropdown" class="navbar-brand text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Welcome Dear {{ Auth::user()->name }}
                        </a>
                    </div>
                </nav>
                @yield('content')
            </div>
        </div>
    @endif


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ url("js/custom.js")}}"></script>
    <script src="{{ url("js/jquery.min.js")}}"></script>
    <script src="{{ url("js/main.js")}}"></script>
    <script src="{{ url("js/compressedJQuery.js")}}"></script>


    <script src="{{ url("js/bootstrap.bundle.js")}}"></script>
    <script src="{{ url("js/bootstrap.min.js")}}"></script>
    <script src="{{ url("js/bootstrap.min.js")}}"></script>
    <script src="{{ url("js/bootstrap.js")}}"></script>
</body>
</html>
