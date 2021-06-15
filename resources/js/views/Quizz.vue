<script>
    import {
        computed,
        reactive,
        ref
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
                default: "1",
            },
        },
        setup(props, context) {
            const URL_PREFIX = ref(window.URL_PREFIX);

            const questions = ref([]);
            const reponses = ref([]);
            const images = ref([]);
            const user = ref([]);
            const countQuestion = ref(0);
            const score = ref(0);
            const nbOfQuestion = ref(8);
            const XpbyQuestion = ref(125);
            const getUserId = ref(window.idUser);
            // const url = ref(window.urlProd);

            // const url = ref(process.env.URL);
            // console.log(url.value);

            //fetch question & reponse
            const fetchData = async () => {
                const getQuestion = await fetch(
                    URL_PREFIX.value + "api/questions/idC/" + props.idChapitre
                );
                questions.value = await getQuestion.json();

                const getReponse = await fetch(URL_PREFIX.value + "api/reponses");
                reponses.value = await getReponse.json();

                // image question
                const fetchImage = await fetch(URL_PREFIX.value + "api/images");
                images.value = await fetchImage.json();

                // user
                const fetchUser = await fetch(
                    URL_PREFIX.value + "api/user/" + getUserId.value
                );
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
                // countQuestion.value = countQuestion.value + 1;
            };
            //nxt question
            const addCount = (() => countQuestion.value = countQuestion.value + 1);

            //add xp
            const addExperience = (idUser) => {
                fetch(URL_PREFIX.value + "api/user/xp", {
                    method: "POST",
                    headers: new Headers({
                        "Content-Type": "application/json",
                    }),
                    body: JSON.stringify({
                        idUser: idUser,
                        xp: score.value * XpbyQuestion.value,
                    }),
                });
            };

            //endquizz
            const endQuizz = () => {
                isModalVisible.value = "QuestionModalEnd";
            };

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
                addCount
            };
        },
    };

</script>

