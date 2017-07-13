<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        
        <link rel="stylesheet" type="text/css" href="{{asset('public/css/bootstrap.min.css')}}">
    <body style="background: url('public/img/bg.png');">
    
    <div id="app"></div>
   
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    </body>
</html>
