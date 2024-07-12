import './bootstrap';
import { createApp } from 'vue';
import Register from '@/components/Register.vue';
import List from '@/components/List.vue';
import Content from '@/components/Content.vue';

import './axios.js'


const app = createApp({});

app.component('Register', Register);
app.component('List', List);
app.component('Content', Content);



app.mount('#app');

//createApp(FormPerson).mount("#app");
