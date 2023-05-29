<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <router-link class="navbar-brand" to="/">Covid 19 Statistics</router-link>
      <button class="navbar-toggler" type="button" @click="toggleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" :class="{ 'show': isNavbarOpen }">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link class="nav-link" to="/">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/help">Help &amp; Guide</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" v-if="!user" to="/login">Login</router-link>
            <a class="nav-link" v-else @click="logout" style="cursor: pointer">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div v-if="message" :class="{ 'text-primary': message === 'Login success' }" class="mt-3">
    {{ message }}
  </div>
</template>

<script>
export default {
  name: 'NavigationBar',
  data() {
    return {
      isNavbarOpen: false
    };
  },
  computed: {
    user() {
      return this.$store.state.user;
    },
    message() {
      return this.$store.state.message;
    }
  },
  methods: {
    toggleNavbar() {
      this.isNavbarOpen = !this.isNavbarOpen;
    },
    logout() {
      // Perform logout logic here
      // For example, clear the user state and message in the store
      this.$store.commit('setUser', null);
      this.$store.commit('setMessage', null);
      // You can also perform any additional logout actions if needed
    }
  }
};
</script>

<style scoped>
.navbar {
  margin-bottom: 0; /* Remove the bottom margin */
}
</style>
