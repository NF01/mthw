<script>
    import {
        computed,
        ref,
        watch,
        watchEffect
    } from 'vue';
    import Progressbar from '../components/Progressbar.vue';
    import Modal from '../components/Modal.vue';

    export default {
        components: {
            Progressbar,
            Modal
        },
        props: {
            'idChapitre': {default: '1'},
        },
        setup(props, context) {

            const question = ref([]);
            const reponse = ref([]);

            const fetchget = async () => {
                const result = await fetch("http://127.0.0.1:8000/api/questions/")
                // const result = await fetch(`http://127.0.0.1:8000/api/questions/${props.idChapitre.value}`)
                const data = await result.json();

                const fectchreponse = await fetch(
                    // `http://127.0.0.1:8000/api/reponses/idQ/${data[0].idQuestion}`
                    `http://127.0.0.1:8000/api/reponses/`
                )
                const data2 = await fectchreponse.json();
                //image question
                if (data[0].idImage != null) {
                    const idImage = data[0].idImage
                    const imagepath = await fetch(`http://127.0.0.1:8000/api/image/${idImage}`);
                    const data3 = await imagepath.json();
                    // console.log(data3[0].url);
                }

                //image reponse
                data2.forEach(async (e) => {
                    if (e.idImage != null) {
                        const idimageR = e.idImage
                        const imagepathR = await fetch(
                            `http://127.0.0.1:8000/api/image/${idimageR}`
                        )
                        const data3 = await imagepathR.json();
                        // console.log(data3[0].url);
                    }
                });
                // console.log(data2);
                question.value = data;
                reponse.value = data2;

                // console.log(question.value);
            };
            fetchget();

            const countQuestion = ref(0);
            const score = ref(0);

            const nextQuestion = ((reponse) => {
                console.log(countQuestion.value);
                if (countQuestion.value == 9) {
                    isModalVisible.value = "QuestionModalEnd";
                    console.log("inIf"+countQuestion.value);
                    return;
                } else if (reponse.statut == 1) {
                    // console.log("bonne reponse" + reponse.statut);
                    score.value = score.value + 1;
                    isModalVisible.value = "QuestionModalRight";
                } else {
                    // console.log("mauvaise reponse" + reponse.statut);
                    isModalVisible.value = "QuestionModalWrong";
                }
                console.log("score"+score.value);
                countQuestion.value = countQuestion.value + 1;
            });

            const isModalVisible = ref('');
            // const showModal = () => isModalVisible.value = true;
            const closeModal = () => isModalVisible.value = false;

            //return vue
            return {
                question,
                reponse,
                countQuestion,
                nextQuestion,
                isModalVisible,
                // showModal,
                closeModal,
                score
            };
        },
    }

</script>

<template>
        <p>{{ idChapitre }}</p>
        <h1>Quizz</h1>

        <p v-if="question[countQuestion]"> {{question[countQuestion].enonce}} </p>

        <progressbar :count="countQuestion"></progressbar>

        <ul>
            <template v-for="reponse in reponse" :key="reponse.idReponse">
                <button class="btn btn-primary" v-if="reponse.idQuestion === question[countQuestion].idQuestion && question[countQuestion].idQuestion <= 10" @click="nextQuestion(reponse)">
                    {{reponse.enonce}} {{reponse.statut}}
                </button>
            </template>
        </ul>
        <modal v-show="isModalVisible =='QuestionModalRight'" @close="closeModal">
            <template v-slot:header>Bonne reponse</template>
            <template v-slot:body>
              <template v-for="reponse in reponse" :key="reponse.idReponse">
                <p v-if="reponse.idQuestion+1 === question[countQuestion].idQuestion"><!-- +1 because magic happen  -->
                    {{reponse.anecdote}} {{reponse.idQuestion}}
                </p>
              </template>
              </template>
            <template v-slot:footer>footer</template>
        </modal>
        <modal v-show="isModalVisible =='QuestionModalWrong'" @close="closeModal">
            <template v-slot:header>Mauvaise réponse</template>
            <template v-slot:body>tu feras mieux la prochaine fois</template>
            <template v-slot:footer>footer</template>
        </modal>
        <modal v-show="isModalVisible =='QuestionModalEnd'" >
            <template v-slot:header>fin</template>
            <template v-slot:body>
              <p>tu as gagné {{score}} points</p>
              <button><router-link to="/accueil">retour</router-link></button>
            </template>
            <template v-slot:footer>footer</template>
        </modal>
    

</template>

<style scoped>

</style>
