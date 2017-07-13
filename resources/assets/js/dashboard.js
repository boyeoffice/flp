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
        // 文件最大体积，单位字节  max file size
        sizeLimit: 512 * 1024,
        // 上传参数,默认把图片转为base64而不上传
        // upload config,default null and convert image to base64
        upload: {
            url: null,
            headers: {},
            params: {},
            fieldName: {}
        },
        // 压缩参数,默认使用localResizeIMG进行压缩,设置为null禁止压缩
        // compression config,default resize image by localResizeIMG (https://github.com/think2011/localResizeIMG)
        // set null to disable compression
        compress: {
            width: 600,
            height: null,
            quality: 80
        },
        // 响应数据处理,最终返回图片链接
        // handle response data，return image url
        uploadHandler(responseText){
            //default accept json data like  {ok:false,msg:"unexpected"} or {ok:true,data:"image url"}
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

