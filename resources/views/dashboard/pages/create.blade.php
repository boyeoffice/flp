@extends('layouts.app')
@section('title')
Create Page
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('editor/styles/simditor.css')}}">
@endsection
@section('content')
<section class="content">
<section class="container">
		<section class="row">
		<form action="{{route('pages.store')}}" method="post">
		 {{ csrf_field() }}
		<section class="col-md-9">
			<section class="box box-danger">
					<div class="box-header with-border">Edit Page</div>
					<div class="box-body">
						<div class="form-group">
							<input type="text" name="title" class="form-control">
						</div>
						<div class="form-group">
							<textarea id="txt-content" name="content" rows="18" class="form-control"></textarea> 
						</div>
					</div>
		    </section>
		</section>
		<section class="col-md-3">
			<div class="box box-danger">
				<div class="box-header with-border">
					Publish
				</div>
				<div class="box-body">
					<button type="submit" class="btn btn-primary">Publish</button>
				</div>
			</div>
		</section>
		</form>
	</section>
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