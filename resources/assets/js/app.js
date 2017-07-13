require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex'
import Vueditor from 'vueditor'
import 'vueditor/dist/style/vueditor.min.css'
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: '#ce1126',
    failedColor: 'blue',
    height: '2px'
});

Vue.use(Vuex);
Vue.component('home', require('./index/Home.vue'));
Vue.component('pages', require('./index/pages/Index.vue'));
var app = new Vue({
  el: '#app'
});

