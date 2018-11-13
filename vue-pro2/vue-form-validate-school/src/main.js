import Vue from 'vue'
// import Vuelidate from 'vuelidate'
import App from './App.vue'
Vue.use(window.vuelidate.default);
new Vue({
  el: '#app',
  render: h => h(App)
})
