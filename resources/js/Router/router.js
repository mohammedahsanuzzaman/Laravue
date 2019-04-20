import Vue from 'vue'
import VueRouter from 'vue-router'
import LogIn from '../components/login/Login.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/login', component: LogIn }
]
  
const router = new VueRouter({
routes,
hashbang: false,
mode: 'history'
})

export default router