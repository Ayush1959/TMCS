require("./bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";
import VModal from 'vue-js-modal'
import Vuelidate from "vuelidate";


window.Vue.use(Vuelidate);
window.Vue.use(VModal);
window.Vue.use(VueRouter);
Vue.prototype.$Url = window.location.origin + "/";
// Vue.component('pagination', require('laravel-vue-pagination'));
// validator.isEmail('foo@bar.com');
// Vue.component('b-modal', bModal);

import DataIndex from "./components/DataIndex.vue";
import DataCreate from "./components/DataCreate.vue";
import UserData from "./components/DataRead.vue";
import Table from "./components/Table.vue";
import DataScore from "./components/DataScore.vue";
// import bModal from 'bootstrap-vue/es/components/modal/modal';
// import CompaniesEdit from './components/companies/CompaniesEdit.vue';

const routes = [{
        path: "/test",
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
        path: "/",
        component: UserData,
        name: 'dataRead'
    },
    {
        path: "/admin/score/edit",
        component: DataScore,
        name: 'dataScore'
    },
    {
        path: "/table",
        component: Table,
        name: 'table'
    },
];


Vue.component('task', require('./components/DataRead.vue'));
const router = new VueRouter({
    // mode: 'history',
    routes: routes
});

const app = new Vue({
    router
}).$mount("#app");