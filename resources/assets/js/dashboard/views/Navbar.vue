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
                     <li class="top-li">{{user.name}}</li>
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><i class="glyphicon glyphicon-bell"></i></span></a> </li>
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span><i class="glyphicon glyphicon-globe"></i></span> </a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">
                                <li v-if="user.is_admin == 1">
                                    <a href="/admin/home">
                                           <span><i class="glyphicon glyphicon-log-out"></i></span> Adminstrator
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
              <router-link to="/dashboard" tag="li"><a> <i class="fa fa-dashboard"></i> Dashboard</a></router-link>
              <router-link to="/dashboard/posts" tag="li"><a> <i class="fa fa-sticky-note-o"></i>  Posts</a></router-link>
              <router-link to="/dashboard/pages" tag="li"><a> <i class="glyphicon glyphicon-th-large"></i>  Pages</a></router-link>
             <router-link to="/admin/home" tag="li"><a> <i class="fa fa-sticky-note-o"></i>  Blog</a></router-link>
              <router-link to="/dashboard/profile" tag="li"><a> <i class="fa fa-user"></i>  Profile </a></router-link>
        </ul>
        </div>
  </section>
</template>
<script>
  export default {
          data(){
            return{
             url: window.Url
            }
          },
          computed: {
            user(){
              return this.$store.state.auth_user
            }
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