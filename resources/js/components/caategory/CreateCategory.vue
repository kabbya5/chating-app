<template>
    <div>
        <form @submit.prevent="createCategory">
            <div class="form-group mb-4 flex flex-col">
                <label for=""> Category Name </label>
                <input type="text" class="form-input" v-model="form.name" placeholder="category name" :class="{'error':error.name}">
                <p class="text-red-500" v-if="error.name">{{error.name[0]}}</p>
            </div>

            <button type="submit" class="bg-blue-800 font-bold text-white px-4 py-2 rounded-md">
                Create Category
            </button>
        </form>

        <div class="mt-10">
            <h2 class="text-3xl font-semibold leading-8 text-gray-700"> All Category </h2>
            <div class="flex flex-col mt-8">
                <router-link 
                v-for="category in categories" :key="category.id"
                :to="{name:'home'}"
                
                class="mb-4 text-[#444] font-[600] leading-[24px] text-[18px]"> {{ category.name }} </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    data(){
        return{
            form:{},
            error:{},
            categories:{}
        }
    },
    methods:{
        createCategory(){
            axios.post('/api/categories',this.form)
            .then(res => alert('successfully created!'))
            .catch(error => this.error = error.response.data.errors)
        }
    },
    created(){
        axios.get('/api/categories')
        .then(res => this.categories = res.data)
    }
}
</script>