<!DOCTYPE HTML>
<html lang="en">
<head>
<title>HealthVille Login</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link href="//fonts.googleapis.com/css?family=Muli:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
<style type="text/css">
    .has-error {
        border: 1px solid #d41414;
    }
    .header-main::after {
                    content: '';
                    position: absolute;
                    top: 0;
                    right: 0;
                    width: 0;
                    height: 0;
                    border-top: 100px solid #3be8b0;
                    border-right: 0px solid transparent;
                    border-left: 340px solid transparent;
                    z-index: -1;
       }
       .header-main::before {
                            content: '';
                            position: absolute;
                            top: 0px;
                            left: 0px;
                            width: 0;
                            height: 0;
                            border-top: 100px solid #ff4f81;
                            border-right: 322px solid transparent;
                            border-left: 0px solid transparent;
                 }
                 .header-main {
                            padding: 5em 4em 2.5em;
                            margin: 0 auto;
                            background: rgba(0, 0, 0, 0.56);
                            background: #fff;
                            text-align: center;
                            position: relative;
                            z-index: 999;
             }
             .header-left-bottom input[type="text"] {
                                            outline: none;
                                            font-size: 15px;
                                            color: #000;
                                            border: none;
                                            width: 90%;
                                            display: inline-block;
                                            background: transparent;
                                            font-family: 'Muli', sans-serif;
                                            text-align: center;
                                            letter-spacing: 2px;
                             }
</style>
</head>
<body style="background: url('img/bg6.jpg');"> 
<div class="w3ls-header">
    <h1> HealthVille</h1>
    <div class="header-main">
            <div class="header-bottom">
                <div class="header-right w3agile">
                    <div class="header-left-bottom agileinfo">
                        <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="icon1{{ $errors->has('username') ? ' has-error' : '' }}">
                                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required=""/>
                            </div>
                        <div class="icon1{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required=""/>
                            </div>
                            <div class="icon1{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" name="email" placeholder="Email@example.com" value="{{ old('email') }}" required=""/>
                            </div>
                            <div class="icon1{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" name="password" placeholder="Password" required=""/>
                            </div>
                            <div class="icon1{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input id="password" type="password" name="password_confirmation" placeholder="Repeat Password" required=""/>
                            </div>
                            <div class="bottom">
                                <input type="submit" value="Register" />
                            </div>
                    </form> 
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="copyright">
    <p>© 2017 HealthVille. All rights reserved | Design by  <a href="http://boyeoffice.com/" target="_blank">  Boye Olakunle </a></p>
</div>
</body>
</html>