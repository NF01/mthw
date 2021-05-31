<script>
    import {ref, watch, watchEffect } from 'vue';
    import Modal from '../components/Modal.vue';
    import HomeProgress from '../components/HomeProgress.vue';

    export default {
        components: {
            Modal,
            HomeProgress
        },
        setup(props, context) {

            const isModalVisible = ref('register');
            console.log(isModalVisible.value);

            const showModal = () => isModalVisible.value = true;
            const closeModal = () => isModalVisible.value = false;

            watchEffect(() => console.log(isModalVisible.value))

            return {
                isModalVisible,
                showModal,
                closeModal
            }
        },
    }

</script>

<template>
    <div>
        <h1>Home</h1>
        <button type="button" class="btn" @click="isModalVisible = 'register'">Inscription</button>
        <button type="button" class="btn" @click="isModalVisible = 'login'">Login</button>
        <modal v-show="isModalVisible =='register'" @close="closeModal">
            <template v-slot:header>S'incrire</template>
            <template v-slot:body>body s'inscrire</template>
            <template v-slot:footer>footer</template>
        </modal>
        <modal v-show="isModalVisible =='login'" @close="closeModal">
            <template v-slot:header>Connexion</template>
            <template v-slot:body>body connexion</template>
            <template v-slot:footer>footer</template>
        </modal>

        <!-- a voir la taille/complexité -->
        <home-progress></home-progress>

    </div>


</template>

<style scoped>

</style>
