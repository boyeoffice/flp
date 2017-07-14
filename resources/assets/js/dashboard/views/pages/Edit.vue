<template>
	<section class="container">
		<section class="row">
		<section class="col-md-9">
			<section class="box box-danger">
					<div class="box-header with-border">Edit Page</div>
					<div class="box-body">
						<div class="form-group">
							<input type="text" v-model="form.title" class="form-control">
						</div>
						<div class="form-group">
							<textarea class="form-control" v-model="form.content" rows="20"></textarea>
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
					<button class="btn btn-primary" @click="save">Publish</button>
				</div>
			</div>
		</section>
	</section>
	</section>
</template>
<script>
	export default {
		data(){
			return{
				content: '',
	            form: []
			}
		},
		mounted(){
			this.fetchData()
		},
		methods:{
			fetchData(){
				axios.get('/api/backend/pages/' + this.$route.params.id + '/edit').then(response => {
					this.form = response.data
				})
			},
			save(){
				axios.put('/api/backend/pages/' + this.form.id, this.form).then(response => {
					if(response.data.success){
						window.location.reload('dashboard/pages')
					}
				})
			}
		}
	}
</script>