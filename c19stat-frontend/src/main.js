import { createApp } from 'vue';
import App from './App.vue';
import NavigationBar from './components/nav.vue';
import router from './router'; // Import the router from router.js
import store from './store';

const app = createApp(App);
app.use(router);
app.use(store);

app.component('NavigationBar', NavigationBar); // Register NavigationBar globally
app.mount('#app');
