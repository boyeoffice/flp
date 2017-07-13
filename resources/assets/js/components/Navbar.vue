<template>
  <div>
	<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="#">
                        Boyeoffice
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" v-if="isAuth">
                    <li><img class="img img-circle" :src="url + '/' + user.avatar" width="40" height="40"></li>
                     <li class="top-li">{{user.name}}</li>
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><i class="glyphicon glyphicon-bell"></i></span></a> </li>
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span><i class="glyphicon glyphicon-globe"></i></span> </a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#" @click="Logout"><span><i class="glyphicon glyphicon-log-out"></i></span> Logout</a>
                                    </li>
                                </ul>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" v-if="isAuth">
        <ul class="nav nav-pills nav-justified">
			  <li role="presentation" class="active"><router-link to='/'><i class="glyphicon glyphicon-th"></i> Dashboard</router-link></li>
			  <li role="presentation"><router-link to='/users'><i class="glyphicon glyphicon-user"></i>  Users</router-link>
              </li>
			  <li role="presentation"><a href="#">Messages</a></li>
			  <li role="presentation" class="active"><a href="#">Home</a></li>
			  <li role="presentation"><a href="#">Profile</a></li>
			  <li role="presentation"><a href="#">Messages</a></li>
        </ul>
        </div>
     </div>
</template>
<script>
	export default {
		data(){
			return{
				url: window.url,
              user: {},
              isAuth: null
			}
		},
        created(){
            this.isAuth = this.$auth.isAuthenticated()
        },
		mounted(){
			this.user = window.User
		},
        methods:{
            Logout(){
                axios.post('backend/v1/logout').then(response => {
                    if(response.data.success){
                        window.location.reload()
                    }
                })
            }
        }
	}
</script>