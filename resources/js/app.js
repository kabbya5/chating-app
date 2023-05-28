import './bootstrap';
import {createApp} from 'vue';

import App from './components/App.vue';
import router from './router';

import User from './Helpers/User'

window.User = User 

const app = createApp({});
app.component('App',App);
app.use(router);
app.use(User);
app.mount('#app');





