require('./bootstrap');

window.Vue = require('vue');

import Router from './administrator/routes.js'
import App from './App.vue'

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

var app = new Vue({
  el: '#app',
  render: h => h(App),
  router: Router
});

