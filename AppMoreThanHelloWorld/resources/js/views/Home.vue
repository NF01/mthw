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

            const getUserId = computed(() => {
                console.log("vue : " + window.idUser)
                return window.idUser;
                });

            return{getUserId};

        }
    }
    

</script>

<template>
        <p>{{getUserId}}</p>
        <header>
           <div>Info</div>
           <div>score</div>
        </header>

        <div>cheminement train</div>
        <!-- <button><router-link to="/quizz">Quizz</router-link></button> -->
        <button>
            <router-link :to="{
            name: 'quizz',
            params: { idChapitre: 2 }
            }">
            Quizz 2
          </router-link>
        </button>
        <button>
            <router-link :to="{
            name: 'quizz',
            params: { idChapitre: 3 }
            }">
            Quizz 3
          </router-link>
        </button>
        
        <button>Jouer</button>

</template>

<style scoped>

</style>
