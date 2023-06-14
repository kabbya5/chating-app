<template>
    <div>
        <edit-question v-if="edditing" :data="question" :error="errors"> </edit-question>
        <div v-else class="">
            <div class="flex items-center justify-between">
                <h4> {{ question.title }}</h4>
                <h2 class="text-white font-sembold text-md bg-green-800 px-5 py-1"> 3 replies </h2>
            </div>
            
            <div class="ql-snow mt-5 -ml-6">
                <p class="ql-editor" v-html="question.body"></p>
            </div>
            <div v-if="own" class="mt-4">
                <a @click="deleteQuestion"  class="text-xl font-semibold bg-red-800 leading-7 text-white px-6 py-2 capitalize rounded-md"> delete </a>
                <a @click="edit" class="text-xl font-semibold bg-blue-800 leading-7 text-white px-6 py-2 capitalize ml-4 rounded-md"> edit</a>
            </div>

            <hr class="my-4">
        <replies :replies="question.replies"> </replies>

        <create-reply :questionSlug="question.slug"> </create-reply>
        </div>
        
        
        
    </div>
</template>

<script>
    import Replies from '../components/reply/Replies.vue';
    import Edit from '../components/Questions/Edit.vue';
    import CreateReply from '../components/reply/CreateReply.vue';
    export default{
        components:{
            'edit-question': Edit,
            'replies':Replies,
            'create-reply':CreateReply,
        },
        data(){
            return{
                question:'',
                errors:'',
                own:'',
                edditing:false,
            }
        },
        created(){
            axios.get('/api/questions/'+this.$route.params.slug)
            .then(res => {   
                this.question = res.data.data
                this.own = User.own(res.data.data.user_id)
            })
        },
        methods:{
            deleteQuestion(){
                axios.delete('/api/questions/'+this.question.slug)
                .then(res =>this.$router.push({name:'home'}))
            },
            edit(){
                this.edditing = true;
            },
            cancelEdit(){
                this.edditing = false;
            },
            updateQuestion(data){
                axios.put('/api/questions/'+this.question.slug,data)
                .then(res => this.$router.push({name:'home'}))
                .catch(error => this.errors = error.response.data.errors)
            }
        }
    }
</script>