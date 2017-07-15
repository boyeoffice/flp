require('./bootstrap');

window.Vue = require('vue');
import App from './App.vue'
import Router from './dashboard/routes.js'
import Vuex from 'vuex'
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: '#ce1126',
    failedColor: 'blue',
    height: '2px'
});
// Require Froala Editor js file.
require('froala-editor/js/froala_editor.pkgd.min')

// Require Froala Editor css files.
require('froala-editor/css/froala_editor.pkgd.min.css')
require('font-awesome/css/font-awesome.css')
require('froala-editor/css/froala_style.min.css')

// Import and use Vue Froala lib.
import VueFroala from 'vue-froala-wysiwyg'
Vue.use(VueFroala)

Vue.use(Vuex);
var app = new Vue({
  el: '#app',
  render: h => h(App),
  router: Router
});

