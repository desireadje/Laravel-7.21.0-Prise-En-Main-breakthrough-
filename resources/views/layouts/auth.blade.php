<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('static/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('static/css/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('static/css/font-awesome.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

    <link href="{{ asset('static/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('static/css/pages/signin.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

	<div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <a class="brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="icon-user"></i> {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="icon-edit"></i> {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item {{ isset($user_nav) ? $user_nav : '' }}">
                                <a class="nav-link" href="{{ Route('admin.users.index') }}">Utilisateurs <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Roles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Disabled</a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-user"></i> {{ Auth::user()->name }} <b class="caret"></b>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                </ul>
                            </li>
                        @endguest
                    </ul><!-- nav pull-right -->
                </div><!--/.nav-collapse -->
            </div> <!-- /container -->
        </div> <!-- /navbar-inner -->

    </div> <!-- /navbar -->

    @yield('auth_content')

    <script src="{{ asset('static/js/jquery-1.7.2.min.js') }}"></script>
    <script src="{{ asset('static/js/bootstrap.js') }}"></script>
    <script src="{{ asset('static/js/signin.js') }}"></script>

</body>

</html>
