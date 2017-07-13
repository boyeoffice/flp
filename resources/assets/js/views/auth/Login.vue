<template>
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" @submit.prevent="login">
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="form.email" name="email" required autofocus>

                               
                                    <span class="help-block">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" v-model="form.password" class="form-control" name="password" required>

                                
                                    <span class="help-block">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="#">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
	export default {
		data(){
			return{
			form: {
                    email: '',
                    password: ''
                },
			method: 'post'
			}
		},
		methods: {
			login(){
				
				axios[this.method]('/backend/v1/signin', this.form).then(response => {
					if(response.data.success){
                        window.location.reload()
                    }
				})
			}
		}
	}
</script>