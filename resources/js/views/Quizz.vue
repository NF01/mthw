<script>
import { ref } from "vue";
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
    const vectorURL = ref(window.vectorURL);
    const imageURL = ref(window.imageURL);
    const edelweissURL = ref(window.edelweissURL);
    const imageQuizzURL = ref(window.imageQuizzURL);

    const questions = ref([]);
    const reponses = ref([]);
    const images = ref([]);
    const user = ref([]);
    const chapitres = ref([]);
    const badges = ref([]);
    const countQuestion = ref(0);
    const score = ref(0);
    const nbOfQuestion = ref(8);
    const XpbyQuestion = ref(125);
    const getUserId = ref(window.idUser);

    //fetch data
    const fetchData = async () => {
      const getQuestion = await fetch(
        URL_PREFIX.value + "api/questions/idC/" + props.idChapitre
      );
      questions.value = await getQuestion.json();
      shuffleArray(questions.value);

      const getReponse = await fetch(URL_PREFIX.value + "api/reponses");
      reponses.value = await getReponse.json();
      shuffleArray(reponses.value);

      // image question
      const fetchImage = await fetch(URL_PREFIX.value + "api/images");
      images.value = await fetchImage.json();

      //etapes
      const fetchEtapes = await fetch(URL_PREFIX.value + "api/chapitres/");
      chapitres.value = await fetchEtapes.json();

      // user
      const fetchUser = await fetch(
        URL_PREFIX.value + "api/user/" + getUserId.value
      );
      user.value = await fetchUser.json();

      // badges
      const fetchBadges = await fetch(URL_PREFIX.value + "api/badges/");
      badges.value = await fetchBadges.json();
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
    };
    //nxt question
    const addCount = () => (countQuestion.value = countQuestion.value + 1);

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
    // Durstenfeld shuffle
    function shuffleArray(array) {
      for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
      }
    }

    function scrollPage() {
      window.scrollTo(0, 0);
    }
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
      addCount,
      URL_PREFIX,
      imageURL,
      imageQuizzURL,
      edelweissURL,
      vectorURL,
      chapitres,
      badges,
      scrollPage,
    };
  },
};
</script>

