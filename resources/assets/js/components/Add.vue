<template>
    <div class="modal" v-bind:class="openModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete" aria-label="close" @click="close"></button>
            </header>
            <section class="modal-card-body">
                <small class="has-text-danger" v-if="message">{{ message }}</small>
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Enter your name"
                               v-model="list.name"
                               :class="{'is-danger':errors.name}"
                        >
                    </div>
                    <small class="has-text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                </div>
                <div class="field">
                    <label class="label">Phone</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Enter your phone"
                               v-model="list.phone"
                               :class="{'is-danger':errors.phone}"
                        >
                    </div>
                    <small class="has-text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input" type="email" placeholder="Enter your email"
                               v-model="list.email"
                               :class="{'is-danger':errors.email}"
                        >
                    </div>
                    <small class="has-text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click="save">Save changes</button>
                <button class="button" @click="close">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        components: {},
        props: ['openModal'],
        data() {
            return{
                list: {
                    name: '',
                    email: '',
                    phone: ''
                },
                errors: {
                },
                message: ''
            }
        },
        methods: {
            close() {
                this.$emit('closeRequest')
            },
            save(){
                axios.post('/phonebook', this.$data.list)
                    .then((response) => {
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