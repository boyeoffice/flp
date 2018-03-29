<template>
<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img :src="'/avatars/' + user.avatar" class="img-circle">
			</div>
			<div class="pull-right info">
				<p>{{user.name}}</p>
				<a href="#">
					<i class="fa fa-circle text-success"></i>Online
				</a>
			</div>
		</div>
		<ul class="sidebar-menu">
			<li class="header">Main Navigation</li>
			<li class="treeview active">
				<router-link to="/dashboard">
					<i class="fa fa-dashboard"></i>
					<span>Dashboard</span>
				</router-link>
			</li>
			<li class="treeview" v-if="user.is_admin == 1">
				<a href="javascript:void(0)">
					<i class="fa fa-users"></i>
					<span>Users</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<router-link to=""><i class="fa fa-circle-o"></i>All Users</router-link>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="javascript:void(0)">
					<i class="fa fa-edit"></i>
					<span>Posts</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<router-link to="/dashboard/posts"><i class="fa fa-circle-o"></i>All Posts</router-link>
						<router-link to="/dashboard/posts/Create"><i class="fa fa-circle-o"></i>Create</router-link>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="javascript:void(0)">
					<i class="fa fa-file"></i>
					<span>Pages</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<router-link to="/dashboard/pages"><i class="fa fa-circle-o"></i>All Pages</router-link>
						<router-link to="/dashboard/pages/Create"><i class="fa fa-circle-o"></i>Create</router-link>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="javascript:void(0)">
					<i class="fa fa-user"></i>
					<span>Profile</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<router-link to="/dashboard/profile"><i class="fa fa-circle-o"></i>Profile</router-link>
						
					</li>
				</ul>
			</li>
		</ul>
	</section>
</aside>
</template>
<script>
	export default {
		computed: {
			user(){
              return this.$store.state.auth_user
            }
		}
	}
</script>