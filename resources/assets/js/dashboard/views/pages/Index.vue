<template>
	<section>
		<section class="container">
		   <div class="box box-danger">
		   	<div class="box-header with-border">
		   		<div class="box-title">Pages</div>
		   		<div class="box-tools pull-right">
                  <div class="row" v-if="formPage"><div class="col-md-12"> <div class="input-group">
                   <input type="text" class="form-control" v-model="form.title">
				      <div class="input-group-btn">
				        <button type="button" class="btn btn-default btn-sm" @click="createPage">Create</button></div>
				        <!-- /btn-group -->
				    </div><!-- /input-group -->
				  </div><!-- /.col-lg-6 -->
				  </div>
		   		<a href="#" class="btn btn-success btn-sm" v-if="!formPage" @click="getForm">Ceate</a></div>
		   			</div>
		   		<div class="box-body">
		   			<table class="table table-bordered">
		   				<thead>
		   					<tr>
		   						<th v-for="th in theads">{{th.label}}</th>
		   					</tr>
		   				</thead>
		   				<tbody>
		   					<page-viewer v-for="page in model" :page="page" :key="page"></page-viewer>
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
				{label: 'Created By'},
				{label: 'Date'},
				{label: 'Action'}
				],
				formPage: false,
				form: {
					title: ''
				}
			}
		},
		mounted(){
			this.fetchData()
		},
		methods: {
			getForm(){
				this.formPage = true
			},
			createPage(){
				axios.post('/api/backend/pages', this.form).then(response => {
					if(response.data.success) {
						window.location.reload()
					}
				})
			},
			fetchData(){
				axios.get('/api/backend/pages').then(response => {
					this.model = response.data
				})
			}
		}
	}
</script>