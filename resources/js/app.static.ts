import { createApp } from 'vue';
import '../css/app.css';
import App from './static/App.vue';
import { router } from './static/router';

const app = createApp(App);
app.use(router);
app.mount('#app');
