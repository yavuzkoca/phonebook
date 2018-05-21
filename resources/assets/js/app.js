require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);

let MyHeader = require('./components/MyHeader.vue');
let MyFooter = require('./components/MyFooter.vue');
let About = require('./components/About.vue');
let Home = require('./components/Home.vue');

const routes = [
    { path: "/home", component: Home},
    { path: "/about", component: About}
];

const router = new VueRouter({
    routes,
    mode: "history"
});

const app = new Vue({
    el: '#app',
    components:{
        'my-header' : MyHeader,
        'my-footer' : MyFooter
    },
    router
});
