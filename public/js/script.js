const app = Vue.createApp({
  data() {
    return {
      showitme: true,
      name: "mohammed",
    };
  },
  methods: {
    toggleshow() {
      this.showitme = !this.showitme;
    },
  },
}).mount("#app");
