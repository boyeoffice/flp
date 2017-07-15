<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script>
    window.Url = "{{url('/')}}"
    </script>

   <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body style="">
    <div id="app">
<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="#">
                        HealthVille
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                    <li><img class="img img-circle" src="{{asset('avatars/'. Auth::user()->avatar)}}" width="40" height="40"></li>
                     <li class="top-li">{{ Auth::user()->username }}</li>
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><i class="glyphicon glyphicon-bell"></i></span></a> </li>
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span><i class="glyphicon glyphicon-globe"></i></span> </a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <span><i class="glyphicon glyphicon-log-out"></i></span> Logout
                                        </a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
        <ul class="nav nav-pills nav-justified">
              <li role="presentation" class="active"><a href="{{url('dashboard')}}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
              <li role="presentation"><a href='{{url('dashboard/pages')}}'><i class="glyphicon glyphicon-th-large"></i>  Pages</a>
              </li>
              <li role="presentation"><a href="#">Messages</a></li>
              <li role="presentation" class="active"><a href="#">Home</a></li>
              <li role="presentation"><a href="#">Profile</a></li>
              <li role="presentation"><a href="#">Messages</a></li>
        </ul>
        </div>

        @yield('content')
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    @yield('script')
   
</body>
</html>
