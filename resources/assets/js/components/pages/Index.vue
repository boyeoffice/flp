<template>
	<section>
		<section class="container">
		   <div class="box box-danger">
		   	<div class="box-header with-border">
		   		<div class="box-title">Pages</div>
		   		<div class="box-tools pull-right">
		   		<a :href="'/dashboard/pages/create'" class="btn btn-success btn-sm">Create</a></div>
		   			</div>
		   		<div class="box-body">
		   			<table class="table table-bordered">
		   				<thead>
		   					<tr>
		   						<th v-for="th in theads">{{th.label}}</th>
		   					</tr>
		   				</thead>
		   				<tbody>
		   					<page-viewer v-for="page in model" :page="page" :key="page.id"></page-viewer>
		   				</tbody>
		   			</table>
		   		</div>
		   </div>
		</section>
	</section>
</template>
<script>
import PageViewer from './PageViewer.vue'
	export default {
		components: { PageViewer },
		data(){
			return{
				model: [],
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