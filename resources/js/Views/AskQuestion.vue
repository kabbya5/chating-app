<template>
    <div>
        <div class="w-full mx-auto">
            <h2 class="bg-green-800 py-2 text-center text-xl text-white font-semiblod capitalize"> Create Question </h2>
            <form @submit.prevent="createQuestion" class="mt-10">
                <div class="flex flex-col mb-5">
                    <label for="title"> Question Title</label>
                    <input type="text" class="form-input" v-model="form.title" :class="{'error':error.title}" placeholder="Question Title">
                    <p v-if="error.title" class="text-red-500 font-semibold">{{error.title[0]}}</p>
                </div>

                <div class="flex flex-col mb-5">
                    <label for="category_id"> Select Category </label>
                    <select class="form-input" :class="{'error':error.category_id}" v-model="form.category_id">
                        <option v-for="category in categories" :key="category.id" :value="category.id"> {{category.name}}</option>
                    </select>

                    <p v-if="error.category_id" class="text-red-400"> {{error.category_id[0]}}</p>
                </div>
                
                <div class="flex flex-col mb-5">
                    <label for="body"> Question body </label>
                    <QuillEditor v-model:content="contentHTML" contentType="html" toolbar="full" />
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
    import '@vueup/vue-quill/dist/vue-quill.snow.css';
    import { ref, defineComponent } from 'vue'
    import { QuillEditor, Delta } from '@vueup/vue-quill'
    export default{
        components: {
            QuillEditor,
        },
        setup: () => {
            const contentDelta = ref<Delta>(
            new Delta([
                    { insert: 'Gandalf', attributes: { bold: true } },
                    { insert: ' the ' },
                    { insert: 'Grey', attributes: { color: '#ccc' } },
                ])
            )
            const contentHTML = ref('<h1> first-text-h1 then h2 next simple normal </h1>')
            return { contentDelta, contentHTML}
        },  
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
                axios.post('/api/questions',{
                    'title': this.form.title,
                    'body':this.contentHTML,
                    'category_id':this.form.category_id,
                })
                .then(res => this.$router.push({name:'home'}))
                .catch(error => this.error = error.response.data.errors)
            }
        }
    }
</script>