<template>
    <div>
        <Navbar/>
        <div class="container mx-auto">
            <div class="my-20 px-4">
                <router-view :key="$route.fullPath"> </router-view>   
            </div>
        </div>
        
        
        <FooterVue />  
    </div>
</template>
<script>
import Navbar from './Navbar.vue';
import FooterVue from './Footer.vue';
export default{
    name: "App",
    components:{
        Navbar,
        FooterVue,
    },
}
</script>