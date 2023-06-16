<template>
    <div>
        <i @click="showNotification" class="fa-solid fa-bell text-[24px] text-red-800"> 
            <sup v-if="countNotification" class="text-sm text-gray-700"> {{ countNotification }} </sup>
        </i>
        <div v-if="show" class="flex pt-2  flex-col fixed bg-gray-200 mt-2">
            <div v-for="item in notification.unread" :key="item.id" class="px-4 pb-2 border-b-2 border-gray-300">
                <router-link @click="showNotification" :to="{name:'question_details',params:{slug:item.data.slug}}">
                    {{ item.data.question }}
                </router-link>
            </div>
        </div>
    </div>
    
</template>

<script>
export default{
    data(){
        return{
            show:false,
            notification:{},
            countNotification:false,
        }
    },
    created(){
        if(User.loggedIn()){
            this.getNotifications()
        }
    },
    methods:{
        getNotifications(){
            axios.post('/api/notifications')
            .then( res => {
                this.notification = res.data,
                this.countNotification = res.data.unread.length;
            });
        },
        showNotification(){
            this.show = !this.show
        },
        
    }
}
</script>