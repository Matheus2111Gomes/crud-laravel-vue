import { createApp } from 'vue';
import FormPerson from './components/FormPerson.vue';
const app = createApp({});

//register the component
app.component('FormPerson', FormPerson);

//..HTML element to mount the Vue application
app.mount('#app');

require('./bootstrap');