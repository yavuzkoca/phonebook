<template>
    <div class="modal" v-bind:class="openModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete" aria-label="close" @click="close"></button>
            </header>
            <section class="modal-card-body">
                <li class="panel-block">
                    <label class="column is-2">
                        <p><b>Name:</b></p>
                    </label>
                    {{ list.name }}
                </li>
                <li class="panel-block">
                    <label class="column is-2">
                        <p><b>Phone:</b></p>
                    </label>
                    {{ list.phone }}
                </li>
                <li class="panel-block">
                    <label class="column is-2">
                        <p><b>Email:</b></p>
                    </label>
                    {{ list.email }}
                </li>
            </section>
            <footer class="modal-card-foot">
                <button class="button" @click="close">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        components: {},
        props: ['openModal', 'list'],
        data() {
            return {

            }
        },
        methods: {
            close() {
                this.$emit('closeRequest')
            }
        }
    }
</script>

<style>

</style>