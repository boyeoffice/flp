<template>
	<section class="content">
		<section class="container">
			<div class="box box-danger">
				<div class="box-header with-border">
					<div class="box-title">Pages</div>
				</div>
				<div class="box-body">
					<table class="table table-condensed">
						<thead>
							<th v-for="th in theads">{{th.label}}</th>
						</thead>
						<tbody>
							<tr v-for="page in pages">
								<td>{{page.id}}</td>
								<td>{{page.title}}</td>
								<td>{{page.user.name}}</td>
								<td>{{page.slug}}</td>
								<td>{{page.created_at}}</td>
								<td>{{page.page_view.length}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</section>
</template>

<script>
	export default {
		data(){
			return{
				pages: [],
				theads: [
				{label: 'ID'},
				{label: 'Title'},
				{label: 'User'},
				{label: 'Url'},
				{label: 'Date'},
				{label: 'View'}
				]
			}
		},
		mounted(){
			this.fetchPage()
		},
		methods: {
			fetchPage(){
				axios.get('/api/admin/pages').then(response => {
					this.pages = response.data
				})
			}
		}
	}
</script>