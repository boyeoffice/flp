<template>
	<section>
		<section class="container">
		   <div class="box box-danger">
		   	<div class="box-header with-border">
		   		<div class="box-title">Pages</div>
		   		<div class="box-tools pull-right">
		   		<router-link to="/dashboard/pages/create" class="btn btn-success btn-sm">Create</router-link></div>
		   			</div>
		   		<div class="box-body">
		   			<table class="table table-bordered">
		   				<thead>
		   					<tr>
		   						<th v-for="th in theads">{{th.label}}</th>
		   					</tr>
		   				</thead>
		   				<tbody>
		   					<tr v-for="page in model">
								<td>{{page.title}}</td>
								<td>0</td>
								<td>{{url}}/health/{{page.slug}}</td>
								<td>{{page.created_at}}</td>
								<td>
									<a :href="url + '/health/' + page.slug" class="btn btn-info btn-sm" title="View"><i class="glyphicon glyphicon-eye-open"></i></a>
									<router-link :to="'/dashboard/pages/' + page.id + '/edit'" class="btn btn-primary btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i> </router-link>
									<a href="#" class="btn btn-danger btn-sm" title="Delete"> <i class="glyphicon glyphicon-trash"></i></a>
								</td>
							</tr>
		   				</tbody>
		   			</table>
		   		</div>
		   </div>
		</section>
	</section>
</template>
<script>
	export default {
		data(){
			return{
				model: [],
				url: window.Url,
				theads:[
				{label: 'Title'},
				{label: 'Views'},
				{label: 'Link'},
				{label: 'Date'},
				{label: 'Action'}
				]
			}
		},
		mounted(){
			this.fetchData()
		},
		methods: {
			fetchData(){
				axios.get('/api/pages').then(response => {
					this.model = response.data
				})
			}
		}
	}
</script>