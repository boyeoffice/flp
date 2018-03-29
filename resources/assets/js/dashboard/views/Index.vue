<template>
	<section>
	<section class="content-header">
		<h1>Dashboard <small>Control panel</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>{{stastitics.posts}}</h3>
						<p>Posts</p>
					</div>
					<div class="icon">
						<i class="fa fa-file-text-o"></i>
					</div>
					<a href="#" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-green">
					<div class="inner">
						<h3>{{stastitics.pages}}</h3>
						<p>Pages</p>
					</div>
					<div class="icon">
						<i class="fa fa-file"></i>
					</div>
					<a href="#" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3>{{stastitics.pages}}</h3>
						<p>Users</p>
					</div>
					<div class="icon">
						<i class="fa fa-user-plus"></i>
					</div>
					<a href="#" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-red">
					<div class="inner">
						<h3>{{stastitics.visitors}}</h3>
						<p>Unique Visitors</p>
					</div>
					<div class="icon">
						<i class="fa fa-pie-chart"></i>
					</div>
					<a href="#" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</section>
	</section>
</template>
<script>
	export default {
		data(){
			return{
				stastitics: []
			}
		},
		mounted(){
			axios.get('/api/stastitics').then(response => {
				this.stastitics = response.data
			})
		}
	}
</script>