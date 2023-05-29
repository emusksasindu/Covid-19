import { createRouter, createWebHistory } from 'vue-router';
import HomePage from './pages/HomePage.vue';
import HelpPage from './pages/HelpPage.vue';
import RegisterPage from './pages/RegisterPage.vue';
import LoginPage from './pages/LoginPage.vue';
import authMiddleware from './middleware/authMiddleware'; 

const routes = [
  { path: '/', component: HomePage },
  { path: '/help', component: HelpPage },
  { path: '/register', component: RegisterPage },
  { path: '/login', component: LoginPage },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  authMiddleware(to, from, next);
});

export default router;
