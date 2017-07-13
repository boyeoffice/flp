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
							<vue-html5-editor :content="content" :height="500"></vue-html5-editor>
						</div>
					</div>
		    </section>
		</section>
	</section>
	</section>
</template>
<script>
	export default {
		
		data(){
			return{
	            form: [],
	            content: ''
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
			}
		}
	}
</script>