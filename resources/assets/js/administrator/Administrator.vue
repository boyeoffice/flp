<template>
	<div>
	<navbar></navbar>
	<div class="content">
		<router-view></router-view>
		</div>
	</div>
</template>
<script>
import Navbar from './views/Navbar.vue'
	export default{
		components: { Navbar }
	}
</script>