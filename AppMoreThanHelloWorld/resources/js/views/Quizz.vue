<script>
import { computed, ref, watch, watchEffect } from "vue";
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
    idChapitre: { default: "1" },
  },
  setup(props, context) {
    const questions = ref([]);
    const reponses = ref([]);
    const countQuestion = ref(0);
    const score = ref(0);
//fetch question & reponse
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
//quizz gameplay
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
      console.log("countQuestion " + countQuestion.value);
      console.log("question.value.lenght " + questions.value.length);
    };
//get authenticated user
    const getUserId = ref(window.idUser);
    console.log("useridquizz"+getUserId.value);
//add xp
    const addExperience = (idUser) => {
            console.log("fetchxp  "+idUser);
            fetch("http://127.0.0.1:8000/api/user/xp", {
              method: "POST",
              headers: new Headers({
                "Content-Type": "application/json",
              }),
              body: JSON.stringify({
                idUser: idUser,
                xp: 100
              }),
            });
          };

//endquizz
    const endQuizz = (()=>{
      isModalVisible.value = "QuestionModalEnd";
    })

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
      endQuizz,
      addExperience,
      getUserId
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
  <ul v-if="countQuestion + 1 <= questions.length">
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

  <modal-quizz v-show="isModalVisible == 'QuestionModalRight'" @close="closeModal">
    <template v-slot:header>
      <h3>Tip top !</h3>
    </template>
    <template v-slot:body>
      <p> + 166,66 "edelweiss"</p>
      <template v-for="reponse in reponses" :key="reponse.idReponse">
        <p
          v-if="reponse.idQuestion + 1 == questions[countQuestion].idQuestion"
        >
          <!-- +1 because displaying is not updated yet -->
          {{ reponse.anecdote }} {{ reponse.idQuestion }}
        </p>
      </template>
    </template>
    <template v-slot:footer>
      <template  v-if="countQuestion == 8 ">
        <button @click="endQuizz();addExperience(getUserId)">fin du quizz</button>
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
      <template v-if="countQuestion == 8 ">
        <button @click="endQuizz();addExperience(getUserId)">fin du quizz</button>
      </template>
      <template v-else>
        <button type="button" @click="closeModal()">
          Suivant
        </button>
      </template>
    </template>
  </modal-quizz>


  <modal-end
    v-show="isModalVisible == 'QuestionModalEnd'"
    @close="closeModal"
  >
    <template v-slot:header>Résultats</template>
    <template v-slot:body>
      <p>ton score : {{ score }} / {{ questions.length }}</p>
      <!-- <p>{{ countQuestion + 1 }} - {{ questions.length }}</p> -->
      

      <button><router-link to="/accueil">retour</router-link></button>
    </template>
    <template v-slot:footer>footer</template>
  </modal-end>





    <!-- <button class="btn btn-primary" @click="addExperience(getUserId)">
      Add Experience
    </button> -->

</template>



<style scoped>
</style>
