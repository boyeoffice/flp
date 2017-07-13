<template>
	<div class="content"> 
		<Login v-if="!isAuth"></Login>
		<div class="container">
         <div class="row">
         	<div class="col-md-3 col-sm-3 col-xs-12">
         		<div class="info-box">
         			<span class="info-box-icon bg-aqua">
         				<i class="glyphicon glyphicon-user"></i>
         			</span>
         			<div class="info-box-content">
         				<div class="info-box-text">Users</div>
         				<div class="info-box-number">{{statistics.users}}</div>
         			</div>
         		</div>
         	</div>
         	</div>
         </div>  
	</div>
</template>
<script>
import Login from '../views/auth/Login.vue'
	export default {
		components: { Login },
		data(){
			return{
              isAuth: null,
              statistics: []
			}
		},
		created(){
			this.isAuth = this.$auth.isAuthenticated()
		},
		mounted(){
			window.document.title = 'Dashboard'
			this.fetchData()
		},
		methods:{
			fetchData(){
				this.$Progress.start()
				axios.get('/api/v1/boye/backend/statistics').then(response => {
					this.statistics = response.data
					this.$Progress.finish()
				})
			}
		}
	}
</script>