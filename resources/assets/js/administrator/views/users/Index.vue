<template>
	<section class="container">
		<section class="box box-danger">
			<div class="box-header with-border">
				<div class="box-title">Users</div>
			</div>
			<div class="box-body">
				<table class="table table-condensed">
					<thead>
						<th v-for="th in theads">{{th.label}}</th>
					</thead>
                   <tbody>
                   	<user-viewer v-for="user in users" 
                   	@add-user="fetchUser"
                   	@activate-user="fetchUser"
                    @deactivate-user="fetchUser"
                   	:user="user" :key="users"></user-viewer>
                   </tbody>
				</table>
			</div>
		</section>
	</section>
</template>
<script type="text/javascript">
import UserViewer from './UserViewer.vue'
	export default{
		components: { UserViewer },
		data(){
			return{
				users: [],
				theads: [
				{label: 'ID'},
				{label: 'Name'},
				{label: 'Email'},
				{label: 'Status'},
				{label: 'Date'},
				{label: 'Action'}
				]
			}
		},
		mounted(){
			this.fetchUser()
		},
		methods: {
			fetchUser(){
				axios.get('/api/admin/users').then(response => {
					this.users = response.data
				})
			}
		}
	}
</script>