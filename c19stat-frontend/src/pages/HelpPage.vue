<template>
  <div class="help-container">
    <h1 class="mt-5 mb-4">Help & Guides</h1>

    <!-- Form to save help details -->
    <HelpForm @help-saved="onHelpSaved" @help-save-error="onHelpSaveError" v-if="$store.state.user" class="my-4 form-container" />

    <!-- Form message display -->
    <div v-if="formMessage" class="alert alert-info mt-4 mb-4" role="alert">{{ formMessage }}</div>

    <!-- List of help objects displayed as glass-look cards -->
    <div class="card-container">
      <div v-if="helpList.length === 0" class="alert alert-info no-records-message mt-4 mb-4" role="alert">No records found.</div>
      <div v-else>
        <HelpCard v-for="help in helpList" :key="help.id" :help="help" />
      </div>
    </div>
  </div>
</template>

<script>
import HelpForm from '../components/HelpForm.vue';
import HelpCard from '../components/HelpCard.vue';
import axios from 'axios';

export default {
  name: 'HelpPage',
  components: {
    HelpForm,
    HelpCard,
  },
  data() {
    return {
      formMessage: '',
      helpList: [],
    };
  },
  mounted() {
    this.getHelpList();
  },
  methods: {
    onHelpSaved(help) {
      this.formMessage = 'Help saved successfully.';
      this.helpList.push(help);
    },
    onHelpSaveError() {
      this.formMessage = 'Failed to save help.';
    },
    async getHelpList() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/help');
        this.helpList = response.data.data;
      } catch (error) {
        this.formMessage = 'Failed to fetch help records.';
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

.card-container {
  margin-top: 1rem;
}

.no-records-message {
  margin-top: 1rem;
  margin-bottom: 1rem;
}

.alert-info {
  margin-top: 1rem;
  margin-bottom: 1rem;
}

.alert-info.role-alert {
  margin-top: 1rem;
  margin-bottom: 1rem;
}

.card-text,
.card-title {
  text-align: left;
}
</style>
