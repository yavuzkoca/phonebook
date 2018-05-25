<template xmlns:v-bind="http://www.w3.org/1999/xhtml">
    <div class="modal" v-bind:class="openModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Add New Entry</p>
                <button class="delete" aria-label="close" @click="close"></button>
            </header>
            <section class="modal-card-body">
                <p class="is-text-danger">
                    Do you really want to delete this record?
                </p>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-danger" @click="del">Delete</button>
                <button class="button" @click="close">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        components: {},
        props: ['openModal','list'],
        data() {
            return{
                errors: {
                },
                message: ''
            }
        },
        methods: {
            close() {
                this.$emit('closeRequest')
            },
            del(){
                axios.delete(`/phonebook/${this.list.id}`, this.list)
                    .then((response) => {
                        console.log(response);
                        this.$emit('delRequest');
                        this.close();
                        this.errors = {};
                    })
                    .catch((error) => {
                        error.response.data.errors ? this.errors = error.response.data.errors : '';
                        this.message = error.response.data.message;
                    })
            }
        }
    }
</script>

<style>

</style>