<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
            <p class="panel-heading">
                VueJS Phone Book App
                <button class="button is-link is-outlined" @click="openAdd">
                    Add New
                </button>
            </p>
            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input is-small" type="text" placeholder="search">
                    <span class="icon is-small is-left">
                    <i class="fas fa-search" aria-hidden="true"></i>
                    </span>
                </p>
            </div>
            <a class="panel-block" v-for="item,key in lists">
                <span class="column is-9">
                    {{ item.name }}
                </span>
                    <span class="panel-icon column is-1">
                    <i class="fas fa-trash has-text-danger"></i>
                </span>
                    <span class="panel-icon column is-1">
                    <i class="fas fa-edit has-text-warning"></i>
                </span>
                    <span class="panel-icon column is-1">
                    <i class="fas fa-eye has-text-info" @click="openShow(key)"></i>
                </span>
            </a>
            <v-paginator :options="options" :resource_url="resource_url" @update="updateResource"></v-paginator>
        </nav>
        <add v-bind:openModal="addActive" @closeRequest="close"></add>
        <show v-bind:openModal="showActive" :list="list" @closeRequest="close"></show>
    </div>
</template>

<script>
    let Add = require('./Add.vue');
    let Show = require('./Show.vue');
    import Vue from 'vue'
    import VueResource from 'vue-resource'
    import VuePaginator from 'vuejs-paginator'

    Vue.use(VueResource);

    export default {
        components: {
            'add': Add,
            'show': Show,
            VPaginator: VuePaginator
        },
        data() {
            return {
                addActive: '',
                showActive: '',
                lists: {

                },
                list: {

                },
                errors: {

                },
                message: '',

                // Pagination part
                resource_url: '/pagination',
                options: {
                    remote_data: 'data',
                    remote_current_page: 'current_page',
                    remote_last_page: 'last_page',
                    remote_next_page_url: 'next_page_url',
                    remote_prev_page_url: 'prev_page_url',
                    next_button_text: 'Go Next',
                    previous_button_text: 'Go Back',
                    page_numbers: true,
                    max_buttons: 7
                }
            }
        },
        mounted(){
            axios.get(this.resource_url)
                .then((response) => {
                    this.lists = response.data.data;
                })
                .catch((error) => {
                    error.response.data.errors ? this.errors = error.response.data.errors : '';
                    this.message = error.response.data.message;
                })
        },
        methods: {
            openAdd(){
                this.addActive = 'is-active';
            },
            close(){
                this.addActive = false;
                this.showActive = false;
            },
            updateResource(data){
                this.lists = data
            },
            openShow(key){
                console.log(this.$children);
                this.list = this.lists[key];
                this.showActive = 'is-active';
            }
        }
    }
</script>

<style>

</style>