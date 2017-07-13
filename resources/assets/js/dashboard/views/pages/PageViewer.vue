<template>
	<tr>
		<td>{{page.title}}</td>
		<td>0</td>
		<td>{{page.user_id}}</td>
		<td>{{page.created_at}}</td>
		<td>
			<a href="#" class="btn btn-info btn-sm" title="View"><i class="glyphicon glyphicon-eye-open"></i></a>
			<a :href="'/user/pages/' + page.id + '/edit'" class="btn btn-primary btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i> </a>
			<a href="#" class="btn btn-danger btn-sm" title="Delete"> <i class="glyphicon glyphicon-trash"></i></a>
		</td>
	</tr>
</template>
<script>
	export default {
		props: ['page']
	}
</script>