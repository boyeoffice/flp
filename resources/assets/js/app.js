require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex'
import VueProgressBar from 'vue-progressbar'
import Router from './administrator/routes.js'
import App from './App.vue'
Vue.use(VueProgressBar, {
    color: '#ce1126',
    failedColor: 'blue',
    height: '2px'
});

Vue.use(Vuex);

var app = new Vue({
  el: '#app',
  render: h => h(App),
  router: Router
});

