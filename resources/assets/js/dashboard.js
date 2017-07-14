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
import VueHtml5Editor from 'vue-html5-editor'
Vue.use(VueHtml5Editor, {
   
    name: "vue-html5-editor",
    
    showModuleName: false,
   
    icons: {
        text: "fa fa-pencil",
        color: "fa fa-paint-brush",
        font: "fa fa-font",
        align: "fa fa-align-justify",
        list: "fa fa-list",
        link: "fa fa-chain",
        unlink: "fa fa-chain-broken",
        tabulation: "fa fa-table",
        image: "fa fa-file-image-o",
        hr: "fa fa-minus",
        eraser: "fa fa-eraser",
        undo: "fa-undo fa",
        "full-screen": "fa fa-arrows-alt",
        info: "fa fa-info",
    },
     image: {
        sizeLimit: 512 * 1024,
        upload: {
            url: null,
            headers: {},
            params: {},
            fieldName: {}
        },
        compress: {
            width: 600,
            height: null,
            quality: 80
        },
        uploadHandler(responseText){
            var json = JSON.parse(responseText)
            if (!json.ok) {
                alert(json.msg)
            } else {
                return json.data
            }
        }
    }
})
Vue.use(Vuex);
var app = new Vue({
  el: '#app',
  render: h => h(App),
  router: Router
});

