import { createWebHistory,createRouter } from "vue-router";
import Login from './components/Profile/Login.vue';
import Signup from './components/Profile/Signup.vue';
import Index from './Views/Index.vue';
import AskQuestion from './Views/AskQuestion.vue';
import QuestionDetails from './Views/QuestionDetails.vue';
import Logout from './components/Profile/Logout.vue';
const routes = [
    {path:'/user/login', name:'login', component:Login},
    {path:'/user/signup', name:'signup', component:Signup},
    {path:'/Index', name:'profile', component:Index},
    {path:'/user/logout', name:'logout', component:Logout},
    {path:'/', name:'home', component:Index},
    {path:'/question/:slug',component:QuestionDetails, name:'question_details'},
    {path:'/ask-question',component:AskQuestion,name:'ask_question'},
    
    
]
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;