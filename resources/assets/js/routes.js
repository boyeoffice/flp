import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	routes: [
	{path: '/', component: require('./views/Dashboard.vue')},
	{path: '/users', component: require('./views/users/Index.vue')},
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