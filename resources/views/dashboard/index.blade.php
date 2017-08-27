@extends('layouts.app')
@section('title')
Dashboard
@endsection

@section('content')
<section class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="box box-danger">
					<div class="box-header with-border">
						<div class="box-title">Posts</div>
						<div class="box-tool pull-right">
							<button class="btn btn-success btn-sm">All</button>
						</div>
					</div>
					<div class="box-body">
					<span class="text-center"><h2> {{$posts}}</h2></span>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="box box-danger">
					<div class="box-header with-border">
						<div class="box-title">Pages</div>
						<div class="box-tool pull-right">
							<button class="btn btn-success btn-sm">All</button>
						</div>
					</div>
					<div class="box-body">
					<span class="text-center"><h2>{{$pages}}</h2></span>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="box box-danger">
					<div class="box-header with-border">
						<div class="box-title">Blog</div>
						<div class="box-tool pull-right">
							<button class="btn btn-sm btn-success">All</button>
						</div>
					</div>
					<div class="box-body">
					<span class="text-center"><h2>0</h2></span>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="box box-danger">
					<div class="box-header with-border">
						<div class="box-title">Visitors</div>
						<div class="box-tool pull-right">
							<button class="btn btn-success btn-sm">All</button>
						</div>
					</div>
					<div class="box-body">
					<span class="text-center"><h2>0</h2></span>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

