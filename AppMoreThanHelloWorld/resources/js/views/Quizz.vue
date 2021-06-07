<script>
import { computed, ref, watch, watchEffect } from "vue";
import Progressbar from "../components/Progressbar.vue";
import Modal from "../components/Modal.vue";

export default {
  components: {
    Progressbar,
    Modal,
  },
  props: {
    idChapitre: { default: "1" },
  },
  setup(props, context) {
    const questions = ref([]);
    const reponses = ref([]);
    const countQuestion = ref(0);
    const score = ref(0);

    const fetchData = async () => {
      //   const questions = await fetch("http://127.0.0.1:8000/api/questions/");
      const getQuestion = await fetch(
        "http://127.0.0.1:8000/api/questions/idC/" + props.idChapitre
      );
      questions.value = await getQuestion.json();
      // console.log(question.value);

      const getReponse = await fetch(
        `http://127.0.0.1:8000/api/reponses`
        // `http://127.0.0.1:8000/api/reponses/idQ/{n}`
      );
      reponses.value = await getReponse.json();
      console.log(reponses.value);

      //   //image question
      //   if (questions[0].idImage != null) {
      //     const idImage = questions[0].idImage;
      //     const imagepath = await fetch(
      //       `http://127.0.0.1:8000/api/image/${idImage}`
      //     );
      //     const data3 = await imagepath.json();
      //     // console.log('hey' + data3[0].url);
      //   }

      //   //image reponse
      //   (reponses.value).forEach(async (e) => {
      //     if (e.idImage != null) {
      //       const idimageR = e.idImage;
      //       const imagepathR = await fetch(
      //         `http://127.0.0.1:8000/api/image/${idimageR}`
      //       );
      //       const data3 = await imagepathR.json();
      //     }
      //   });
      console.log(questions.value.length);
    };

    fetchData();

    const nextQuestion = (reponse) => {
      //   console.log(countQuestion.value);
      if (reponse.statut == 1) {
        // console.log("bonne reponse" + reponse.statut);
        score.value = score.value + 1;
        isModalVisible.value = "QuestionModalRight";
      } else {
        // console.log("mauvaise reponse" + reponse.statut);
        isModalVisible.value = "QuestionModalWrong";
      }
      //   console.log("score" + score.value);
      countQuestion.value = countQuestion.value + 1;
      console.log(countQuestion.value + 1);
      console.log(questions.value.length);
    };

    const isModalVisible = ref("");
    // const showModal = () => isModalVisible.value = true;
    const closeModal = () => (isModalVisible.value = false);

    //return vue
    return {
      questions,
      reponses,
      countQuestion,
      nextQuestion,
      isModalVisible,
      // showModal,
      closeModal,
      score,
    };
  },
};
</script>

<template>
  <p>{{ idChapitre }}</p>
  <h1>Quizz</h1>

  <p v-if="questions[countQuestion]">{{ questions[countQuestion].enonce }}</p>

  <progressbar :count="countQuestion"></progressbar>

  <p></p>
  <!-- <ul> -->
  <ul v-if="countQuestion + 1 < questions.length">
    <template v-for="reponse in reponses" :key="reponse.idReponse">
      <!-- v-if="reponse.idQuestion === questions[countQuestion].idQuestion && questions[countQuestion].idQuestion <= 10" -->
      <button
        class="btn btn-primary"
        v-if="reponse.idQuestion === questions[countQuestion].idQuestion"
        @click="nextQuestion(reponse)"
      >
        {{ reponse.enonce }} {{ reponse.statut }}
      </button>
    </template>
  </ul>

  <modal v-show="isModalVisible == 'QuestionModalRight'" @close="closeModal">
    <template v-slot:header>Bonne reponse</template>
    <template v-slot:body>
      <template v-for="reponse in reponses" :key="reponse.idReponse">
        <p
          v-if="reponse.idQuestion + 1 === questions[countQuestion].idQuestion"
        >
          <!-- +1 because magic happen  -->
          {{ reponse.anecdote }} {{ reponse.idQuestion }}
        </p>
      </template>
    </template>
    <template v-slot:footer>footer</template>
  </modal>

  <modal v-show="isModalVisible == 'QuestionModalWrong'" @close="closeModal">
    <template v-slot:header>Mauvaise réponse</template>
    <template v-slot:body>tu feras mieux la prochaine fois</template>
    <template v-slot:footer>footer</template>
  </modal>

  <modal v-show="isModalVisible == 'QuestionModalEnd'">
    <template v-slot:header>fin</template>
    <template v-slot:body>
      <p>tu as gagné {{ score }} points</p>
      <button><router-link to="/accueil">retour</router-link></button>
    </template>
    <template v-slot:footer>footer</template>
  </modal>

  <modal
    v-show="true"
    @close="closeModal"
    v-if="countQuestion + 1 >= questions.length"
  >
    <template v-slot:header>Résultats</template>
    <template v-slot:body>
      <p>{{ score }} / {{ questions.length }}</p>
      <p>{{ countQuestion + 1 }} - {{ questions.length }}</p>

      <button><router-link to="/accueil">retour</router-link></button>
    </template>
    <template v-slot:footer>footer</template>
  </modal>
</template>

<style scoped>
</style>
