import Vue from 'vue'
import Dashboard from './Dashboard.vue'
import Parent from './Parent.vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	linkExactActiveClass: 'active',
	routes: [
	{
		path: '/dashboard',
		component: Dashboard,
		children: [
				{path: '/', component: require('./views/Index.vue')},
				{
					path: 'posts',
					component: Parent,
					children: [
							{path: '/', component: require('./views/posts/Index.vue')},
							{path: 'create', component: require('./views/posts/Create.vue')},
							{path: ':id/edit', component: require('./views/posts/Edit.vue')}
					  ]
				},
				{
					path: 'pages',
					component: Parent,
					children: [
							{path: '/', component: require('./views/pages/Index.vue')},
							{path: 'create', component: require('./views/pages/Create.vue')},
							{path: ':id/edit', component: require('./views/pages/Edit.vue')}
					    ]
				},
				{
					path: 'profile',
					component: Parent,
					children: [
					      {path: '/', component: require('./views/profile/Index.vue')}
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