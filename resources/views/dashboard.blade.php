<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="csrf-token" content="{{ csrf_token() }}">
 <script>
 	window.User = {!! json_encode(Auth::user())!!}
 	window.Url = "{{url('/')}}"
 </script>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/froala_editor.pkgd.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/froala_style.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/toastr.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/nprogress.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<style>
        [v-cloak] { display: none; }
       </style>
</head>
<body>
<div id="app"></div>
<script src="{{asset('js/dashboard.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>