<template>
	<section>
	<section class="content-header">
		<h1>Dashboard <small>Control panel</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
			<li class="active">Posts</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12 hidden-xs">
				<div class="box box-danger">
        <div class="box-header with-border">
          <div class="box-title">Posts</div>
          <div class="box-tools pull-left"><router-link to="/dashboard/posts/create" class="btn btn-success btn-sm">Create new post</router-link></div>
        </div>
        <div class="box-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th v-for="th in theads">{{th.label}}</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="post in model.data">
                <td>{{post.title}}</td>
                <td>{{url}}/{{post.slug}}</td>
                <td>{{post.visits.length}}</td>
                <td v-if="post.status == 1">Active</td>
                <td>{{post.created_at}}</td>
                <td><a class="btn btn-info btn-sm" :href="'/' + post.slug">View</a></td>
                <td><router-link class="btn btn-default btn-sm" :to="'/dashboard/posts/' + post.id + '/edit'">Edit</router-link></td>
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
                       <small >Showing {{model.from}} - {{model.to}} of {{model.total}}</small>
                    </div>
                    <div class="pagination-item">
                    <button @click="prev" class="btn btn-default btn-sm">Prev</button>
                    <button @click="next" class="btn btn-default btn-sm">Next</button>
                  </div>
        </div>
      </div>
	</div>
			<div class="col-xs-12 visible-xs">
				<div class="box box-danger">
					<div class="box-header with-border">
						<div class="box-tittle">Posts</div>
					</div>
					<div class="box-body">
						 <!-- mobile view -->
				          <table class="table table-striped">
				          	<thead>
				          		<tr>
				          			<th>Title</th>
				          			<th>Views</th>
				          			<th>Action</th>
				          		</tr>
				          	</thead>
				          	 <tbody>
				              <tr v-for="post in model.data">
				                <td>{{post.title}}</td>
				                <td>{{post.visits.length}}</td>
				                <td><a class="btn btn-info btn-sm" target="_blank" :href="'/' + post.slug">View</a></td>
				                <td><router-link class="btn btn-default btn-sm" :to="'/dashboard/posts/' + post.id + '/edit'">Edit</router-link></td>
				              </tr>
				            </tbody>
				          </table>
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
					                    <button @click="prev" class="btn btn-default btn-sm">Prev</button>
					                    <button @click="next" class="btn btn-default btn-sm">Next</button>
					                  </div>
					        </div>
					</div>
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
				{label: 'Link'},
				{label: 'Views'},
				{label: 'Status'},
				{label: 'Date'},
				{label: 'Action'}
				],
				model: {data: []},
				source: '/api/posts',
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
<style scss="scoped">
	.pagination-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.pagination-input {
    width: 45px;
}

</style>