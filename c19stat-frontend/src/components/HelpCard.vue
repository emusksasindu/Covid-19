<template>
  <div class="card bg-light mb-4">
    <div class="card-body">
      <h3 class="card-title">{{ help.title }}</h3>
      <p class="card-text">{{ help.description }}</p>
    </div>
  </div>
</template>
  
  <script>
export default {
  props: {
    help: {
      type: Object,
      required: true,
    },
  },
};
</script>
  
  <style scoped>
.card-text,
.card-title {
  text-align: left;
}
</style>
  