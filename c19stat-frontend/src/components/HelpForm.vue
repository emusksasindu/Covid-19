<template>
  <form @submit.prevent="handleSubmit" class="my-4 form-container">
    <div class="form-group mt-3">
      <input
        v-model="title"
        type="text"
        id="title"
        class="form-control input-help"
        placeholder="Title"
        required
      />
    </div>
    <div class="form-group mt-3">
      <textarea
        v-model="description"
        id="description"
        class="form-control input-help"
        placeholder="Description"
        required
      ></textarea>
    </div>
    <button type="submit" class="btn btn-primary">
      {{ editingHelp ? "Update" : "Save" }}
    </button>
  </form>
</template>

<script>
import axios from "axios";

export default {
  props: {
    editingHelp: {
      type: Boolean,
      default: false,
    },
    editedHelpId: {
      type: String,
      default: "",
    },
    editedTitle: {
      type: String,
      default: "",
    },
    editedDescription: {
      type: String,
      default: "",
    },
  },
  data() {
    return {
      title: "",
      description: "",
    };
  },
  mounted() {
    this.title = this.editedTitle;
    this.description = this.editedDescription;
  },
  watch: {
    editedTitle(newTitle) {
      this.title = newTitle;
    },
    editedDescription(newDescription) {
      this.description = newDescription;
    },
  },
  methods: {
    async handleSubmit() {
      if (this.editingHelp) {
        await this.updateHelp();
      } else {
        await this.saveHelp();
      }
    },
    async saveHelp() {
      try {
        const response = await axios.post("http://127.0.0.1:8000/api/help", {
          title: this.title,
          description: this.description,
        });
        this.$emit("help-saved", response.data.data);
        this.title = "";
        this.description = "";
      } catch (error) {
        console.log(error.response);
        this.$emit("help-save-error");
      }
    },
    async updateHelp() {
      try {
        const response = await axios.put(
          `http://127.0.0.1:8000/api/helps/${this.editedHelpId}`,
          {
            title: this.title,
            description: this.description,
          }
        );
        this.$emit("help-saved", response.data.data);
        this.title = "";
        this.description = "";
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
