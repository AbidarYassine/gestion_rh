/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import AddPaie from './components/AddPaie.vue';
import PaieVue from './components/PaieVue.vue';
const routes = [
    { path: '/paie', component: PaieVue },
    { path: '/addPaie', component: AddPaie }
]
const router = new VueRouter({
    routes // short for `routes: routes`
});

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const app = new Vue({
    el: '#app',
    router,
});