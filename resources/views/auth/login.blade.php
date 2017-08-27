<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Login | Zedhealthplus</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"> <!-- Font-Awesome-Icons-CSS -->
<link href="//fonts.googleapis.com/css?family=Muli:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
</head>
<body style="background: url('img/bg6.jpg');"> 
<div class="w3ls-header">
    <h1> Zedhealthplus</h1>
    <div class="header-main">
        <h2>login To Start Session </h2>
            <div class="header-bottom">
                <div class="header-right w3agile">
                    <div class="header-left-bottom agileinfo">
                        <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                            <div class="icon1{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" name="email" placeholder="Email@example.com" value="{{ old('email') }}" required=""/>
                            </div>
                            <div class="icon1{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" name="password" placeholder="Password" required=""/>
                            </div>
                            <div class="login-check">
                                 <label class="checkbox"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><i> </i> Keep me logged in</label>
                            </div>
                            <div class="bottom">
                                <input type="submit" value="Log in" />
                            </div>
                            <p><a href="{{ route('password.request') }}">Forgot Your Password?</a> </p>
                            <p><a href="{{ route('register') }}">Don't have an account?</a> </p>
                    </form> 
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="copyright">
    <p>© 2017 ZedHealthPlus. All rights reserved | Design by  <a href="http://boyeoffice.com/" target="_blank">  Boye Olakunle </a></p>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>