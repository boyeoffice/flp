<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Zedhealthplus</title>
     <style>
        [v-cloak] { display: none; }
       </style>
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
                        Zedhealthplus
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
                                @if(Auth::user()->is_admin == 1)
                                  <li>
                                      <a href="{{url('admin/home')}}"><span class="glyphicon glyphicon-log-out">Administrator</span> </a>
                                  </li>
                                  @endif
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
              <li role="presentation" class="@if(Request::is('dashboard')) active @endif"><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li role="presentation" class="@if(Request::is('dashboard/posts')) active @endif"><a href='{{url('dashboard/posts')}}'><i class="fa fa-sticky-note"></i>  Posts</a></li>
             <li role="presentation" class="@if(Request::is('dashboard/pages')) active @endif"><a href='{{url('dashboard/pages')}}'><i class="glyphicon glyphicon-th-large"></i>  Pages</a></li>
              <li role="presentation"><a href='{{url('dashboard/blog')}}'><i class="fa fa-sticky-note-o"></i>  Blog</a></li>
             <li role="presentation"><a href='{{url('dashboard/profile')}}'><i class="fa fa-user"></i>  Profile</a></li>
        </ul>
        </div>
        <div class="content">
        @yield('content')
        </div>
        </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
    @yield('script')
   
</body>
</html>
