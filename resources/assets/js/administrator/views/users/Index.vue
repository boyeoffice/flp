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
                   	<user-viewer v-for="user in model.data" 
                   	@add-user="fetchUser"
                   	@activate-user="fetchUser"
                    @deactivate-user="fetchUser"
                   	:user="user" :key="users.id"></user-viewer>
                   </tbody>
				</table>
			</div>
			<div class="panel-footer pagination-footer">
				<div class="pagination-item">
                <span>Per page: </span>
                <select v-model="params.per_page" @change="fetchUser">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                </div>
					 <div class="pagination-item">
                       <small>Showing {{model.from}} - {{model.to}} of {{model.total}}</small>
                    </div>
                    <div class="pagination-item">
                    <button @click="prev" class="btn btn-default btn-sm">Prev</button>
                    <button @click="next" class="btn btn-default btn-sm">Next</button>
                  </div>
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
				],
				model: {data: []},
				source: '/api/admin/users',
				params: {
                    column: 'id',
                    direction: 'desc',
                    per_page: 10,
                    page: 1,
                    search_column: 'id',
                    search_operator: 'equal_to',
                    search_query_1: '',
                    search_query_2: ''
                }
			}
		},
		mounted(){
			this.fetchUser()
		},
		methods: {
			 next() {
                if(this.model.next_page_url) {
                    this.params.page++
                    this.fetchUser()
                }
            },
            prev() {
                if(this.model.prev_page_url) {
                    this.params.page--
                    this.fetchUser()
                }
            },
			fetchUser(){
				var vm = this
                axios.get(this.buildURL())
                    .then(function(response) {
                        Vue.set(vm.$data, 'model', response.data.model)
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
			},
			buildURL() {
                var p = this.params
                return `${this.source}?column=${p.column}&direction=${p.direction}&per_page=${p.per_page}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`
            }
		}
	}
</script>