<template>
    <div>
        <div class="">
            <h4> {{ question.title }}</h4>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                question:{},
            }
        },
        created(){
            axios.get('/api/questions/'+this.$route.params.slug)
            .then(res => this.question = res.data.data);
        }
    }
</script>