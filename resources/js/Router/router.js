import Vue from 'vue'
import VueRouter from 'vue-router'
import LogIn from '../components/login/Login.vue'
import Signup from '../components/login/Signup.vue'
import Logout from '../components/login/Logout.vue'
import Forum from '../components/forum/Forum.vue'
import AskQuestion from '../components/forum/AskQuestion.vue'
import Question from '../components/forum/Question.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/login', component: LogIn },
    { path: '/logout', component: Logout },
    { path: '/signup', component: Signup },
    { path: '/forum', name: 'forum', component: Forum },
    { path: '/ask-question', component: AskQuestion },
    { path: '/question/:slug', name: 'question', component: Question },
]
  
const router = new VueRouter({
routes,
hashbang: false,
mode: 'history'
})

export default router