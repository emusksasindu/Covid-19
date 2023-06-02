<template>
  <form @submit.prevent="saveHelp" class="my-4 form-container">
    <div class="form-group mt-3">
      <input
        v-model="help.title"
        type="text"
        id="title"
        class="form-control input-help"
        placeholder="title"
        required
      />
    </div>
    <div class="form-group mt-3">
      <textarea
        v-model="help.description"
        id="description"
        class="form-control input-help"
        placeholder="description"
        required
      ></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</template>
  
  <script>
import axios from "axios";

export default {
  data() {
    return {
      help: {
        title: "",
        description: "",
      },
    };
  },
  methods: {
    async saveHelp() {
      try {
        const response = await axios.post(
          "http://127.0.0.1:8000/api/help",
          this.help
        );
        this.$emit("help-saved", response.data.data);
        this.help = {
          title: "",
          description: "",
        };
      } catch (error) {
        console.log(error.response);
        this.$emit("help-save-error");
      }
    },
  },
};
</script>
  
  <style>
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

.btn {
  margin-top: 0.5rem;
}
</style>
  