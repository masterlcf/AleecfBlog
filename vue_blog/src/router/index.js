import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../components/Login.vue'
import Home from '../components/Home.vue'

Vue.use(VueRouter)

const router = new VueRouter({
  routes: [
    { path: '/', redirect: '/login' },
    { path: '/login', component: Login },
    { path: '/home', name: 'home', component: Home }
  ]
})
router.beforeEach((to, from, next) => {
  //  to將要访问的路径
  //  from代表从哪个路径跳转而来
  //  next是一个函数表示放行
  if (to.path === '/login') return next()
  const token = window.sessionStorage.getItem('token')
  if (!token) {
    return next('/login')
  } else {
    next()
  }
})
export default router
