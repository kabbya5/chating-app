<template>
    <div>
        <div class="w-full md:w-96 mx-auto">
            <h2 class="bg-green-800 py-2 text-center text-xl text-white font-semiblod capitalize"> Create Question </h2>
            <form @submit.prevent="createQuestion" class="mt-10">
                <div class="flex flex-col mb-5">
                    <label for="title"> Question Title</label>
                    <input type="text" class="form-input" v-model="form.title" :class="{'error':error.title}" placeholder="Question Title">
                    <p v-if="error.title" class="text-red-500 font-semibold">{{error.title[0]}}</p>
                </div>

                <div class="flex flex-col mb-5">
                    <label for="category_id"> Select Category </label>
                    <select class="form-input" :class="{'error':form.category_id}" v-model="category_id">
                        <option v-for="category in categories" :key="category.id" :value="category.id"> {{category.name}}</option>
                    </select>
                </div>

                <div class="flex flex-col mb-5">
                    <label for="body"> Question body </label>
                    <textarea  cols="30" rows="10" class="form-input" v-model="form.body" :class="{'error':error.body}"></textarea>
                    <p v-if="error.body" class="text-red-500 font-semibold">{{error.body[0]}}</p>
                </div>

                <div class="text-center mt-8">
                    <button type="submit" class="py-2 px-5 bg-blue-800 text-white text-xl font-lg rounded-lg"> Create Question </button>
                </div>
            </form>
        </div>
        
    </div>
</template>

<script>
    export default{
        data(){
            return{
                form:{},
                error:{},
                categories:{},
            }
        },
        created(){
            axios.get('/api/categories')
            .then(res => this.categories = res.data)
        },
        methods:{
            createQuestion(){
                axios.post('/api/questions',this.form)
                .then(res => console.log(res.data))
                .catch(error => this.error = error.response.data.errors)
            }
        }
    }
</script>