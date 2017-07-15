<template>
	<div>
	<navbar></navbar>
	<div class="content">
	<div v-if="loading" class="container">
		<div class="col-md-3 col-lg-offset-4">
			<div class="box box-danger">
				<div class="text-center loading">
					<i class="fa fa-repeat fa-spin"></i>
				</div>
			</div>
		</div>
	</div>
	<router-view></router-view>
	</div>
		</div>
</template>
<script>
	import Navbar from './views/Navbar.vue'
	export default {
		components: { Navbar },
		props: ['loading']
	}
</script>