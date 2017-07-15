<template>
	<section class="container">
			<div class="box box-danger">
				<div class="box-header with-border">
					<div class="box-title">Posts</div>
					<div class="box-tools pull-left"><a href="#" class="btn btn-success btn-sm">Create new post</a></div>
				</div>
				<div class="box-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th v-for="th in theads">{{th.label}}</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
	</section>
</template>
<script>
	export default {
		data(){
			return{
				theads:[
				{label: 'Title'},
				{label: 'Link'},
				{label: 'Views'},
				{label: 'Status'},
				{label: 'Date'},
				{label: 'Action'}
				]
			}
		}
	}
</script>