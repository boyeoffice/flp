<template>
  <header class="main-header">
    <router-link class="logo" to="/dashboard">
      <span class="logo-mini">ZED</span>
      <span class="logo-lg"><b>ZedHealth</b>PLUS</span>
    </router-link>
    <nav class="navbar navbar-static-top">
      <a href="javascript:void(0)" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown massages-menu">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">0</span>
            </a>
          </li>
          <li class="dropdown notifications-menu">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">0</span>
            </a>
          </li>
          <li class="dropdown user user-menu">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
              <img :src="'/avatars/' + user.avatar" width="40" height="40" class="user-image">
              <span class="hidden-xs">{{user.name}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default bnt-flat" @click="logout">Sign Out</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0)" data-toggle="control-sidebar">
              <i class="fa fa-gears"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
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