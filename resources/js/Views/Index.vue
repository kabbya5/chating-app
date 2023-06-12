<template>
    <div class="flex flex-col-reverse md:flex-row">
        <div class="question">
            <div class="question body" 
            v-for="question in questions" :key="question.id">
                <router-link :to="{name:'question_details',params:{slug:question.path}}">
                    <h2 class="text-[#313131 font-[600] text-[18px] leading-7"> {{ question.title }} </h2>
                </router-link>
                
                <span class="text-sm font-[500] text-[#313131]"> 
                    {{ question.created_date }} asked by {{ question.user }}
                </span>
                <div class="ql-snow mt-5">
                    <p class="ql-editor" v-html="question.body"></p>
                </div>
            </div>
        </div>
        
        <side-bar> </side-bar>
        
    </div>
</template>

<script>
import Sidebar from '../components/Sidebar.vue';

export default{
    components:{'side-bar': Sidebar,},
    data(){
        return{
            questions:{},
        }
    },
    created(){
        axios.get('/api/questions')
        .then(res => {
            this.questions = res.data.data
        })
    }
}
</script>