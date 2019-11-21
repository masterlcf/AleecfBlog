import Vue from 'vue'
import App from './App.vue'
import router from './router'
<<<<<<< HEAD

=======
import './plugins/element.js'
import './assets/css/global.css'
import axios from 'axios'
axios.defaults.baseURL = 'http://www.laravel.test'
Vue.prototype.$http = axios
>>>>>>> vue
Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
