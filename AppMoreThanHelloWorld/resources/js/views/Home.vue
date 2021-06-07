<script>
    import {
      computed,
        ref,
        watch,
        watchEffect
    } from 'vue';

    // export default {
    //     computed: {
    //         getUserId() {
    //             return window.idUser;
    //         }
    //     }
    // }
    export default {
        components: {
            
        },
        props: {
            // 'idUser': {default: '1'}
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


            const getUserId = computed(() => {
                console.log("vue : " + window.idUser)
                return window.idUser;
                });


            return{getUserId, chapitres};

        }
    }

</script>

<template>
        <p>user id {{getUserId}}</p>
        <template>{{getUserId}}</template>
        <header>
           <div>Info</div>
           <div>score</div>
        </header>

        <div>cheminement train</div>
        <!-- <button><router-link to="/quizz">Quizz</router-link></button> -->

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
