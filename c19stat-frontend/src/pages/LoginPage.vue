<template>
  <div class="centered-container">
    <div class="container login-container">
    <h1 class="mt-5 mb-3 topic">Login</h1>
    <form @submit.prevent="loginUser">
      <div v-if="message" :class="{ 'text-primary': message === 'Login Success!', 'text-danger': message !== 'Login Success!' }" class="mt-3">
        {{ message }}
      </div>
      <div class="form-group margin-bottom">
        <input v-model="email" type="email" class="form-control mb-3" id="email" placeholder="Enter your email address">
      </div>
      <div class="form-group margin-bottom">
        <input v-model="password" type="password" class="form-control mb-3" id="password" placeholder="Enter your password">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
    <div class="mt-3">
      <router-link class="btn btn-outline-primary btn-block" to="/register">Signup</router-link>
    </div>
  </div>
  </div>
  
</template>


  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'LoginPage',
    data() {
      return {
        email: '',
        password: '',
        message: '',
      };
    },
    methods: {
      async loginUser() {
        // Perform input validation
        if (!this.email || !this.password) {
          this.message = 'Please fill in all fields.';
          return;
        }
  
        // Make API request to login user
        try {
          const response = await axios.post('http://127.0.0.1:8000/api/login', {
            email: this.email,
            password: this.password,
          });
  
          // Login successful
          this.$store.commit('setUser', response.data.user);
          this.message = response.data.message;
          // You can redirect the user to another page here if needed
          this.$router.push('/');
        } catch (error) {
          // Login failed
          if (error.response && error.response.data && error.response.data.message) {
            this.message = error.response.data.message;
          } else {
            this.message = 'An error occurred. Please try again later.';
          }
        }
      },
    },
  };
  </script>
  
  
  <style>
  .centered-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  
}

.login-container {
  max-width: 600px;
  margin: 0 auto;
  width: 30rem;
  height: fit-content;
  background: rgba(0, 0, 0, 0.84);
  border-radius: 10px;
  backdrop-filter: blur(10px);
  padding: 2rem;
}

  
  .margin-bottom {
    margin-bottom: 0.5rem;
  }

  .btn{
    width: 10rem;
  }

  .topic{
    color: #ffffff;
  }
  </style>