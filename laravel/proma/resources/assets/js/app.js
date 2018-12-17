require("./bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";
import VModal from 'vue-js-modal';
import Vuelidate from "vuelidate";
import VueGraph from 'vue-graph';
import GraphLine3D from 'vue-graph/src/components/line3d.js';
import NoteWidget from 'vue-graph/src/widgets/note.js';
import LegendWidget from 'vue-graph/src/widgets/legends.js';



window.Vue.component(GraphLine3D.name, GraphLine3D);
window.Vue.component(NoteWidget.name, NoteWidget);
window.Vue.component(LegendWidget.name, LegendWidget);
window.Vue.use(Vuelidate);
window.Vue.use(VueGraph);
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