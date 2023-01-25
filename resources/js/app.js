import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import UserList from './components/UserList.vue';
app.component('user-list', UserList);

app.mount('#app');
