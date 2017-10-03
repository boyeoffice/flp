<template>
	<section class="content">
	<section class="container">
		<div class="row">
		<form  @submit.prevent="save">
			<div class="col-md-9">
				<div class="box box-danger">
					<div class="box-header with-border">
						<div class="box-title">Create Page</div>
					</div>
					<div class="box-body">
						<div class="form-group">
								<input type="text" v-model="form.title" class="form-control">
							</div>
					<froala :tag="'textarea'" :config="config" v-model="form.content"></froala>
						
					</div>
				  </div>
			</div>
			<div class="col-md-3">
				<div class="box box-danger">
					<div class="box-header with-border">
						<div class="box-title">Publish</div>
					</div>
					<div class="box-body">
						<button class="btn btn-primary">Publish</button>
					</div>
				</div>
			</div>
			</form>
		</div>
</section>
</section>
</template>

<script>
	export default {
		data(){
			return{
				form: { title: '', content: ''},
				errors: [],
				config: {
            fileUploadMethod: 'POST',
            imageUploadMethod: 'POST',
            fileUploadParam: 'file_upload',
            fileUploadURL: 'upload_file',
            imageUploadURL: '/api/upload_image',
            imageUploadParam: 'image_upload'
               }
			}
		},
		methods: {
			save(){
				axios.post('/api/pages', this.form).then(response => {
					if(response.data.success){
						this.$router.push('/dashboard/pages')
						toastr.success('New page created successfully')
					}
				}).catch(err => {
					this.errors = err.response.data
					toastr.error(this.errors.title, this.errors.content)
					Nprogress.done()
				})
			}
		}
	}
</script>