<template>
  <div class="container pt-4">
    <header class="row border-bottom pb-4 mb-4">
      <div class="col-auto" style="z-index: 500">
        <button
          class="uk-close-large"
          href="#return"
          uk-toggle
          uk-close
        ></button>
      </div>
      <div class="col text-center">
        <template v-for="chapitre in chapitres" :key="chapitre.idChapitre">
          <h1 class="mb-1 title-question" v-if="idChapitre == chapitre.idEtape">
            {{ chapitre.nom }}
          </h1>
        </template>
      </div>
    </header>
    <div class="row">
      <div class="col pb-4">
        <progressbar :count="countQuestion"></progressbar>
      </div>
    </div>

    <div class="row mx-0">
      <div class="col text-center">
        <p v-if="questions[countQuestion]">
          {{ questions[countQuestion].enonce }}
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col text-center">
        <template v-for="image in images" :key="image.idImage">
          <template v-if="questions[countQuestion].idImage == image.idImage">
            <img
              class="w-50 border"
              :src="URL_PREFIX + imageQuizzURL + image.url"
            />
          </template>
        </template>
      </div>
    </div>
  </div>

  <ul class="container" v-if="countQuestion <= nbOfQuestion">
    <div class="row mt-4">
      <template v-for="reponse in reponses" :key="reponse.idReponse">
        <template v-if="reponse.enonce">
          <template
            v-if="reponse.idQuestion === questions[countQuestion].idQuestion"
          >
            <div class="col-md-6 mb-3">
              <button
                class="btn btn-secondary full-width"
                @click="nextQuestion(reponse)"
              >
                {{ reponse.enonce }}
              </button>
            </div>
          </template>
        </template>

        <template v-if="reponse.idImage">
          <template
            v-if="reponse.idQuestion === questions[countQuestion].idQuestion"
          >
            <template v-for="image in images" :key="image.idImage">
              <template
                class="afficheImg"
                v-if="reponse.idImage == image.idImage"
              >
                <div class="col-md-6 mb-3 text-center text-md-left double">
                  <img
                    class="w-50 border pointer"
                    :src="URL_PREFIX + imageQuizzURL + image.url"
                    @click="nextQuestion(reponse)"
                  />
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
              <router-link :to="URL_PREFIX + 'accueil'">
                <button class="btn btn-primary full-width uk-modal-close">
                  Oui
                </button>
              </router-link>
            </div>
            <div class="col">
              <button
                type="submit"
                class="btn btn-secondary full-width uk-modal-close"
              >
                Non
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <modal-quizz
    class="modal-right"
    v-show="isModalVisible == 'QuestionModalRight'"
    @close="closeModal"
  >
    <template v-slot:header>
      <h3 class="vert">Tip top !</h3>
    </template>
    <template v-slot:body>
      <div class="container">
        <div class="row">
          <div class="col text-center mb-3">
            <span class="vert">
              + {{ XpbyQuestion }}
              <img
                :src="URL_PREFIX + imageURL + edelweissURL"
                class="edelweiss-point"
                alt="points"
                width="28px"
                height="28px"
              />
            </span>
          </div>
        </div>
      </div>

      <template v-for="reponse in reponses" :key="reponse.idReponse">
        <p
          class="text-center"
          v-if="reponse.idQuestion == questions[countQuestion].idQuestion"
        >
          {{ reponse.anecdote }}
        </p>
      </template>
    </template>
    <template v-slot:footer>
      <template v-if="countQuestion == nbOfQuestion - 1">
        <template v-if="user.experience > 1000 * idChapitre">
          <button
            class="btn btn-primary full-width size-button"
            @click="endQuizz()"
          >
            Fin du quizz
          </button>
        </template>
        <template v-if="user.experience <= 1000 * idChapitre">
          <button
            class="btn btn-primary full-width size-button"
            @click="
              endQuizz();
              addExperience(getUserId);
            "
          >
            Fin du quizz
          </button>
        </template>
      </template>
      <template v-else>
        <button
          class="btn btn-primary full-width size-button"
          type="button"
          @click="
            closeModal();
            addCount();
            scrollPage();
          "
        >
          Suivant
        </button>
      </template>
    </template>
  </modal-quizz>

  <modal-quizz
    class="modal-wrong"
    v-show="isModalVisible == 'QuestionModalWrong'"
    @close="closeModal"
  >
    <template v-slot:header>
      <h3 class="rouge">Faux :’(</h3>
    </template>
    <template v-slot:body>
      <div class="container">
        <div class="row">
          <div class="col text-center mb-3">
            <span class="rouge">
              +0
              <img
                :src="URL_PREFIX + imageURL + edelweissURL"
                class="edelweiss-point"
                alt="points"
                width="28px"
                height="28px"
              />
            </span>
          </div>
        </div>
      </div>
    </template>
    <template v-slot:footer>
      <template v-if="countQuestion == nbOfQuestion - 1">
        <template v-if="user.experience > 1000 * idChapitre">
          <button
            class="btn btn-primary full-width size-button"
            @click="endQuizz()"
          >
            Fin du quizz
          </button>
        </template>
        <template v-if="user.experience <= 1000 * idChapitre">
          <button
            class="btn btn-primary full-width size-button"
            @click="
              endQuizz();
              addExperience(getUserId);
            "
          >
            Fin du quizz
          </button>
        </template>
      </template>
      <template v-else>
        <button
          class="btn btn-primary full-width size-button"
          type="button"
          @click="
            closeModal();
            addCount();
            scrollPage();
          "
        >
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
      <template
        v-if="user.experience + score * XpbyQuestion >= 1000 * idChapitre"
      >
        <template v-if="idChapitre < 12">
          <div class="row text-center">
            <div class="col pl-4">
              <p>Bravo, niveau réussi !</p>
            </div>
          </div>
        </template>
        <template v-if="idChapitre >= 12">
          <div class="row text-center">
            <div class="col pl-4">
              <p>
                Bravo tu as fini le jeu, tu participes donc au tirage au sort
                pour tenter de gagner 2 cartes journalières ! <br />
                Grâce à tous tes badges tu peux maintenant aller pique-niquer au
                Lavaux ;)
              </p>
            </div>
          </div>
        </template>
      </template>

      <div class="container">
        <div class="row">
          <div class="col">
            <p>Réponses justes : {{ score }} / {{ questions.length - 1 }}</p>
            <p>
              Total : {{ score * XpbyQuestion }}
              <img
                class="edelweiss-point"
                :src="URL_PREFIX + imageURL + edelweissURL"
                alt="points"
              />
            </p>
          </div>
        </div>

        <template v-if="user">
          <template
            v-if="user.experience + score * XpbyQuestion >= 1000 * idChapitre"
          >
            <div class="container">
              <div class="row">
                <div class="col text-center pr-0">
                  <template
                    v-for="chapitre in chapitres"
                    :key="chapitre.idChapitre"
                  >
                    <router-link :to="URL_PREFIX + 'accueil'">
                      <p
                        class="btn btn-play small mx-auto etape"
                        v-if="parseInt(idChapitre) + 1 == chapitre.idEtape"
                      >
                        {{ chapitre.nom }}
                      </p>
                    </router-link>
                  </template>
                </div>
              </div>

              <div class="row text-right border-bottom my-4">
                <div class="col pr-0">
                  <img
                    class="train-badge"
                    :src="URL_PREFIX + vectorURL + 'train-entier.svg'"
                    alt="train"
                  />
                </div>
              </div>

              <div class="row text-center">
                <div class="col pl-4">
                  <h3 class="pb-4">Badge débloqué :</h3>
                  <template v-for="badge in badges" :key="badge.idEtape">
                    <div v-if="badge.idEtape == idChapitre">
                      <img
                        :src="URL_PREFIX + vectorURL + badge.badgeUrl"
                        alt="Nouveau badge"
                        class="badge-recu pt-2"
                      />
                    </div>
                  </template>
                </div>
              </div>
            </div>
          </template>
          <template
            v-if="user.experience + score * XpbyQuestion < 1000 * idChapitre"
          >
            <div class="container">
              <div class="row">
                <div class="col text-center pr-0">
                  <template
                    v-for="chapitre in chapitres"
                    :key="chapitre.idChapitre"
                  >
                    <p
                      class="btn btn-play small mx-auto etape"
                      v-if="idChapitre == chapitre.idEtape"
                    >
                      {{ chapitre.nom }}
                    </p>
                  </template>
                </div>
              </div>

              <div class="row text-left border-bottom my-4">
                <div class="col pl-0">
                  <img
                    class="train-badge"
                    :src="URL_PREFIX + vectorURL + 'train-entier.svg'"
                    alt="train"
                  />
                </div>
              </div>
              <div class="row text-center">
                <div class="col pl-4 pt-4">
                  <p>
                    Tu n'as pas assez d'Edelweiss pour passer à la prochaine
                    étape.<br />
                    Retente ta chance !
                  </p>
                </div>
              </div>
            </div>
          </template>
        </template>
      </div>
    </template>

    <template v-slot:footer>
      <a
        :href="URL_PREFIX + 'accueil'"
        class="btn btn-primary full-width size-button"
        >Suivant</a
      >
    </template>
  </modal-end>
  <div></div>
</template>



<style scoped>
.title-question {
  margin-left: -50px;
}
.size-button {
  max-width: 350px;
}

.pointer {
  cursor: pointer;
}
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

.badge-recu {
  height: 115px;
  border: 4px solid var(--primary-color);
  border-radius: 25px;
  padding: 5px;
}

.train-badge {
  width: 250px;
}
.etape {
  font-size: 15px;
  padding: 10px;
}

@media (min-width: 768px) {
  .double:first-child {
    text-align: right !important;
  }
}
</style>
