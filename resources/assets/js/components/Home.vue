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
            <a class="panel-block">
            <span class="column is-9">
                Yavuz Koca
            </span>
                <span class="panel-icon column is-1">
                <i class="fas fa-trash has-text-danger"></i>
            </span>
                <span class="panel-icon column is-1">
                <i class="fas fa-edit has-text-warning"></i>
            </span>
                <span class="panel-icon column is-1">
                <i class="fas fa-eye has-text-info"></i>
            </span>

            </a>
        </nav>
        <add v-bind:openModal="addActive" @closeRequest="close"></add>
    </div>
</template>

<script>
    let Add = require('./Add.vue');

    export default {
        components: {
            'add' : Add
        },
        data() {
            return {
                addActive : ''
            }
        },
        methods: {
            openAdd(){
                this.addActive = 'is-active';
            },
            close(){
                this.addActive = false;
            }
        }
    }
</script>

<style>

</style>