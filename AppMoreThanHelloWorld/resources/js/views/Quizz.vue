<script>
    import {
        computed,
        reactive,
        ref,
    } from "vue";
    import Progressbar from "../components/Progressbar.vue";
    import ModalQuizz from "../components/Modal/ModalQuizz.vue";
    import ModalEnd from "../components/Modal/ModalEnd.vue";

    export default {
        components: {
            Progressbar,
            ModalEnd,
            ModalQuizz,
        },
        props: {
            idChapitre: {
                default: "1"
            },
        },
        setup(props, context) {
            const questions = ref([]);
            const reponses = ref([]);
            const images = ref([]);
            const user = ref([]);
            const countQuestion = ref(0);
            const score = ref(0);
            const nbOfQuestion = ref(8);
            const XpbyQuestion= ref(166);
            const getUserId = ref(window.idUser);
            const url = ref(window.urlProd);
            // const url = ref(process.env.URL);
            // console.log(url.value);
            
            //fetch question & reponse
            const fetchData = async () => {
                const getQuestion = await fetch(
                    "/api/questions/idC/" + props.idChapitre
                );
                questions.value = await getQuestion.json();

                const getReponse = await fetch(
                     "/api/reponses"
                );
                reponses.value = await getReponse.json();

                // image question
                const fetchImage = await fetch(
                  "/api/images");
                images.value = await fetchImage.json();

                // user
                const fetchUser = await fetch( "/api/user/" + getUserId.value);
                user.value = await fetchUser.json();
            };
            fetchData();


            //quizz gameplay
            const nextQuestion = (reponse) => {
                if (reponse.statut == 1) {
                    score.value = score.value + 1;
                    isModalVisible.value = "QuestionModalRight";
                } else {
                    isModalVisible.value = "QuestionModalWrong";
                }
                countQuestion.value = countQuestion.value + 1;
            };
            


            //add xp
            const addExperience = (idUser) => {
                fetch("/api/user/xp", {
                    method: "POST",
                    headers: new Headers({
                        "Content-Type": "application/json",
                    }),
                    body: JSON.stringify({
                        idUser: idUser,
                        xp: score.value * XpbyQuestion.value
                    }),
                });
            };
            


            //endquizz
            const endQuizz = (() => {
                isModalVisible.value = "QuestionModalEnd";
            })

            const isModalVisible = ref("");
            const closeModal = () => (isModalVisible.value = false);


            //return vue
            return {
                questions,
                reponses,
                countQuestion,
                nextQuestion,
                isModalVisible,
                closeModal,
                score,
                endQuizz,
                addExperience,
                getUserId,
                images,
                nbOfQuestion,
                user,
                XpbyQuestion,
            };
        },
    };

</script>

<template>
    <h1>Quizz</h1>

    <p v-if="questions[countQuestion]">
        {{ questions[countQuestion].enonce }}
    </p>

    <template v-for="image in images" :key="image.idImage">
        <template v-if="questions[countQuestion].idImage == image.idImage">
            <img :src="image.url">
        </template>
    </template>

    <progressbar :count="countQuestion"></progressbar>


    <ul v-if="countQuestion <= nbOfQuestion">
        <template v-for="reponse in reponses" :key="reponse.idReponse">
            <template v-if="reponse.enonce">
                <template v-if="reponse.idQuestion === questions[countQuestion].idQuestion">
                    <button class="btn btn-primary" @click="nextQuestion(reponse);">
                        {{ reponse.enonce }}
                    </button>
                </template>
            </template>

            <template v-if="reponse.idImage">
                <template v-if="reponse.idQuestion === questions[countQuestion].idQuestion">
                    <template v-for="image in images" :key="image.idImage">
                        <template class="afficheImg" v-if="reponse.idImage == image.idImage">
                            <img :src="image.url" @click="nextQuestion(reponse)">
                        </template>
                    </template>
                </template>
            </template>
        </template>
    </ul>






    <modal-quizz v-show="isModalVisible == 'QuestionModalRight'" @close="closeModal">
        <template v-slot:header>
            <h3>Tip top !</h3>
        </template>
        <template v-slot:body>
            <p> + {{XpbyQuestion}} "edelweiss"</p>
            <template v-for="reponse in reponses" :key="reponse.idReponse">
                <p v-if="reponse.idQuestion  == questions[countQuestion].idQuestion-1">
                    <!-- +1 because displaying is not updated yet -->
                    {{ reponse.anecdote }}
                </p>
            </template>
        </template>
        <template v-slot:footer>
            <template v-if="countQuestion == nbOfQuestion ">
                <template v-if="user.experience > 1000*idChapitre">
                  <button @click="endQuizz();">fin du quizz</button>
                </template>
                <template v-if="user.experience <= 1000*idChapitre">
                  <button @click="endQuizz();addExperience(getUserId)">fin du quizz</button>
                </template>
            </template>
            <template v-else>
                <button type="button" @click="closeModal()">
                    Suivant
                </button>
            </template>
        </template>
    </modal-quizz>

    <modal-quizz v-show="isModalVisible == 'QuestionModalWrong'" @close="closeModal">
        <template v-slot:header>Faux :’(</template>
        <template v-slot:body>+0 "edelweiss"</template>
        <template v-slot:footer>
            <template v-if="countQuestion == nbOfQuestion ">
                <template v-if="user.experience > 1000*idChapitre">
                  <button @click="endQuizz();">fin du quizz</button>
                </template>
                <template v-if="user.experience <= 1000*idChapitre">
                  <button @click="endQuizz();addExperience(getUserId)">fin du quizz</button>
                </template>
            </template>
            <template v-else>
                <button type="button" @click="closeModal()">
                    Suivant
                </button>
            </template>
        </template>
    </modal-quizz>


    <modal-end v-show="isModalVisible == 'QuestionModalEnd'" @close="closeModal">
        <template v-slot:header>Fin du quizz</template>
        <template v-slot:body>
            <p>Réponse juste : {{ score }} / {{ questions.length }}</p>

            <template v-if="user">
                <template v-if="user.experience+(score*XpbyQuestion) >= 1000*idChapitre">
                    <p>Bravo tu passe au niveau suivant !</p>

                    <button>
                        <router-link to="/accueil">retour</router-link>
                    </button>
                    
                </template>
                <template v-if="user.experience+(score*XpbyQuestion) < 1000*idChapitre">
                    <p>Tu n'as pas assez d'Edelweiss pour passer à la prochaine étape. Retente ta chance</p>

                    <!-- <button>
                        <router-link :to="/quizz/idChapitre">Rejouer</router-link>
                    </button> -->
                    <button>
                        <router-link to="/accueil">retour</router-link>
                    </button>
                </template>
            </template>

        </template>



        <template v-slot:footer>footer</template>
    </modal-end>

</template>



<style scoped>
</style>
