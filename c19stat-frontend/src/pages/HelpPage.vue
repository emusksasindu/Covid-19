<template>
  <div class="help-container">
    <h1 class="mt-5 mb-4">Help & Guides</h1>

    <!-- Form to save help details -->
    <form v-if="$store.state.user" @submit.prevent="saveHelp" class="my-4 form-container">
      <div class="form-group mt-3">
        <input v-model="help.title" type="text" id="title" class="form-control input-help" placeholder="title" required>
      </div>
      <div class="form-group mt-3">
        <textarea v-model="help.description" id="description" class="form-control input-help" placeholder="description" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>

    <!-- Form message display -->
    <div v-if="formMessage" class="alert alert-info mt-4 mb-4" role="alert">{{ formMessage }}</div>

    <!-- List of help objects displayed as glass-look cards -->
    <div class="card-container">
      <div v-if="helpList.length === 0" class="alert alert-info no-records-message mt-4 mb-4" role="alert">No records found.</div>
      <div v-else>
        <div v-for="help in helpList" :key="help.id" class="card bg-light mb-4">
          <div class="card-body">
            <h3 class="card-title">{{ help.title }}</h3>
            <p class="card-text">{{ help.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>



<script>
import axios from 'axios';

export default {
  name: 'HelpPage',
  data() {
    return {
      formMessage: '',
      helpList: [],
      help: {
        title: '',
        description: '',
      },
    };
  },
  mounted() {
    this.getHelpList();
  },
  methods: {
    async saveHelp() {
  try {
    const response = await axios.post('http://127.0.0.1:8000/api/help', this.help);
    this.formMessage = response.data.message;
    this.helpList.push(response.data.data);
    this.help = {
      title: '',
      description: '',
    };
  } catch (error) {
    console.log(error.response);
    this.formMessage = 'Failed to save help.';
  }
},
    async getHelpList() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/help');
        this.helpList = response.data.data;
        this.listMessage = this.helpList.length === 0 ? 'No records found.' : '';
      } catch (error) {
        this.listMessage = 'Failed to fetch help records.';
      }
    },
  },
};
</script>
<style>
.help-container {
  margin: 0 auto;
  padding: 20px;
  max-width: 600px;
}

.my-4 {
  margin-top: 1rem;
  margin-bottom: 1rem;
}

.form-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
}

.input-help {
  width: 600px;
  max-width: 600px;
  margin-bottom: 10px;
}

.card-text,
.card-title {
  text-align: left;
}

.btn {
  margin-top: 0.5rem;
}
</style>

