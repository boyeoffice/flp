<template>
	<tr>
		<td>{{user.id}}</td>
		<td>{{user.name}}</td>
		<td>{{user.email}}</td>
		<td v-if="user.status === 1"><i class="fa fa-circle text-success" title="Active"></i></td>
		<td v-else><i class="fa fa-circle text-muted" title="Pending"></i></td>
		<td>{{user.created_at}}</td>
		<td>
		<button class="btn btn btn-info btn-sm" @click="backendUser(user,backUser)" v-if="user.is_admin === 0" title="lock to backend user"><i class="fa fa-lock"></i></button>
			<button class="btn btn-warning" @click="deactivateUser(user,decStatus)" v-if="user.status === 1" title="deactive user"><i class="fa fa-pause"></i></button>
		<button class="btn btn-success" @click="activateUser(user,actStatus)" v-else title="activate user"><i class="fa fa-play"></i></button>
		</td>
	</tr>
</template>
<script type="text/javascript">
	export default{
		props: ['user'],
		data(){
			return{
               actStatus: {status: '1'},
				decStatus:{status: '0'},
				backUser: {is_admin: '1'}
			}
		},
		methods: {
			activateUser(oldUser, newUser){
				var vm = this
				axios.patch('/api/admin/users/' + oldUser.id, newUser).then(response => {
					vm.$emit('activate-user')
					toastr.success('You have activated this user')
				})
			},
			deactivateUser(oldUser, newUser){
				var vm = this
				axios.patch('/api/admin/users/' + oldUser.id, newUser).then(response => {
					vm.$emit('deactivate-user')
					toastr.success('You have deactivated this user')
				})
			},
			backendUser(oldUser, newUser){
				var vm = this
				axios.patch('/api/admin/users/' + oldUser.id, newUser)
				.then(response => {
					vm.$emit('add-user')
					toastr.success('You have added user to backend')
				})
			}
		}
	}
</script>