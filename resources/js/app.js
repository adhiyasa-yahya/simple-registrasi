// require('./bootstrap')
import Vue from 'vue'
import router from './routes'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import App from './layouts/app.vue'

Vue.use(Toast)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

window.axios = require('axios');
window.axios.defaults.headers.common['Accept'] = 'application/json';

const app = new Vue({
    router,
    el: '#app',
    render: h => h(App)
});
