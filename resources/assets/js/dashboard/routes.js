import Vue from 'vue'
import Dashboard from './Dashboard.vue'
import Parent from './Parent.vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	routes: [
	{
		path: '/user',
		component: Dashboard,
		children: [
		{path: '/', component: require('./views/home/Index.vue')},
		{
			path: 'pages',
			component: Parent,
			children: [
			{path: '/', component: require('./views/pages/Index.vue')},
			{path: ':id/edit', component: require('./views/pages/Edit.vue')}
			]
		}
		]
	}
	]
})
function requireAuth (to, from, next) {
    if (window.User) {
        return next()
    } else {
        return next('/')
    }
}
export default router