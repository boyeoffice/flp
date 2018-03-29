<template>
	<div class="wrapper">
	<navbar></navbar>
	<sidebar></sidebar>
	<div class="content-wrapper">
		<router-view></router-view>
		</div>
	<footerb></footerb>
	</div>
</template>
<script>
import Navbar from './views/Navbar.vue'
import Sidebar from './views/Sidebar.vue'
import Footerb from './views/Footer.vue'
	export default{
		components: { Navbar, Sidebar, Footerb }
	}
</script>z