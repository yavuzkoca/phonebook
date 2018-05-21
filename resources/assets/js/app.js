require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

import Vue from 'vue'
import VueRouter from './routes.js'

let MyHeader = require('./components/MyHeader.vue');
let MyFooter = require('./components/MyFooter.vue');



const app = new Vue({
    el: '#app',
    components:{
        'my-header' : MyHeader,
        'my-footer' : MyFooter
    },
    router: VueRouter
});
