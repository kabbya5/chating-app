<template>
    <div class="my-10">
        <h2 class="mt-8 text-gray-600 font-semibold text-xl"> Put your answers </h2>
        <form @submit.prevent="createReply" class="mt-5">
            <div class="flex flex-col mb-5">
                <QuillEditor v-model:content="contentHTML" contentType="html" toolbar="full" />
                <p v-if="error.body" class="text-red-500 font-semibold">{{error.body[0]}}</p>
            </div>

            <div class="mt-4">
                <button class="bg-green-800 font-semibold text-white px-4 py-1 rounded-md"> New Replay  </button>
            </div>
        </form>
    </div>
</template>

<script>
import '@vueup/vue-quill/dist/vue-quill.snow.css';
    import { ref, defineComponent } from 'vue';
    import { QuillEditor, Delta } from '@vueup/vue-quill';
    export default{
        props:['questionSlug'],

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
            const contentHTML = ref('<h1> Reply here  </h1>')
            return { contentDelta, contentHTML}
        }, 

        data(){
            return{
                error:{},
            }
        },

        methods:{
            createReply(){
                alert(this.questionSlug);
                axios.post('/api/questions/'+this.questionSlug+'/replay',{
                    body:this.contentHTML,
                })
            }
        }
    }
</script>