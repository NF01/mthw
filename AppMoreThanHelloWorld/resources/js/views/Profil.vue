<script>
    import {ref, watch, watchEffect} from 'vue';
    import Modal from '../components/Modal.vue';
    import Badges from '../components/ProfilComponents/badges.vue';

    export default {
        components: {
            Modal,
            Badges
        },
        setup(props, context) {

            const isModalVisible = ref('');
            console.log(isModalVisible.value);

            const showModal = () => isModalVisible.value = true;
            const closeModal = () => isModalVisible.value = false;
            
            watchEffect(() => console.log(isModalVisible.value))

        return { isModalVisible, showModal, closeModal}
        },
    }

</script>

<template>
    <div>
        <h1>Profil</h1>

        <badges></badges>
        <modal v-show="isModalVisible =='badgesModal'" @close="closeModal">
            <template v-slot:header>Badges</template>
            <template v-slot:body>
                <h2>test</h2>
                body Badge
            </template>
            <template v-slot:footer>footer</template>
        </modal>
        <button type="button" class="btn" @click="isModalVisible = 'badgesModal'">Badges</button>


        <h2>Resultat</h2>
        <p>edition</p>

        <button type="button" class="btn" @click="isModalVisible = 'resultModal'">Resultat</button>
        <button type="button" class="btn" @click="isModalVisible = 'editModal'">Editer</button>
        <modal v-show="isModalVisible =='resultModal'" @close="closeModal">
            <template v-slot:header>Résultat</template>
            <template v-slot:body>body resultat</template>
            <template v-slot:footer>footer</template>
        </modal>
        <modal class="editModal" v-show="isModalVisible =='editModal'" @close="closeModal">
            <template v-slot:header>Editer</template>
            <template v-slot:body>body editer</template>
            <template v-slot:footer>footer</template>
        </modal>   
    </div>
</template>

<style scoped>
    .badges {
        display: flex;
    }

</style>
