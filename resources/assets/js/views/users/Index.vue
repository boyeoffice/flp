<template>
	<div class="container margin-top">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">{{title}}</h3>
			</div>
			<div class="box-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th v-for="th in theads">{{th.label}}</th>
						</tr>
					</thead>
					<tbody>
						<user-viewer v-for="user in model" :user="user" :key="user"></user-viewer>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>
<script>
import UserViewer from './UserViewer.vue'
	export default {
		components: { UserViewer },
		data(){
			return{
				title: 'Users',
				model: [],
				theads: [
				{label: 'ID'},
				{label: 'Avatar'},
				{label: 'Name'},
				{label: 'Email'},
				{label: 'Status'},
				{label: 'Action'}
				]
			}
		},
		mounted(){
			this.fetchUser()
		},
		methods: {
			fetchUser(){
				var vm = this
				axios.get('/api/v1/users').then(response => {
					Vue.set(vm.$data, 'model', response.data.model)
				})
			}
		}
	}
</script>