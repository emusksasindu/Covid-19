<template>
    <v-container>
      <v-card>
        <v-card-title>Register</v-card-title>
        <v-card-text>
          <v-form @submit.prevent="registerUser">
            <v-text-field v-model="name" label="Name"></v-text-field>
            <v-text-field v-model="email" label="Email"></v-text-field>
            <v-text-field v-model="password" label="Password" type="password"></v-text-field>
            <v-text-field v-model="confirmPassword" label="Confirm Password" type="password"></v-text-field>
            <v-btn type="submit" color="primary">Register</v-btn>
          </v-form>
        </v-card-text>
      </v-card>
    </v-container>
  </template>
  
  <script>
  export default {
    data() {
      return {
        name: '',
        email: '',
        password: '',
        confirmPassword: ''
      };
    },
    methods: {
      registerUser() {
        // Perform registration logic here
        // You can access form values using this.name, this.email, etc.
        console.log('Registering user...');
      }
    }
  };
  </script>
  