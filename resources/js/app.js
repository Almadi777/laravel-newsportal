require('./bootstrap');

import { createApp } from 'vue'
import Main from './main.vue'

const app = createApp(Main)

app.component('main', require('./main.vue').default);

app.mount('#app');


