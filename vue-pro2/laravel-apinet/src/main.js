import Vue from 'vue'
import App from './App.vue'

Vue.use(window.vuelidate.default);
export const EventBus = new Vue();

new Vue({
  el: '#app',
  render: h => h(App)
})
