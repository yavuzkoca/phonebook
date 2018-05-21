import Vue from 'vue'
import Router from 'vue-router'


let About = require('./components/About.vue');
let Home = require('./components/Home.vue');

Vue.use(Router);


const routes = [
    { path: "/home", component: Home},
    { path: "/about", component: About}
];

const router = new Router({
    routes,
    mode: 'history'
});

export default router