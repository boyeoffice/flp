<template>
	<section>
		<section class="container">
		   <div class="box box-danger">
		   	<div class="box-header with-border">
		   		<div class="box-title">Pages</div>
		   		<div class="box-tools pull-right">
		   		<router-link to="/dashboard/pages/create" class="btn btn-success btn-sm">Create</router-link></div>
		   			</div>
		   		<div class="box-body">
		   			<table class="table table-bordered">
		   				<thead>
		   					<tr>
		   						<th v-for="th in theads">{{th.label}}</th>
		   					</tr>
		   				</thead>
		   				<tbody>
		   					<tr v-for="page in model.data">
								<td>{{page.title}}</td>
								<td>{{page.page_view.length}}</td>
								<td>{{url}}/health/{{page.slug}}</td>
								<td>{{page.created_at}}</td>
								<td>
									<a :href="url + '/health/' + page.slug" class="btn btn-info btn-sm" title="View"><i class="glyphicon glyphicon-eye-open"></i></a>
									<router-link :to="'/dashboard/pages/' + page.id + '/edit'" class="btn btn-primary btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i> </router-link>
									<a href="#" class="btn btn-danger btn-sm" title="Delete"> <i class="glyphicon glyphicon-trash"></i></a>
								</td>
							</tr>
		   				</tbody>
		   			</table>
		   		</div>
		   			<div class="panel-footer pagination-footer">
				<div class="pagination-item">
                <span>Per page: </span>
                <select v-model="params.per_page" @change="fetchData">
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
		   </div>
		</section>
	</section>
</template>
<script>
	export default {
		data(){
			return{
				url: window.Url,
				theads:[
				{label: 'Title'},
				{label: 'Views'},
				{label: 'Link'},
				{label: 'Date'},
				{label: 'Action'}
				],
				model: {data: []},
				source: '/api/pages',
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
			this.fetchData()
		},
		methods: {
			next() {
                if(this.model.next_page_url) {
                    this.params.page++
                    this.fetchData()
                }
            },
            prev() {
                if(this.model.prev_page_url) {
                    this.params.page--
                    this.fetchData()
                }
            },
			fetchData(){
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