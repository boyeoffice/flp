<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<title> {{ $key->title }} </title>
</head>
<body>
   <div class="container">
   	<div class="row">
   		<div class="col-md-8 col-md-offset-2">
   			<div class="panel panel-default">
   			<div class="panel-body"> 
   			{!! $key->content !!}
   		</div>
   		</div>
   		</div>
   	</div>
   </div>
</body>
</html>