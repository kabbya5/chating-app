<template>
    <div class="text-left w-full ml-10">
        <h2 class="text-[#111] font-bold text-[30px]"> Side Bar</h2>
        <div class="flex flex-col mt-8">
            <router-link 
            v-for="category in categories" :key="category.id"
            :to="{name:'home'}"
            
            class="mb-4 text-[#444] font-[600] leading-[24px] text-[18px]"> {{ category.name }} </router-link>
        </div>
    </div>
</template>

<script>
export default{
    data(){
        return{
            categories:{},
        }
    },
    created(){
        axios.get('/api/categories')
        .then(res => this.categories = res.data);
    }
}
</script>