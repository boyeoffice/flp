require('./bootstrap');

window.Vue = require('vue');

import Router from './administrator/routes.js'
import App from './App.vue'



var app = new Vue({
  el: '#app',
  render: h => h(App),
  router: Router
});

