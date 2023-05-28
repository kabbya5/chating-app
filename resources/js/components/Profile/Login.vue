<template>
    <div class="">
        <form @submit.prevent="login" class="form w-96 mx-auto border-2 border-gray-200 shadow-xl p-4">
            <div class="header">
                <h2 class="text-center text-[#313131] font-[500] text-xl"> Login </h2> 
                
                <div class="flex flex-col my-4">
                    <label for="email" class="text-[#31311] font-[500] text-[16px]"> Enter your email  </label>
                    <input type="text" v-model="form.email" class="form-input" :class="{'error':errors.email}">
                    <p v-if="errors.email" class="text-red-500 font-semibold">{{ errors.email[0] }} </p>

                    <div class="mt-4 w-full">
                        <label for="password" class="text-[#31311] font-[500] text-[16px]"> Enter your Password </label>
                        <input type="password" v-model="form.password" class="form-input w-full" :class="{'error':errors.password}">
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="px-8 py-2 bg-green-800 text-white font-semibold text-xl leading-8 rounded-md text-center w-full"> Login </button>
                    </div>

                    <p class="mt-8 text-[#313131] font-[400]"> Don't have any account ?
                        <router-link :to="{name:'signup'}" class="text-green-800 font-xl "> Signup Here </router-link> 
                    </p>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default{
    data(){
        return{
            form:{
                email:'kabbya@gmail.com',
                password:12345678,
            },
            errors:{},
        }
    },
    
    methods:{
        login(){
            User.login(this.form)
            this.$router.push({name:'profile'})
        }
    }
}
</script>