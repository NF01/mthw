<script>
import { ref, watch, watchEffect } from "vue";
export default {
  components: {},
  setup(props, context) {
    const isModalVisible = ref("");
    const showModal = () => (isModalVisible.value = true);
    const closeModal = () => (isModalVisible.value = false);

    //add question

            //add question
            const fetchpostQ = async () => {
                const result = await fetch("/api/questions", {
                    method: "POST",
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        enonceQuestion: "test from fetch api zuzuzuzu  3",
                        typeQuestion: 1,
                        idEtapeQuestion: 2,
                    })
                })
                // const data = await result.json();
                // console.log(data);
            };

    const fetchPostQuestion = () => fetchpostQ();
    var rootElement = document.documentElement;
    function scrollToTop() {
      // Scroll to top logic
      rootElement.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    }

    return {
      isModalVisible,
      showModal,
      closeModal,
      fetchPostQuestion,
      scrollToTop,
    }
    
  },

};
</script>

<template>
  <div class="container">
    <div class="row mx-0">
      <div class="col-lg-8 mx-auto px-0">
        <div class="row header">
          <h1>Questions</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container pt-2 pb-4">
    <div class="row mx-0">
      <div class="col-lg-8 mx-auto px-0">
        <div class="row row-btn">
          <a class="btn btn-primary mx-auto edit-icon" href="#edit1" uk-toggle
            >Ajouter</a>
            <a class="btn btn-primary mx-auto edit-icon" href="#edit2" uk-toggle
            >Ajouter</a>
            <a class="btn btn-primary mx-auto edit-icon" href="#edit3" uk-toggle
            >Ajouter</a>
            <a class="btn btn-primary mx-auto edit-icon" href="#edit4" uk-toggle
            >Ajouter</a>
            <a class="btn btn-primary mx-auto edit-icon" href="#edit5" uk-toggle
            >Ajouter</a>
            <a class="btn btn-primary mx-auto edit-icon" href="#edit6" uk-toggle
            >Ajouter</a>
            <a class="btn btn-primary mx-auto edit-icon" href="#edit7" uk-toggle
            >Ajouter</a
          >
        </div>
      </div>
    </div>
    <!--Close modal-->
    <div id="close" class="uk-flex-top " uk-modal>
      <div
        class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2"
      >
      <div class="col pt-4">
        <p>Es-tu sûr de vouloir annuler la nouvelle question ?</p>
      </div>
      <div class="row border-top pt-4 mt-auto">
            <div class="col">
              <div class="row my-3">
                <div class="col">
                  <button class="btn btn-primary full-width">
                  Oui
                </button>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-secondary full-width">
                  Non
                </button>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>

    <!--Modal page 1-->
    <div id="edit1" class="uk-flex-top" uk-modal>
      <div
        class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2"
      >
        <form method="POST" action="{{ route('login') }}" class="col px-2">
          <header class="row border-bottom py-2">
            <div class="col-auto">
              <button
                class="uk-button uk-modal-close-default"
                type="button"
                href="#close" 
                uk-toggle
              ></button>
            </div>
            <div class="col text-center">
              <h2 class="mb-1">Ajouter</h2>
            </div>
          </header>
          <div class="row align-items-center">
            <div class="col py-default">
              <h3>Quel est le type de la question ?</h3>
              <input
                type="button"
                class="btn btn-secondary full-width input-mobile"
                value="Vrai/Faux avec image"
              />
              <input
                type="button"
                class="btn btn-secondary full-width input-mobile"
                value="Vrai/Faux sans image"
              />
              <input
                type="button"
                class="btn btn-secondary full-width input-mobile"
                value="Vrai/Faux avec réponse en image"
              />
              <input
                type="button"
                class="btn btn-secondary full-width input-mobile"
                value="QCM avec image"
              />
              <input
                type="button"
                class="btn btn-secondary full-width input-mobile"
                value="QCM sans image"
              />
            </div>
          </div>
          <div class="row border-top pt-4 mt-auto">
            <div class="col">
              <div class="row my-3">
                <button type="submit" class="btn btn-primary full-width">
                  Valider
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!--Modal page 2-->
     <div id="edit2" class="uk-flex-top" uk-modal>
      <div
        class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2"
      >
        <form method="POST" action="{{ route('login') }}" class="col px-2">
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
          <div class="row align-items-center">
            <div class="col py-default">
              <div class="container">
              <h3>À quelle étape appartient la question ?</h3>
              <div class="row">
                <div class="col">
                <div type="button" class="btn btn-secondary  canton-btn full-width mb-3">Vaud</div>
                </div>
                 <div class="col">
                <div type="button" class="btn btn-secondary  canton-btn full-width">Lucerne</div>
                <div class="w-100"></div>
                </div>
              </div>       
              <div class="row">
                <div class="col">
                <div type="button" class="btn btn-secondary  canton-btn full-width mb-3">Fribourg</div>
                </div>
                 <div class="col">
                <div type="button" class="btn btn-secondary canton-btn full-width">Schaffouse</div>
                <div class="w-100"></div>
                </div>
              </div>            
              <div class="row">
                <div class="col">
                <div type="button" class="btn btn-secondary canton-btn full-width mb-3">Valais</div>
                </div>
                 <div class="col">
                <div type="button" class="btn btn-secondary canton-btn full-width">Bâle</div>
                <div class="w-100"></div>
                </div>
              </div> 
              <div class="row">
                <div class="col">
                <div type="button" class="btn btn-secondary canton-btn full-width mb-3">Tessin</div>
                </div>
                 <div class="col">
                <div type="button" class="btn btn-secondary canton-btn full-width">Berne</div>
                <div class="w-100"></div>
                </div>
              </div>
               <div class="row">
                <div class="col">
                <div type="button" class="btn btn-secondary canton-btn full-width mb-3">Grisons</div>
                </div>
                 <div class="col">
                <div type="button" class="btn btn-secondary canton-btn full-width">Neuchâtel</div>
                <div class="w-100"></div>
                </div>
              </div>
               <div class="d-flex justify-content-center">
               <input
                class="btn btn-secondary canton-btn col-5 input-mobile"
                value="Lavaux"
              />
              </div>
            </div>
          </div>
          </div>
          <div class="row border-top pt-4 mt-auto">
            <div class="col">
              <div class="row my-3">
                <div class="col">
                  <button class="btn btn-secondary full-width">
                  Retour
                </button>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary full-width">
                  Valider
                </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!--Modal page 3 vrai faux image-->
    <div id="edit3" class="uk-flex-top uk-modal-container " uk-modal>
      <div
        class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2"
      >
        <form method="POST" action="{{ route('login') }}" class="col px-2">
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
                  <button class="btn btn-secondary full-width">
                  Retour
                </button>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary full-width">
                  Valider
                </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!--Modal page 3 vrai faux sans image-->
    <div id="edit4" class="uk-flex-top uk-modal-container " uk-modal>
      <div
        class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2"
      >
        <form method="POST" action="{{ route('login') }}" class="col px-2">
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
                  <button class="btn btn-secondary full-width">
                  Retour
                </button>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary full-width">
                  Valider
                </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!--Modal page 3 vrai faux sans image-->
    <div id="edit5" class="uk-flex-top uk-modal-container " uk-modal>
      <div
        class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2"
      >
        <form method="POST" action="{{ route('login') }}" class="col px-2">
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
                  <button class="btn btn-secondary full-width">
                  Retour
                </button>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary full-width">
                  Valider
                </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!--Modal qcm avec image-->
    <div id="edit6" class="uk-flex-top uk-modal-container" uk-modal>
      <div
        class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2"
      >
        <form method="POST" action="{{ route('login') }}" class="col px-2">
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
                  <button class="btn btn-secondary full-width">
                  Retour
                </button>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary full-width">
                  Valider
                </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!--Modal qcm sans image-->
    <div id="edit7" class="uk-flex-top uk-modal-container" uk-modal>
      <div
        class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2"
      >
        <form method="POST" action="{{ route('login') }}" class="col px-2">
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
                  <button class="btn btn-secondary full-width">
                  Retour
                </button>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary full-width">
                  Valider
                </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

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
      <div class="col-6 btn btn-primary full-width">
        <p>Effacer</p>
      </div>
      <div class="col-6 btn btn-secondary full-width">
        <p>Modifier</p>
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
  
  <div>
    <button @click="fetchPostQuestion()">update</button>
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
  .canton-btn{
    font-size: 13px;
  }
}
</style>
