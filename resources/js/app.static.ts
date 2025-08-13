import { createApp } from 'vue';
import './css/app.css';
import StaticDemo from './components/StaticDemo.vue';

// Create a simple Vue app for static demo
const app = createApp(StaticDemo);
app.mount('#app');
