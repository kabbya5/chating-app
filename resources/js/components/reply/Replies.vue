<template>
    <div v-if="replies">
        <reply v-for="reply in replies" :key="reply.id" :data="reply" class="mb-6"></reply>
    </div>
</template>

<script>
import Reply from './Reply.vue';
export default{
    props:['replies'],
    components:{'reply':Reply},
    

    methods:{
        delete(id){
            alert('success');
        }
    }
}
</script>