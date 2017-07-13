@extends('layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/summernote.css') }}">

@endsection

@section('content')
<div class="content">
	<section class="container">
			<div class="row">
			<form action="{{url('home/page/'. $page->id)}}" method="POST">
			 {{ csrf_field() }}
				<div class="col-md-9">
					<div class="box box-danger">
						<div class="box-header with-border">
							<div class="box-title">Edit Page</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<input type="text" name="title" class="form-control" placeholder="Page Title" value="{{$page->title}}">
							</div>
							<div class="form-group">
								<textarea id="summernote" name="content" class="form-control" value="">{{$page->content}}</textarea>
							</div>
						</div>
					</div>
				</div><!--/col-md-9-->
				<div class="col-md-3">
					<div class="box box-danger">
						<div class="box-header with-border">
							<div class="box-title">Publish</div>
						</div>
						<div class="box-body">
							<button type="submit" class="btn btn-primary">Publish</button>
							<button class="pull-right btn btn-default">Preview</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</section>
</div>
@endsection

@section('script')
<script src={{ asset('js/summernote.min.js') }}></script>
 <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
              height:300,
            });
        });
    </script>
@endsection