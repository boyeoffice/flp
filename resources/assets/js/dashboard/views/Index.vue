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
						<div class="box-title">Blog</div>
						<div class="box-tool pull-right">
							<button class="btn btn-sm btn-success">All</button>
						</div>
					</div>
					<div class="box-body">
					<span class="text-center"><h2>{{stastitics.categories}}</h2></span>
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
					<span class="text-center"><h2>{{stastitics.visitors}}</h2></span>
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
			axios.get('/api/stastitics').then(response => {
				this.stastitics = response.data
			})
		}
	}
</script>