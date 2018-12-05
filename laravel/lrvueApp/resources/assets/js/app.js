/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";
import Vuelidate from "vuelidate";


window.Vue.use(Vuelidate);
window.Vue.use(VueRouter);
// validator.isEmail('foo@bar.com');

import DataIndex from "./components/DataIndex.vue";
import DataCreate from "./components/DataCreate.vue";
// import CompaniesEdit from './components/companies/CompaniesEdit.vue';

const routes = [{
        path: "/",
        components: {
            DataIndex: DataIndex
        }
    },
    {
        path: "/admin/companies/create",
        component: DataCreate,
        name: "dataCreate"
    }
    // {
    //     path: '/admin/companies/edit/:id',
    //     component: CompaniesEdit,
    //     name: 'editCompany'
    // },
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    router
}).$mount("#app");