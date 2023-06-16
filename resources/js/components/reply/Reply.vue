<template>
    <div>
        <div class="flex justify-between">
            <div class="flex">
                <h4 class="text-[#111] text-[24px] font-semibold leading-[30px]">{{data.user}}</h4>
                <span class="ml-6 mt-1 text-[#444] font-semibold"> {{data.created_at}}</span>
            </div>

            <like :reply="data"> </like>
            
        </div>

        <hr class="my-2">

        <div class="ql-snow mt-5 -ml-6">
            <p class="ql-editor" v-html="data.reply"></p>
        </div>

        <div v-if="own" class="mt-6">
            <button @click="editReply" class="bg-blue-800 text-white px-4 py-1 rounded-md"> Edit  </button>
            <button @click="deleteReply" class="ml-6 bg-red-800 text-white px-4 py-1 rounded-md"> Delete </button>
        </div>
    </div>
</template>

<script>
import Like from '../likes/Like.vue';
export default{
    components:{
        'like':Like,
    },
    props:['data'],
    data(){
        return{
            own: false,
        } 
    },
    mounted(){
        this.own = User.own(this.data.user_id)
    },
    methods:{
        deleteReply(){
            axios.delete('/api/questions/'+this.data.question_slug+'/replay/'+this.data.id)
            .then(res => this.$parent.delete(this.data.id));
        }
    }
}
</script>