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
				<div class="col-md-9">
					<div class="box box-danger">
						<div class="box-header with-border">
							<div class="box-title">Profile</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<input type="text" class="form-control" disabled="disabled" v-model="user.username" placeholder="Username" name="">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" v-model="user.name" placeholder="Fullname" name="">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" v-model="user.email" placeholder="Email" name="">
							</div>
							<div class="form-group">
								<button class="btn btn-primary" @click="updateProfile">Save</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="box box-danger">
						<div class="box-header with-border">
							<div class="box-title">Avatar</div>
						</div>
						<div class="box-body"></div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="box box-danger">
						<div class="box-header with-border">
							<div class="box-title">
								Password
							</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<input type="password" class="form-control" v-model="pass.old_password" placeholder="Old password">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" v-model="pass.password" placeholder="New password">
							</div>
							<div class="form-group">
								<input type="password" v-model="pass.password_confirmation" class="form-control" placeholder="Confirm Password">
							</div>
							<div class="form-group">
								<button class="btn btn-primary" @click="updatePassword">Save</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</section>
</template>

<script>
	export default{
		data(){
			return{
				errors: {},
				pass:{old_password: '', password: '', password_confirmation: ''}
			}
		},
		computed: {
			user(){
				return this.$store.state.auth_user
			}
		},
		methods:{
			updateProfile(){
				axios.put('/api/updateprofile', this.user).then(response => {
					if(response.data.success){
						toastr.success('Profile update successfully')
					}
				}).catch(err => {
					this.errors = err.response.data
					toastr.error(this.errors.name, this.errors.email)
					Nprogress.done()
				})
			},
			updatePassword(){
				axios.put('/api/update_password', this.pass).then(response => {
					if(response.data.success){
						toastr.success('Password changed successfully')
						this.pass = ''
					}
				}).catch(err => {
					this.errors = err.response.data
					toastr.error(this.errors.old_password, this.errors.password)
					Nprogress.done()
				})
			}
		}
	}
</script>