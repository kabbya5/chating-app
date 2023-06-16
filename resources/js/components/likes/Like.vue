<template>
    <div class="flex items-center" @click="likeIt">
        <i class="fa-solid fa-heart text-red-600 fa-2x" :class="{'text-red-950':liked}"></i>
        <span class="ml-2"> {{ count}} </span>
    </div>
    
</template>
<script>
export default{
    props:['reply'],
    data(){
        return {
            liked:this.reply.liked,
            count:this.reply.like_count,
        }
    },
    methods:{
        likeIt(){
            if(User.loggedIn()){
                this.liked ? this.decr() : this.incr()
                this.liked = !this.liked
            }

        },
        incr(){
            axios.post('/api/like/'+this.reply.id)
            .then(res => alert('success'));
            this.count ++
        },
        decr(){
            axios.delete('/api/like/'+this.reply.id)
            .then(res => alert('success'));
            this.count --
        }
    }
}
</script>