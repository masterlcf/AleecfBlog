import Vue from 'vue'
import App from './App.vue'
import router from './router'
import './plugins/element.js'
import './assets/css/global.css'
import axios from 'axios'
axios.defaults.baseURL = 'http://www.laravel.test'
Vue.prototype.$http = axios
axios.interceptors.request.use(config => {
  config.headers.token = window.sessionStorage.getItem('token')
  return config
})
Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
