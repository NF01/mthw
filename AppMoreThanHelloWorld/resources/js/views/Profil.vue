<script>
    import {ref, watch, watchEffect} from 'vue';
    import Modal from '../components/Modal.vue';
    import Badges from '../components/ProfilComponents/Badges.vue';
    import Result from '../components/ProfilComponents/Result.vue';

    export default {
        components: {
            Modal,
            Badges,
            Result
        },
        setup(props, context) {

            const isModalVisible = ref('');
            const showModal = () => isModalVisible.value = true;
            const closeModal = () => isModalVisible.value = false;

        return { isModalVisible, showModal, closeModal}
        },
    }

</script>

<template>
    <div>
        <h1>Profil</h1>
        <p>Pseudo</p>
        <p>email</p>
        <p>mot de passe</p>
        <button type="button" class="btn" @click="isModalVisible = 'editModal'">Editer</button>
        <modal class="editModal" v-show="isModalVisible =='editModal'" @close="closeModal">
            <template v-slot:header>Editer</template>
            <template v-slot:body>body editer</template>
            <template v-slot:footer>footer</template>
        </modal>

        <badges></badges>
         <modal v-show="isModalVisible =='badgesModal'" @close="closeModal">
            <template v-slot:header>Badges</template>
            <template v-slot:body>
                <h2>test</h2>
                body Badge
            </template>
            <template v-slot:footer>footer</template>
        </modal>
        <button type="button" class="btn" @click="isModalVisible = 'badgesModal'">Voir tous les badges</button>

        <result></result>

        <button type="button" class="btn" @click="isModalVisible = 'resultModal'">Voir les resultat</button>
        <modal v-show="isModalVisible =='resultModal'" @close="closeModal">
            <template v-slot:header>Résultats</template>
            <template v-slot:body>body resultat</template>
            <template v-slot:footer>footer</template>
        </modal>
    </div>
</template>

<style scoped>
  

</style>
