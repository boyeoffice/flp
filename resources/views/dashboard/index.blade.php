<!DOCTYPE html>
<html>
<head>
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <script>
 	window.User = {!! json_encode(Auth::user())!!}
 </script>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/dashboard.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
	 <style>
        [v-cloak] { display: none; }
       </style>
</head>
<body>
<div id="app"></div>
<script src={{asset('dashboard/js/dashboard.js')}}></script>
<script src={{asset('js/bootstrap.min.js')}}></script>
</body>
</html>