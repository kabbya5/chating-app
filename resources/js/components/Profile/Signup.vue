<template>
    <div class="">
        <form @submit.prevent="signup" class="form w-96 mx-auto border-2 border-gray-200 shadow-xl p-4">
            <div class="header">
                <h2 class="text-center text-[#313131] font-[500] text-xl"> Signup </h2> 
                
                <div class="flex flex-col my-4">
                    <div class="mt-4 w-full">
                        <label for="name" class="text-[#31311] font-[500] text-[16px]"> Name </label>
                        <input type="text" v-model="form.name" 
                        class="form-input w-full" 
                        :class="{'error':errors.name}"
                        placeholder="Enter your name">
                    </div> 
                    <p v-if="errors.name" class="text-red-500 font-semibold">{{ errors.name[0] }} </p>
                    <div class="mt-4 w-full">
                        <label for="email" class="text-[#31311] font-[500] text-[16px]"> Email </label>
                        <input type="text" v-model="form.email" 
                        class="form-input w-full" 
                        :class="{'error':errors.email}"
                        placeholder="Enter your email">
                    </div>
                    <p v-if="errors.email" class="text-red-500 font-semibold">{{ errors.email[0] }} </p>
                    <div class="mt-4 w-full">
                        <label for="password" class="text-[#313131] font-[500] text-[16px]"> Password </label>
                        <input type="password" v-model="form.password" class="form-input w-full"
                        :class="{'error':errors.password}">
                    </div>

                    <div class="mt-4 w-full">
                        <label for="password" class="text-[#313131] font-[500] text-[16px]"> Confirm Password </label>
                        <input type="password" v-model="form.password_confirmation" class="form-input w-full">
                    </div>
                    <p v-if="errors.password" class="text-red-500 font-semibold">{{ errors.password[0] }} </p>
                </div>

                <div class="mt-8">
                    <button type="submit" class="px-8 py-2 bg-green-800 text-white font-semibold text-xl leading-8 rounded-md text-center w-full"> Signup </button>
                </div>

                <p class="mt-8 mb-4 text-[#313131] font-[400]"> Already have an account !
                    <router-link :to="{name:'login'}" class="text-green-800 font-xl "> Login Here </router-link> 
                </p>
            </div>
        </form>
    </div>
</template>

<script>
export default{
    data(){
        return{
            form:{},
            errors:'',
        }
    },

    created(){
        if(User.loggedIn()){
            this.$router.push({name:'profile'})
        }
    },
    methods:{
        signup(){
            axios.post('/api/auth/signup',this.form)
            .then(res =>{
                User.responseAfterLogin(res)
                this.$router.push({name:'profile'})
            })
            .catch(errors => console.log(errors))
        }
    }
}
</script>