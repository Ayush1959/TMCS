import Vue from 'vue'
import ElementUI from 'element-ui';
// import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);

import App from './App-upload.vue'

new Vue({
  el: '#app',
  render: h => h(App)
})
