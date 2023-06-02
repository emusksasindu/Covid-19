<template>
  <div class="card bg-light mb-4">
    <div class="card-body">
      <h3 class="card-title">{{ help.title }}</h3>
      <p class="card-text">{{ help.description }}</p>
      <div class="button-group" v-if="isUserLoggedIn && !editing">
        <button class="btn btn-danger delete-button" @click="deleteHelp">
          <i class="fa fa-trash"></i>
        </button>
        <button class="btn btn-primary edit-button" @click="editHelp(help)">
          <i class="fas fa-pencil-alt"></i>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { mapState } from 'vuex';

export default {
  props: {
    help: {
      type: Object,
      required: true,
    },
  },
  computed: {
    ...mapState(['user']),
    isUserLoggedIn() {
      return this.user !== null;
    },
  },
  methods: {
    deleteHelp() {
      if (this.isUserLoggedIn) {
        axios
          .delete(`http://127.0.0.1:8000/api/helps/${this.help.id}`)
          .then(() => {
            this.$emit('help-deleted');
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    editHelp() {
      if (this.isUserLoggedIn) {
        this.$emit('edit-help', this.help, this.help.id);
      }
    },
  },
};
</script>




<style scoped>
.card {
  border-radius: 0.25rem;
  border: 1px solid rgba(0, 0, 0, 0.125);
  background-color: #f8f9fa;
}

.card-title {
  font-size: 1.25rem;
  margin-bottom: 0.5rem;
}

.card-text {
  margin-bottom: 1rem;
}

.button-group {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  position: absolute;
  top: 0.5rem;
  right: 0.5rem;
}

.delete-button {
  margin-bottom: 0.5rem;
  padding: 0.25rem;
  width: 2rem;
}

.edit-button {
  padding: 0.25rem;
  width: 2rem;
}

</style>
