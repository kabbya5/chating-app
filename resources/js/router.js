import { createWebHistory,createRouter } from "vue-router";
import Login from './components/Profile/Login.vue';
import Signup from './components/Profile/Signup.vue';
import Profile from './components/Profile/Profile.vue';
import Logout from './components/Profile/Logout.vue';
const routes = [
    {path:'/user/login', name:'login', component:Login},
    {path:'/user/signup', name:'signup', component:Signup},
    {path:'/user/profile', name:'profile', component:Profile},
    {path:'/user/logout', name:'logout', component:Logout},
    
]
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;