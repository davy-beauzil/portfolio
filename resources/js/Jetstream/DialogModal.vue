<template>
    <modal v-if="show" :show="show" :max-width="maxWidth" :closeable="closeable">
        <div class="px-6 py-4">
            <svg @click="show = false; $emit('close')" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11 w-4 absolute top-4 right-4 duration-100 hover:text-green-500" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
            <div class="text-lg">
                <slot name="title">
                    <h2 class="text-2xl font-bold">{{title}}</h2>
                </slot>
            </div>

            <div class="mt-4">
                <slot name="content">
                    <!-- TECHNO -->
                    <create-technology @close="show = false; $emit('close')" v-if="action == 'create-technology'" :types="types" :action="action"></create-technology>
                    <delete-technology @close="show = false; $emit('close')" v-if="action == 'drop-technology'" :technology="technologies" :action="action"></delete-technology>
                    <create-technology @close="show = false; $emit('close')" v-if="action == 'update-technology'" :types="types" :technology="technologies" :action="action"></create-technology>
                    <!-- TECHNO -->

                    <!-- TYPE TECHNO -->
                    <create-technology @close="show = false; $emit('close')" v-if="action == 'update-type'" :types="types" :action="action"></create-technology>
                    <delete-technology @close="show = false; $emit('close')" v-if="action == 'drop-type'" :type="types" :action="action"></delete-technology>
                    <!-- TYPE TECHNO -->

                    <!-- PROJET -->
                    <create-technology @close="show = false; $emit('close')" v-if="action == 'create-project'" :_token="_token" :action="action"></create-technology>
                    <delete-technology @close="show = false; $emit('close')" v-if="action == 'drop-project'" :type="types" :action="action"></delete-technology>
                    <!-- PROJET -->
                </slot>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-100 text-right">
            <slot name="footer">
            </slot>
        </div>
    </modal>
</template>

<script>
    import Modal from './Modal'
    import CreateTechnology from '@/Components/CreateTechnology'
    import DeleteTechnology from '../Components/DeleteTechnology'

    export default {
        emits: ['close'],

        components: {
            Modal,
            CreateTechnology,
            DeleteTechnology,
        },

        props: {
            show: {
                default: false
            },
            maxWidth: {
                default: '2xl'
            },
            closeable: {
                default: true
            },
            title: {
                default: null
            },
            technologies: {
                default: null
            },
            types: {
                default: null
            },
            action: {
                default: null
            },
            _token: {
                default: null
            }
        },

        methods: {
            close() {
                this.$emit('close')
            },
            toClose(){
                this.show = false;
            }
        },
        mounted(){
            document.body.style.overflow = 'hidden'
            console.log('dialog modal : ' + this._token)

        }
    }
</script>