<template>
    <div class="container pt-4">
        <div class="row">
            <div class="col-auto">
                <button class="uk-close-large" href="#return" uk-toggle uk-close></button>
            </div>
        </div>
        <header class="row border-bottom pb-4 mb-4">
            <div class="col text-center">
                <h1 class="mb-1">Étape</h1>
            </div>
        </header>
        <div class="row">
            <div class="col pb-4">
                <progressbar :count="countQuestion"></progressbar>
            </div>
        </div>
        <div class="row">
            <div class="col pb-6 text-center">
                <p v-if="questions[countQuestion]">
                    {{ questions[countQuestion].enonce }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <template v-for="image in images" :key="image.idImage">
                    <template v-if="questions[countQuestion].idImage == image.idImage">
                        <img class="w-50 border" :src="image.url" />
                    </template>
                </template>
            </div>
        </div>
    </div>

    <ul class="container" v-if="countQuestion <= nbOfQuestion">
        <div class="row mt-4">
            <template v-for="reponse in reponses" :key="reponse.idReponse">
                <template v-if="reponse.enonce">
                    <template v-if="reponse.idQuestion === questions[countQuestion].idQuestion">
                        <div class="col-md-6 mb-3">
                            <button class="btn btn-secondary full-width" @click="nextQuestion(reponse)">
                                {{ reponse.enonce }}
                            </button>
                        </div>
                    </template>
                </template>

                <template v-if="reponse.idImage">
                    <template v-if="reponse.idQuestion === questions[countQuestion].idQuestion">
                        <template v-for="image in images" :key="image.idImage">
                            <template class="afficheImg" v-if="reponse.idImage == image.idImage">
                                <div class="col-md-6 mb-3 text-center text-md-left double">
                                    <img class="w-50 border" :src="image.url" @click="nextQuestion(reponse)" />
                                </div>
                            </template>
                        </template>
                    </template>
                </template>
            </template>
        </div>
    </ul>

    <!--Close modal-->
    <div id="return" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2">
            <div class="col pt-4">
                <p>Es-tu sûr de vouloir quitter le quizz ?</p>
            </div>
            <div class="row border-top pt-4 mt-auto">
                <div class="col">
                    <div class="row my-3">
                        <div class="col">
                            <router-link to="/accueil">
                                <button class="btn btn-primary full-width uk-modal-close">
                                    Oui
                                </button>
                            </router-link>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-secondary full-width uk-modal-close">
                                Non
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <modal-quizz class="modal-right" v-show="isModalVisible == 'QuestionModalRight'" @close="closeModal">
        <template v-slot:header>
            <h3 class="vert">Tip top !</h3>
        </template>
        <template v-slot:body>
            <div class="container">
                <div class="row">
                    <div class="col text-center mb-3">
                        <span class="vert">
                            + {{ XpbyQuestion }}
                            <img class="edelweiss-point" src="/img/edelweiss.png" alt="points" />
                        </span>
                    </div>
                </div>
            </div>

            <template v-for="reponse in reponses" :key="reponse.idReponse">
                <p class="text-center" v-if="reponse.idQuestion == questions[countQuestion].idQuestion">
                    {{ reponse.anecdote }}
                </p>
            </template>
        </template>
        <template v-slot:footer>
            <template v-if="countQuestion == nbOfQuestion -1">
                <template v-if="user.experience > 1000 * idChapitre">
                    <button class="btn btn-primary full-width" @click="endQuizz()">Fin du quizz</button>
                </template>
                <template v-if="user.experience <= 1000 * idChapitre">
                    <button class="btn btn-primary full-width" @click="
              endQuizz();
              addExperience(getUserId);
            ">
                        Fin du quizz
                    </button>
                </template>
            </template>
            <template v-else>
                <button class="btn btn-primary full-width" type="button" @click="closeModal();addCount()">
                    Suivant
                </button>
            </template>
        </template>
    </modal-quizz>

    <modal-quizz class="modal-wrong" v-show="isModalVisible == 'QuestionModalWrong'" @close="closeModal">
        <template v-slot:header>
            <h3 class="rouge">Faux :’(</h3>
        </template>
        <template v-slot:body>
            <div class="container">
                <div class="row">
                    <div class="col text-center mb-3">
                        <span class="rouge">
                            +0
                            <img class="edelweiss-point" src="/img/edelweiss.png" alt="points" />
                        </span>
                    </div>
                </div>
            </div>
        </template>
        <template v-slot:footer>
            <template v-if="countQuestion == nbOfQuestion -1">
                <template v-if="user.experience > 1000 * idChapitre">
                    <button class="btn btn-primary full-width" @click="endQuizz()">Fin du quizz</button>
                </template>
                <template v-if="user.experience <= 1000 * idChapitre">
                    <button class="btn btn-primary full-width" @click="
              endQuizz();
              addExperience(getUserId);
            ">
                        Fin du quizz
                    </button>
                </template>
            </template>
            <template v-else>
                <button class="btn btn-primary full-width" type="button" @click="closeModal();addCount()">
                    Suivant
                </button>
            </template>
        </template>
    </modal-quizz>

    <modal-end v-show="isModalVisible == 'QuestionModalEnd'" @close="closeModal">
        <template v-slot:header>
            <h1>Fin du quizz</h1>
        </template>

        <template v-slot:body>
            <div class="container col-lg-6 mx-auto">

                <div class="row">
                    <div class="col">
                        <p>Réponses justes : {{ score }} / {{ questions.length -1 }}</p>

                        <p> +{{ score * XpbyQuestion}}
                            <img class="edelweiss-point" src="/img/edelweiss.png" alt="points" />
                        </p>
                    </div>
                </div>

                <template v-if="user">
                    <template v-if="user.experience + score * XpbyQuestion >= 1000 * idChapitre">
                        <!-- <div class="row">
                            <div class="col">
                                <p class="btn btn-play small mx-auto">Étape</p>
                            </div>
                        </div> -->

                        <div class="row text-right border-bottom my-4">
                            <div class="col pt-4 pr-4">
                                <img class="w-50" src="/svg/train-entier.svg" alt="train" />
                            </div>
                        </div>

                        <div class="row text-left">
                            <div class="col pl-4 pt-4">
                                <p>
                                    Bravo tu passes au niveau suivant ! <br>
                                    Bienvenue à Nouvelle étape
                                </p>
                            </div>
                        </div>

                    </template>
                    <template v-if="user.experience + score * XpbyQuestion < 1000 * idChapitre">
                        <p>
                            Tu n'as pas assez d'Edelweiss pour passer à la prochaine étape.
                            Retente ta chance
                        </p>
                    </template>
                </template>
            </div>
        </template>

        <template v-slot:footer>
                <router-link to="/accueil" class="btn btn-primary full-width">Retour</router-link>
        </template>
    </modal-end>
</template>



<style scoped>
    .edelweiss-point {
        margin-left: 15px;
        width: 30px;
    }

    .vert {
        color: #28a745;
    }

    .rouge {
        color: #da291c;
    }

    .modal-false {
        height: 30%;
    }

    .row-right {
        background-color: #28a745;
    }

    @media (min-width: 768px) {
        .double:first-child {
            text-align: right !important;
        }
    }

</style>
