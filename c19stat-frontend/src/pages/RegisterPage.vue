<template>
  <div class="centered-container">
    <div class="container register-container">
      <h1 class="mt-5 mb-3 topic">Register User</h1>
      <form @submit.prevent="registerUser">
        <div v-if="message" :class="{ 'mt-3': true, 'text-danger': message !== 'Registration successful!', 'text-primary': message === 'Registration successful!' }">
          {{ message }}
        </div>
        <div class="form-group margin-bottom">
          
          <input v-model="name" type="text" class="form-control mb-3" id="name" placeholder="Enter your name">
        </div>
        <div class="form-group margin-bottom">
          
          <input v-model="email" type="email" class="form-control mb-3" id="email" placeholder="Enter your email address">
        </div>
        <div class="form-group margin-bottom">
         
          <input v-model="password" type="password" class="form-control mb-3" id="password" placeholder="Enter your password">
        </div>
        <div class="form-group margin-bottom">
         
          <input v-model="confirmPassword" type="password" class="form-control mb-3" id="confirm-password" placeholder="Confirm your password">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Signup</button>
      </form>
      <div class="mt-3">
        <router-link class="btn btn-outline-primary btn-block" to="/login">Login</router-link>
      </div>
     
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'RegisterPage',
  data() {
    return {
      name: '',
      email: '',
      password: '',
      confirmPassword: '',
      message: '',
    };
  },
  methods: {
    async registerUser() {
      // Perform input validation
      if (!this.name || !this.email || !this.password || !this.confirmPassword) {
        this.message = 'Please fill in all fields.';
        return;
      }
      if (this.password !== this.confirmPassword) {
        this.message = 'Passwords do not match.';
        return;
      }

      // Make API request to register user
      try {
        await axios.post('http://127.0.0.1:8000/api/register', {
          name: this.name,
          email: this.email,
          password: this.password,
        });
        
        // Registration successful
        this.message = 'Registration successful!';
        // You can redirect the user to another page here if needed
      } catch (error) {
        // Registration failed
        if (error.response && error.response.data && error.response.data.message) {
          this.message = error.response.data.message;
        } else {
          this.message = 'An error occurred. Please try again later.';
        }
      }
    }
  }
}
</script>

<style>
.centered-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.register-container {
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

.btn {
  width: 10rem;
}

.topic {
  color: #ffffff;
}
</style>
