<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/froala_editor.pkgd.min.css')}}">
       <link rel="stylesheet" type="text/css" href="{{asset('/css/froala_style.min.css')}}">
	<title> {{ $key->title }} </title>
</head>
<body>
   <div class="container">
   	<div class="row">
   		<div class="col-md-8 col-md-offset-2">
   			<div class="panel panel-default">
   			<div id="health" class="panel-body fr-view"> 
   			{!! $key->content !!}
   		</div>
   		</div>
   		</div>
   	</div>
   </div>
   <script src="{{asset('js/jquery.min.js')}}"></script>
   <script type="text/javascript">
     $(function(){
    $('#health img').addClass('img img-responsive');
});
   </script>
</body>
</html>