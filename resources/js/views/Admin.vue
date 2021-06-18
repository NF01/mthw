<script>
import { ref, watch, watchEffect } from "vue";
import ModalAdmin from "../components/Modal/ModalAdmin.vue";

export default {
  components: {
    ModalAdmin,
  },
  setup(props, context) {
    const URL_PREFIX = ref(window.URL_PREFIX);

    const image = ref();
    // const typeQuestion = ref();
    const questionChapitre = ref();
    const questionAdded = ref();
    const typeQuestionId = ref();
    const typeQuestionModal = ref();
    const idImageQuestion = ref();
    //1
    const fetchPostImage = async () => {
      // const getQuestion = await fetch("/api/questions/idC/" + props.idChapitre);
      // questions.value = await getQuestion.json();
    };
    // fetchPostImage() au clic ;

    //2
    const fetchpostQ = async () => {
      // const result = await fetch("http://localhost/mthw/AppMoreThanHelloWorld/public/api/question",
      const result = await fetch("/api/question", {
        method: "POST",
        headers: new Headers({
          "Content-Type": "application/json",
        }),
        credentials: "include",
        body: JSON.stringify({
          enonceQuestion: questionAdded.value,
          typeQuestion: typeQuestionId.value,
          idEtapeQuestion: questionChapitre.value,
          idImageQuestion: idImageQuestion.value,
        }),
      });
      const dataQ = await result.json();
      // console.log(dataQ);
    };

    //3
    const fetchpostR = async () => {
      const result = await fetch("/api/reponse", {
        method: "POST",
        headers: new Headers({
          "Content-Type": "application/json",
        }),
        body: JSON.stringify({
          enonceResponse: "test from fetch api reponse",
          ordreResponse: 1,
          statutResponse: 1,
          anecdoteResponse: "ediedjeidj",
          idQuestionResponse: 14,
          idImageResponse: 1,
        }),
      });
      const dataR = await result.json();
      console.log(dataR);
    };

    //set question type
    const setQuestionType = (modal, id) => {
      typeQuestionModal.value = modal;
      typeQuestionId.value = id;
    };

    //log
    const log = () => {
      console.log("modal : " + typeQuestionModal.value);
      console.log("type : " + typeQuestionId.value);
      console.log("idchapitre : " + questionChapitre.value);
      // console.log("modal : "+isModalVisible.value);
      console.log("question : " + questionAdded.value);
    };

    //modal
    const isModalVisible = ref("");
    // const showModal = () => (isModalVisible.value = true);
    const closeModal = () => {
      isModalVisible.value = false;
      console.log(isModalVisible.value);
    };

    const questionTypeModal = ref("");
    const questionTypeModalfct = (typeQuestion) => {
      isModalVisible.value = typeQuestion;
    };

    function scrollToTop() {
      // Scroll to top logic
      rootElement.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    }

    return {
      isModalVisible,
      // showModal,
      closeModal,
      fetchpostQ,
      fetchpostR,
      scrollToTop,
      typeQuestionModal,
      questionChapitre,
      log,
      questionTypeModalfct,
      questionAdded,
      setQuestionType,
    };
  },
};
</script>

