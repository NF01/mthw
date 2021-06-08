<script>
    import {
      computed,
        ref,
        watch,
        watchEffect
    } from 'vue';

    export default {
        components: {
            
        },
        props: {
        },
        setup(props, context) {

            const chapitres = ref([]);


            const fetchChapitre = async () => {
                const result = await fetch("http://127.0.0.1:8000/api/chapitres/")
                const data = await result.json();
                chapitres.value = data;
                console.log(chapitres.value);
            }
            fetchChapitre();


            const getUserId = ref(window.idUser);
            console.log("useridHome"+getUserId.value);


            return{getUserId, chapitres};

        }
    }

</script>

<template>
        <header>
           <div>Info</div>
           <div>score</div>
        </header>

        <div>cheminement train</div>

        <ul>
            <template v-for="chapitres in chapitres" :key="chapitres.idEtape">
                <li>
                    <button>
                        <router-link :to="{
                        name: 'quizz',
                        params: { idChapitre: chapitres.idEtape }
                        }">
                        {{chapitres.nom}}
                        </router-link>
                    </button>
                </li>

            </template>
        </ul>

        
        <button>Jouer</button>

</template>

<style scoped>

</style>
