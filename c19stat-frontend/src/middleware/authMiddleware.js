import store from '@/store';

export default function authMiddleware(to, from, next) {
    const user = store.state.user;
  
    if (user && to.path === '/login') {
      // User is already logged in and trying to access the login page, redirect to the root path
      next('/');
    } else if (user) {
      // User is already logged in, redirect to another page
      next();
    } else {
      // User is not logged in, proceed to the requested page
      next();
    }
  }
  