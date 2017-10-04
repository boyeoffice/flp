<template>
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
					<span class="text-center"><h2> {{stastitics.posts}}</h2></span>
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
					<span class="text-center"><h2>{{stastitics.pages}}</h2></span>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="box box-danger">
					<div class="box-header with-border">
						<div class="box-title">Post View</div>
						<div class="box-tool pull-right">
							<button class="btn btn-sm btn-success">All</button>
						</div>
					</div>
					<div class="box-body">
					<span class="text-center"><h2>{{stastitics.postView}}</h2></span>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="box box-danger">
					<div class="box-header with-border">
						<div class="box-title">Page View</div>
						<div class="box-tool pull-right">
							<button class="btn btn-success btn-sm">All</button>
						</div>
					</div>
					<div class="box-body">
					<span class="text-center"><h2>{{stastitics.pageView}}</h2></span>
					</div>
				</div>
			</div>
		</div>
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
			axios.get('/api/admin/stastitics').then(response => {
				this.stastitics = response.data
			})
		}
	}
</script>