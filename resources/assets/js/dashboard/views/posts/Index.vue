<template>
	<section class="container">
	<div  v-if="loading" class="box box-danger">
				<div class="text-center loading">
					<i class="fa fa-repeat fa-spin"></i>
				</div>
	</div>
		
			<div v-if="!loading" class="box box-danger">
				<div class="box-header with-border">
					<div class="box-title">Posts</div>
					<div class="box-tools pull-left"><a :href="'/api/posts/create'" class="btn btn-success btn-sm">Create new post</a></div>
				</div>
				<div class="box-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th v-for="th in theads">{{th.label}}</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="post in posts">
								<td>{{post.title}}</td>
								<td>{{url}}/{{post.slug}}</td>
								<td>{{post.view_count}}</td>
								<td v-if="post.status == 1">Active</td>
								<td>{{post.created_at}}</td>
								<td><a class="btn btn-info btn-sm" :href="'/' + post.slug">View</a></td>
								<td><a class="btn btn-default btn-sm" :href="'/api/posts/' + post.id + '/edit'">Edit</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
	</section>
</template>
<script>
	export default {
		data(){
			return{
				loading: true,
				url: window.Url,
				theads:[
				{label: 'Title'},
				{label: 'Link'},
				{label: 'Views'},
				{label: 'Status'},
				{label: 'Date'},
				{label: 'Action'}
				],
				posts: []
			}
		},
		mounted(){
			this.fetchData()
		},
		methods: {
			fetchData(){
				axios.get('/api/posts').then(response => {
					this.posts = response.data
					this.loading = false
				})
			}
		}
	}
</script>