import { createStore } from "vuex";

const store = createStore({
  state() {
    return {
      user: null,
    };
  },
  mutations: {
    setUser(state, user) {
      state.user = user;
    },
  },
});

// Load user state from session storage when the Vuex store initializes
const userState = JSON.parse(window.sessionStorage.getItem("userState"));
if (userState) {
  store.commit("setUser", userState);
}

// Save user state to session storage when the user state changes
store.watch(
  (state) => state.user,
  (userState) => {
    window.sessionStorage.setItem("userState", JSON.stringify(userState));
  },
  {
    deep: true, // Enable deep watching to track nested changes
  }
);

export default store;
