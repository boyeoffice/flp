require('./bootstrap');

window.Vue = require('vue');

import Router from './dashboard/routes.js'
import App from './App.vue'
import { store } from './store'

window.Nprogress = require('nprogress')
axios.interceptors.request.use(function (config) {
  Nprogress.start()
  return config
}, function (error) {
  console.error(error)
  return Promise.reject(error)
})
axios.interceptors.response.use(function (response){
  Nprogress.done()
  return response
}, function (error) {
  console.error(error)
  return Promise.reject(error)
})
$(document).ajaxComplete(function( event, request, settings ) {
  console.log(2)
  Nprogress.done()
})
$(document).ajaxStart(function() {
  Nprogress.start()
})

// Require Froala Editor js file.
require('froala-editor/js/froala_editor.pkgd.min')
// Import and use Vue Froala lib.
import VueFroala from 'vue-froala-wysiwyg'
Vue.use(VueFroala)


var app = new Vue({
  el: '#app',
  render: h => h(App),
  router: Router,
  store
});

