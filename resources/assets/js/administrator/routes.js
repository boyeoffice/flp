import Vue from 'vue'
import Dashboard from './Administrator.vue'
import Parent from './Parent.vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	linkExactActiveClass: 'active',
	routes: [
	{
		path: '/admin/home',
		component: Dashboard,
		children: [
				{path: '/', component: require('./views/Dashboard.vue')},
				{
					path: 'users',
					component: Parent,
					children: [
					{path: '/', component: require('./views/users/Index.vue')}
					]
				},
				{
					path: 'posts', 
					component: Parent,
					children: [
					   {path: '/', component: require('./views/posts/Index.vue')} 
					    ]
				},
				{
					path: 'pages', 
					component: Parent,
					children: [
					   {path: '/', component: require('./views/pages/Index.vue')} 
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