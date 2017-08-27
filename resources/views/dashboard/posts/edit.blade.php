@extends('layouts.app')
@section('title')
{{$post->title}}
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('editor/styles/simditor.css')}}">
@endsection
@section('content')
<section class="content">
	<section class="container">
		<div class="row">
		<form action="{{route('posts.update', $post->id)}}" method="POST">
		{{method_field('PUT')}}
		{{ csrf_field() }}
			<div class="col-md-9">
				<div class="box box-danger">
					<div class="box-header with-border">
						<div class="box-title">Create Post</div>
					</div>
					<div class="box-body">
						<div class="form-group">
								<input type="text" name="title" value="{{$post->title}}" class="form-control">
							</div>
					<textarea class="form-control" id="txt-content" name="content">{!! $post->content !!}</textarea>
						
					</div>
				  </div>
			</div>
			<div class="col-md-3">
				<div class="box box-danger">
					<div class="box-header with-border">
						<div class="box-title">Publish</div>
					</div>
					<div class="box-body">
						<button type="submit" class="btn btn-primary">Publish</button>
					</div>
				</div>
			</div>
			</form>
		</div>
</section>
</section>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('editor/scripts/module.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/scripts/hotkeys.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/scripts/uploader.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/scripts/simditor.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/mobilecheck.js')}}"></script>
<script type="text/javascript">
        if(mobilecheck()){
            $('<link/>', {
                media: 'all',
                rel: 'stylesheet',
                type: 'text/css',
                href: 'assets/styles/mobile.css'
            }).appendTo('head')
        }
    </script>
<script type="text/javascript" src="{{asset('editor/editor.js')}}"></script>
@endsection