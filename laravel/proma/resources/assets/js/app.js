require("./bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";
import VModal from 'vue-js-modal'
// import Vuelidate from "vuelidate";


// window.Vue.use(Vuelidate);
window.Vue.use(VModal);
window.Vue.use(VueRouter);
// validator.isEmail('foo@bar.com');
// Vue.component('b-modal', bModal);

import DataIndex from "./components/DataIndex.vue";
import DataCreate from "./components/DataCreate.vue";
import DataScore from "./components/DataScore.vue";
// import bModal from 'bootstrap-vue/es/components/modal/modal';
// import CompaniesEdit from './components/companies/CompaniesEdit.vue';

const routes = [{
        path: "/",
        components: {
            DataIndex: DataIndex
        }
    },
    {
        path: "/projects",
        component: DataCreate,
        name: "dataCreate"
    },
    {
        path: "/admin/score",
        component: DataScore,
        name: 'dataScore'
    },
];

const router = new VueRouter({
    // mode: 'history',
    routes: routes
});

const app = new Vue({
    router
}).$mount("#app");