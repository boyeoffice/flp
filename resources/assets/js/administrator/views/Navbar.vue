<template>
  <section>
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
                       Zedhealthplus
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                    <li><img class="img img-circle" :src="url + '/avatars/' + user.avatar" width="40" height="40"></li>
                     <li class="top-li">{{user.username}}</li>
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><i class="glyphicon glyphicon-bell"></i></span></a> </li>
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span><i class="glyphicon glyphicon-globe"></i></span> </a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a :href="url + '/dashboard'">
                                           <span><i class="glyphicon glyphicon-log-out"></i></span> Dashboard
                                        </a>
                                    </li>
                                    <li>
                                    <a href="#" @click="logout">
                                           <span><i class="glyphicon glyphicon-log-out"></i></span> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
        <ul class="nav nav-pills nav-justified">
              <li role="presentation" class="active"><router-link to="/admin/home"><i class="fa fa-dashboard"></i> Dashboard</router-link></li>
              <li role="presentation"><router-link to="/admin/home/users"><i class="fa fa-users"></i>  Users</router-link></li>
              <li role="presentation"><router-link to="/admin/home"><i class="glyphicon glyphicon-th-large"></i>  Pages</router-link>
              </li>
              <li role="presentation"><router-link to="/admin/home"><i class="fa fa-sticky-note-o"></i>  Blog</router-link></li>
              <li role="presentation"><router-link to="/admin/home"><i class="fa fa-user"></i>  Profile</router-link></li>
        </ul>
        </div>
  </section>
</template>
<script>
  export default {
          data(){
            return{
             user: {},
             url: window.Url
            }
          },
         mounted(){
            this.user = window.User
         },
         methods: {
          logout(){
            axios.post('/api/logout').then(response => {
              if(response.data.success){
                window.location.reload()
              }
            })
          }
         }
       }
</script>