<template>
  <div id="app">
    <NavigationBar />
    <router-view /> <!-- Render the current route component -->
  </div>
</template>

<script>
import NavigationBar from './components/nav.vue'

export default {
  name: 'App',
  components: {
    NavigationBar
  }
}
</script>

<style>
@import 'bootstrap/dist/css/bootstrap.css';
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 50px;
  
}
</style>
