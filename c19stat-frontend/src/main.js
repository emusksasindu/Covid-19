import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import 'vuetify/dist/vuetify.css';
import { createVuetify } from 'vuetify';

const app = createApp(App);
app.use(router);
app.use(store);

const vuetify = createVuetify();

app.use(vuetify);

app.mount('#app');
