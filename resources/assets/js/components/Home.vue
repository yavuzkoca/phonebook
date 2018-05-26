<template xmlns:v-bind="http://www.w3.org/1999/xhtml">
    <div>
        <nav class="panel column is-offset-2 is-8">
            <p class="panel-heading">
                VueJS Phone Book App
                <button class="button is-link is-outlined" @click="openAdd">
                    Add New
                </button>
                <span class="is-pulled-right" v-if="loading">
                    <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>
                </span>
            </p>
            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input is-small" type="text" placeholder="search"
                    v-model="searchQuery"
                    >
                    <span class="icon is-small is-left">
                    <i class="fas fa-search" aria-hidden="true"></i>
                    </span>
                </p>
            </div>
            <a class="panel-block" v-for="item,key in temp">
                <span class="column is-9">
                    {{ item.name }}
                </span>
                    <span class="panel-icon column is-1">
                    <i class="fas fa-trash has-text-danger" @click="del(key,item.id)"></i>
                </span>
                    <span class="panel-icon column is-1">
                    <i class="fas fa-edit has-text-warning" @click="openUpdate(key)"></i>
                </span>
                    <span class="panel-icon column is-1">
                    <i class="fas fa-eye has-text-info" @click="openShow(key)"></i>
                </span>
            </a>
            <v-paginator :options="options" :resource_url="resource_url" @update="updateResource"></v-paginator>
        </nav>
        <add v-bind:openModal="addActive" @closeRequest="close"></add>
        <show v-bind:openModal="showActive" :list="list" @closeRequest="close"></show>
        <update v-bind:openModal="updateActive" :list="list" @closeRequest="close"></update>
        <del-modal v-bind:openModal="delActive" :key="key" :list="list" @closeRequest="close" @delRequest="removeItem(key)"></del-modal>
    </div>
</template>

<script>
    let Add = require('./Add.vue');
    let Show = require('./Show.vue');
    let Update = require('./Update.vue');
    let Del = require('./Delete.vue');
    import Vue from 'vue'
    import VueResource from 'vue-resource'
    import VuePaginator from 'vuejs-paginator'

    Vue.use(VueResource);

    export default {
        components: {
            'add': Add,
            'show': Show,
            'update': Update,
            'del-modal': Del,
            VPaginator: VuePaginator
        },
        data() {
            return {
                addActive: '',
                showActive: '',
                updateActive: '',
                delActive: '',
                lists: {

                },
                temp: {

                },
                list: {

                },
                key: '',
                searchQuery: '',
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
                },
                loading: false
            }
        },
        mounted(){
            axios.get(this.resource_url)
                .then((response) => {
                    this.lists = this.temp = response.data.data;
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
                this.updateActive = false;
                this.delActive = false;
            },
            updateResource(data){
                this.lists = data
            },
            openShow(key){
                this.list = this.lists[key];
                this.showActive = 'is-active';
            },
            openUpdate(key){
                this.list = this.lists[key];
                this.updateActive = 'is-active';
            },
            del(key, id){
                this.list = this.lists[key];
                this.delActive = 'is-active';
                this.key = key;
            },
            removeItem(key){
                this.lists.splice(key, 1);
            }
        },
        watch: {
            searchQuery(){
                if(this.searchQuery.length > 0){
                    this.temp = this.lists.filter((item) => {
                        return Object.keys(item).some((key) => {
                            let st = String(item[key]);
                            return st.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1;
                        });
                        // return item.name.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1;
                    })
                }else{
                    this.temp = this.lists;
                }
            }
        }
    }
</script>

<style>

</style>