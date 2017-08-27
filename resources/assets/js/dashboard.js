require('./bootstrap');
window.Vue = require('vue');
import axios from 'axios'
Vue.component('index', require('./components/posts/Index.vue'))
Vue.component('pages', require('./components/pages/Index.vue'))
var app = new Vue({
	el: '#app'
})