<template>
  <div class="container">
    <div class="row mx-0">
      <div class="col-lg-8 mx-auto px-0">
        <div class="row header">
          <h1>Questions</h1>
          <p>Pas fonctionnel :’(</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container pt-2 pb-4">
    <div class="row mx-0">
      <div class="col-lg-8 mx-auto px-0">
        <div class="row row-btn">
          <button
            @click="isModalVisible = 'adminAddQuestion'"
            class="btn btn-primary"
          >
            Ajouter
          </button>
        </div>
      </div>
    </div>
  </div>

  <!--Modal typequestion-->
  <modal-admin
    v-show="isModalVisible == 'adminAddQuestion'"
    @close="closeModal"
  >
    <template v-slot:header>
      <h3>Ajouter</h3>
    </template>
    <template v-slot:body>
      <h3>Quel est le type de la question ?</h3>
      <input
        type="button"
        class="btn btn-secondary full-width input-mobile"
        value="Vrai/Faux avec image"
        @click="setQuestionType('VFImage', 1)"
      />
      <input
        type="button"
        class="btn btn-secondary full-width input-mobile"
        value="Vrai/Faux sans image"
        @click="setQuestionType('VF', 2)"
      />
      <input
        type="button"
        class="btn btn-secondary full-width input-mobile"
        value="Vrai/Faux avec réponse en image"
        @click="setQuestionType('VFReponseImage', (typeQuestionId = 3))"
      />
      <input
        type="button"
        class="btn btn-secondary full-width input-mobile"
        value="QCM avec image"
        @click="setQuestionType('QCMImage', 4)"
      />
      <input
        type="button"
        class="btn btn-secondary full-width input-mobile"
        value="QCM sans image"
        @click="setQuestionType('QCM', 5)"
      />
    </template>
    <template v-slot:footer>
      <button
        type="button"
        @click="
          isModalVisible = 'adminChapitre';
          log();
        "
        class="btn btn-primary"
      >
        Suivant
      </button>
    </template>
  </modal-admin>

  <!--Modal chapitre-->
  <modal-admin v-show="isModalVisible == 'adminChapitre'" @close="closeModal">
    <template v-slot:header>
      <h3>Ajouter</h3>
    </template>
    <template v-slot:body>
      <h3>À quelle étape appartient la question ?</h3>
      <div class="row">
        <div class="col">
          <div
            type="button"
            class="btn btn-secondary canton-btn full-width mb-3"
            @click="questionChapitre = 1"
          >
            Genève
          </div>
        </div>
        <div class="col">
          <div
            type="button"
            class="btn btn-secondary canton-btn full-width mb-3"
            @click="questionChapitre = 2"
          >
            Vaud
          </div>
        </div>
        <div class="col">
          <div
            type="button"
            class="btn btn-secondary canton-btn full-width"
            @click="questionChapitre = 3"
          >
            Lucerne
          </div>
          <div class="w-100"></div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div
            type="button"
            class="btn btn-secondary canton-btn full-width mb-3"
            @click="questionChapitre = 4"
          >
            Fribourg
          </div>
        </div>
        <div class="col">
          <div
            type="button"
            class="btn btn-secondary canton-btn full-width"
            @click="questionChapitre = 5"
          >
            Schaffouse
          </div>
          <div class="w-100"></div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div
            type="button"
            class="btn btn-secondary canton-btn full-width mb-3"
            @click="questionChapitre = 6"
          >
            Valais
          </div>
        </div>
        <div class="col">
          <div
            type="button"
            class="btn btn-secondary canton-btn full-width"
            @click="questionChapitre = 7"
          >
            Bâle
          </div>
          <div class="w-100"></div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div
            type="button"
            class="btn btn-secondary canton-btn full-width mb-3"
            @click="questionChapitre = 8"
          >
            Tessin
          </div>
        </div>
        <div class="col">
          <div
            type="button"
            class="btn btn-secondary canton-btn full-width"
            @click="questionChapitre = 9"
          >
            Berne
          </div>
          <div class="w-100"></div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div
            type="button"
            class="btn btn-secondary canton-btn full-width mb-3"
            @click="questionChapitre = 10"
          >
            Grisons
          </div>
        </div>
        <div class="col">
          <div
            type="button"
            class="btn btn-secondary canton-btn full-width"
            @click="questionChapitre = 11"
          >
            Neuchâtel
          </div>
          <div class="w-100"></div>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <input
          class="btn btn-secondary canton-btn col-5 input-mobile"
          value="Lavaux"
        />
      </div>
    </template>
    <template v-slot:footer>
      <button
        type="button"
        @click="
          isModalVisible = typeQuestionModal;
          log();
        "
        class="btn btn-primary"
      >
        Suivant
      </button>
    </template>
  </modal-admin>

  <!--Modal page 3 vrai faux image-->
  <modal-admin v-if="isModalVisible == 'VFImage'" @close="closeModal">
    <template v-slot:header>
      <h3>Ajouter</h3>
    </template>
    <template v-slot:body>
      <header class="row border-bottom py-2">
        <div class="col-auto">
          <button
            class="uk-modal-close-default"
            type="button"
            uk-close
          ></button>
        </div>
        <div class="col text-center">
          <h2 class="mb-1">Ajouter</h2>
        </div>
      </header>

      <div class="container">
        <div class="row pt-5">
          <div class="col head-question">
            <p>Type : Vrai/faux avec image</p>
            <p>Étape : Vaud</p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h3>Question</h3>
            <textarea
              class="input-modal full-width"
              row="3"
              placeholder="Quelle est la question ?"
            ></textarea
            ><br />
            <div class="custom-file">
              <input
                type="file"
                class="custom-file-input"
                id="customFileLang"
                lang="fr"
              />
              <label class="custom-file-label" for="customFileLang"
                >Charger une image
              </label>
            </div>
          </div>
        </div>
        <div class="row pt-4">
          <div class="col">
            <h3>Réponse</h3>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <input
              type="button"
              class="btn btn-secondary full-width mb-3"
              value="Vrai"
            />
          </div>
          <div class="col">
            <input
              type="button"
              class="btn btn-secondary full-width"
              value="Faux"
            />
          </div>
          <div class="w-100"></div>
        </div>
        <div class="row pt-4 pb-5">
          <div class="col">
            <h3>Anecdote liée</h3>
            <textarea
              class="input-modal full-width"
              row="3"
              placeholder="Ajouter une anecdote s'il y en a une."
            ></textarea>
          </div>
        </div>
      </div>
      <div class="row border-top pt-4 mt-auto">
        <div class="col">
          <div class="row my-3">
            <div class="col">
              <button class="btn btn-secondary full-width">Retour</button>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary full-width">
                Valider
              </button>
            </div>
          </div>
        </div>
      </div>
    </template>
    <template v-slot:footer>
      <button
        type="button"
        @click="
          isModalVisible = '';
          log();
        "
        class="btn btn-primary"
      >
        Suivant
      </button>
    </template>
  </modal-admin>

  <!--Modal page 3 vrai faux sans image-->
  <modal-admin v-if="isModalVisible == 'VF'" @close="closeModal">
    <template v-slot:header>
      <h3>Ajouter</h3>
    </template>
    <template v-slot:body>
      <header class="row border-bottom py-2">
        <div class="col-auto">
          <button
            class="uk-modal-close-default"
            type="button"
            uk-close
          ></button>
        </div>
        <div class="col text-center">
          <h2 class="mb-1">Ajouter</h2>
        </div>
      </header>
      <div class="container">
        <div class="row pt-5">
          <div class="col head-question">
            <p>Type : Vrai/faux sans image</p>
            <p>Étape : Vaud</p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h3>Question</h3>
            <textarea
              v-model="questionAdded"
              class="input-modal full-width"
              row="3"
              placeholder="Quelle est la question ?"
            ></textarea>
          </div>
        </div>
        <div class="row pt-4">
          <div class="col">
            <h3>Réponse</h3>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <input
              type="button"
              class="btn btn-secondary full-width mb-3"
              value="Vrai"
            />
          </div>
          <div class="col">
            <input
              type="button"
              class="btn btn-secondary full-width"
              value="Faux"
            />
          </div>
          <div class="w-100"></div>
        </div>
        <div class="row pt-4 pb-5">
          <div class="col">
            <h3>Anecdote liée</h3>
            <textarea
              class="input-modal full-width"
              row="3"
              placeholder="Ajouter une anecdote s'il y en a une."
            ></textarea>
          </div>
        </div>
      </div>
      <div class="row border-top pt-4 mt-auto">
        <div class="col">
          <div class="row my-3">
            <div class="col">
              <button class="btn btn-secondary full-width">Retour</button>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary full-width">
                Valider
              </button>
            </div>
          </div>
        </div>
      </div>
    </template>
    <template v-slot:footer>
      <button
        type="button"
        @click="
          isModalVisible = '';
          log();
          fetchpostQ();
          fetchpostR();
        "
        class="btn btn-primary"
      >
        Suivant
      </button>
    </template>
  </modal-admin>

  <!--Modal page 3 vrai faux reponse image-->
  <modal-admin v-if="isModalVisible == 'VFReponseImage'" @close="closeModal">
    <template v-slot:header>
      <h3>Ajouter</h3>
    </template>
    <template v-slot:body>
      <header class="row border-bottom py-2">
        <div class="col-auto">
          <button
            class="uk-modal-close-default"
            type="button"
            uk-close
          ></button>
        </div>
        <div class="col text-center">
          <h2 class="mb-1">Ajouter</h2>
        </div>
      </header>
      <div class="container">
        <div class="row pt-5">
          <div class="col head-question">
            <p>Type : Vrai/faux avec réponse en image</p>
            <p>Étape : Vaud</p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h3>Question</h3>
            <textarea
              class="input-modal full-width"
              row="3"
              placeholder="Quelle est la question ?"
            ></textarea>
          </div>
        </div>
        <div class="row pt-4">
          <div class="col">
            <h3>Réponse</h3>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p>Vrai :</p>
            <div class="custom-file">
              <input
                type="file"
                class="custom-file-input"
                id="customFileLang"
                lang="fr"
              />
              <label class="custom-file-label" for="customFileLang"
                >Vrai image
              </label>
            </div>
          </div>
          <div class="col">
            <p>Faux :</p>
            <div class="custom-file">
              <input
                type="file"
                class="custom-file-input"
                id="customFileLang"
                lang="fr"
              />
              <label class="custom-file-label" for="customFileLang"
                >Fausse image
              </label>
            </div>
          </div>
          <div class="w-100"></div>
        </div>
        <div class="row pt-4 pb-5">
          <div class="col">
            <h3>Anecdote liée</h3>
            <textarea
              class="input-modal full-width"
              row="3"
              placeholder="Ajouter une anecdote s'il y en a une."
            ></textarea>
          </div>
        </div>
      </div>
      <div class="row border-top pt-4 mt-auto">
        <div class="col">
          <div class="row my-3">
            <div class="col">
              <button class="btn btn-secondary full-width">Retour</button>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary full-width">
                Valider
              </button>
            </div>
          </div>
        </div>
      </div>
    </template>
    <template v-slot:footer>
      <button
        type="button"
        @click="
          isModalVisible = '';
          log();
        "
        class="btn btn-primary"
      >
        Suivant
      </button>
    </template>
  </modal-admin>
  <!--Modal qcm avec image-->
  <modal-admin v-if="isModalVisible == 'QCMImage'" @close="closeModal">
    <template v-slot:header>
      <h3>Ajouter</h3>
    </template>
    <template v-slot:body>
      <header class="row border-bottom py-2">
        <div class="col-auto">
          <button
            class="uk-modal-close-default"
            type="button"
            uk-close
          ></button>
        </div>
        <div class="col text-center">
          <h2 class="mb-1">Ajouter</h2>
        </div>
      </header>
      <div class="container">
        <div class="row pt-5">
          <div class="col head-question">
            <p>Type : QCM avec image</p>
            <p>Étape : Vaud</p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h3>Question</h3>
            <div class="row">
              <div class="col">
                <textarea
                  class="input-modal full-width"
                  placeholder="Réponse juste"
                ></textarea>
              </div>
              <div class="col">
                <textarea
                  class="input-modal full-width"
                  placeholder="Réponse fausse"
                ></textarea>
                <div class="w-100"></div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <textarea
                  class="input-modal full-width"
                  placeholder="Réponse fausse"
                ></textarea>
              </div>
              <div class="col">
                <textarea
                  class="input-modal full-width"
                  placeholder="Réponse fausse"
                ></textarea>
                <div class="w-100"></div>
              </div>
            </div>
            <br />
            <div class="custom-file">
              <input
                type="file"
                class="custom-file-input"
                id="customFileLang"
                lang="fr"
              />
              <label class="custom-file-label" for="customFileLang"
                >Charger une image
              </label>
            </div>
          </div>
        </div>
        <div class="row pt-4 pb-5">
          <div class="col">
            <h3>Anecdote liée</h3>
            <textarea
              class="input-modal full-width"
              row="3"
              placeholder="Ajouter une anecdote s'il y en a une."
            ></textarea>
          </div>
        </div>
      </div>
      <div class="row border-top pt-4 mt-auto">
        <div class="col">
          <div class="row my-3">
            <div class="col">
              <button class="btn btn-secondary full-width">Retour</button>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary full-width">
                Valider
              </button>
            </div>
          </div>
        </div>
      </div>
    </template>
    <template v-slot:footer>
      <button
        type="button"
        @click="
          isModalVisible = '';
          log();
        "
        class="btn btn-primary"
      >
        Suivant
      </button>
    </template>
  </modal-admin>

  <!--Modal qcm sans image-->
  <modal-admin v-if="isModalVisible == 'QCM'" @close="closeModal">
    <template v-slot:header>
      <h3>Ajouter</h3>
    </template>
    <template v-slot:body>
      <header class="row border-bottom py-2">
        <div class="col-auto">
          <button
            class="uk-modal-close-default"
            type="button"
            uk-close
          ></button>
        </div>
        <div class="col text-center">
          <h2 class="mb-1">Ajouter</h2>
        </div>
      </header>
      <div class="container">
        <div class="row pt-5">
          <div class="col head-question">
            <p>Type : QCM sans image</p>
            <p>Étape : Vaud</p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h3>Question</h3>
            <div class="row">
              <div class="col">
                <textarea
                  class="input-modal full-width"
                  placeholder="Réponse juste"
                ></textarea>
              </div>
              <div class="col">
                <textarea
                  class="input-modal full-width"
                  placeholder="Réponse fausse"
                ></textarea>
                <div class="w-100"></div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <textarea
                  class="input-modal full-width"
                  placeholder="Réponse fausse"
                ></textarea>
              </div>
              <div class="col">
                <textarea
                  class="input-modal full-width"
                  placeholder="Réponse fausse"
                ></textarea>
                <div class="w-100"></div>
              </div>
            </div>
            <br />
          </div>
        </div>
        <div class="row pt-4 pb-5">
          <div class="col">
            <h3>Anecdote liée</h3>
            <textarea
              class="input-modal full-width"
              row="3"
              placeholder="Ajouter une anecdote s'il y en a une."
            ></textarea>
          </div>
        </div>
      </div>
      <div class="row border-top pt-4 mt-auto">
        <div class="col">
          <div class="row my-3">
            <div class="col">
              <button class="btn btn-secondary full-width">Retour</button>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary full-width">
                Valider
              </button>
            </div>
          </div>
        </div>
      </div>
    </template>
    <template v-slot:footer>
      <button
        type="button"
        @click="
          isModalVisible = '';
          log();
        "
        class="btn btn-primary"
      >
        Suivant
      </button>
    </template>
  </modal-admin>

  <div class="container">
    <!--Liste des questions-->
    <div class="row head-question">
      <div class="col-2">
        <select class="select-header" name="ids">
          <option value="">ID</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
      <div class="col-5">
        <p>Question</p>
      </div>
      <div class="col-3">
        <p>Type</p>
      </div>
      <div class="col-2 d-sm-block d-none">
        <p class="">Niveau</p>
      </div>
      <div class="col-2 d-block d-sm-none">
        <p class="">Niv</p>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-2">
        <p>1</p>
      </div>
      <div class="col-5">
        <p>De quel canton provient cette plaque de voiture ?</p>
      </div>
      <div class="col-3">
        <p>QCM avec image</p>
      </div>
      <div class="col-2">
        <p>1</p>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary full-width">Effacer</a>
      </div>
      <div class="col-6">
        <a
          class="btn btn-secondary full-width"
          style="padding-top: 15px; padding-bottom: 15px"
          >Modifier</a
        >
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-2">
        <p>1</p>
      </div>
      <div class="col-5">
        <p>De quel canton provient cette plaque de voiture ?</p>
      </div>
      <div class="col-3">
        <p>QCM avec image</p>
      </div>
      <div class="col-2">
        <p>1</p>
      </div>
    </div>
    <div class="col">
      <div class="row">
        <div class="col">
          <a @click="scrollToTop()" id="scrollToTopBtn">
            <img src="/img/fleche.png" />
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.head-question {
  color: #c5c5c5;
}

.select-header {
  border: none;
  background-color: #f8fafc;
}

.row-btn {
  padding: 60px 0 60px 0;
}

.input-mobile {
  margin-bottom: 15px;
}

h3 {
  margin-bottom: 31px;
}

option {
  background-color: white;
  color: black;
}

.input-modal {
  color: #c5c5c5;
  border: 1px solid #c5c5c5;
}

option:hover {
  background-color: var(--primary-color);
}

.custom-file-label::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 3;
  display: block;
  height: calc(1.6em + 0.75rem);
  padding: 0.375rem 0.75rem;
  line-height: 1.6;
  color: white;
  content: "Charger";
  background-color: var(--primary-color);
  border-left: inherit;
  border-radius: 0 0.25rem 0.25rem 0;
}

#scrollToTopBtn {
  width: 30px;
  text-align: center;
  margin: auto;
  display: flex;
}

.center-btn-left {
  margin-left: 30px;
  padding: 15px 62px 15px 62px;
}

.center-btn-right {
  margin-right: 30px;
  padding: 15px 62px 15px 62px;
}

@media (max-width: 576px) {
  .canton-btn {
    font-size: 13px;
  }
}
</style>
