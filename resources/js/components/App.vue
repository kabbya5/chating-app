<template>
    <div>
        <Navbar/>
        <div class="my-20">
            <router-view :key="$route.fullPath"> </router-view>   
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