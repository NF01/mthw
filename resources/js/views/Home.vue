<script>
import { computed, ref, watch, watchEffect } from "vue";

export default {
  components: {},
  props: {},
  setup(props, context) {
    const getUserId = ref(window.idUser);
    const URL_PREFIX = ref(window.URL_PREFIX);
    const vectorURL = ref(window.vectorURL);

    const user = ref([]);
    const currentUserLevel = ref([]);


    const chapitres = ref([]);


    const fetchUser = async () => {
      const result = await fetch(URL_PREFIX.value + "api/user/" + getUserId.value);
      user.value = await result.json();
      console.log(user.value);
    };
    fetchUser();

    const getUserLevel = async () => {
      const result = await fetch(
        URL_PREFIX.value + "api/user/" + getUserId.value + "/level"
      );
      const level = await result.json();
      var lvl = level;
      currentUserLevel.value = ++lvl;
      console.log(currentUserLevel.value);
    };
    getUserLevel();

    const fetchChapitre = async () => {
      const result = await fetch(URL_PREFIX.value + "api/chapitres/");
      const data = await result.json();
      chapitres.value = data;
      console.log(chapitres.value);
    };
    fetchChapitre();

    return { getUserId, chapitres, vectorURL, URL_PREFIX, user, currentUserLevel };
  },
};
</script>

<template>
  <div class="custom-nav">
    <div class="row">
      <div class="col">
        <a class="mx-auto edit-icon" href="#infos" uk-toggle
            ><img src="/svg/information-button.svg" alt="infos" class="info"></a
          >
      </div>
      <div class="col text-right">{{user.experience}}</div>
    </div>
  </div>
  <div class="container pb-5">
    <div class="row mx-0">
      <div class="col-lg-8 mx-auto px-0 py-5">
        <!-- FIRST -->
        <div class="town" v-if="chapitres[0]">
          <div class="row text-center justify-content-center">
            <img
              class="illustration-background-first"
              :src="URL_PREFIX + vectorURL + chapitres[0].illustrationUrl"
              alt=""
              width="250px"
              height="100%"
            />
          </div>
          <div class="row">
            <router-link
              :to="{
                name: 'quizz',
                params: { idChapitre: chapitres[0].idEtape },
              }"
              class="btn btn-play small mx-auto"
            >
              {{ chapitres[0].nom }}
            </router-link>
          </div>
        </div>
        <!-- CONTAINER TRAIN -->
        <div class="container-train">
          <img
            class="train"
            :src="URL_PREFIX + vectorURL + 'train-top-entier.svg'"
            alt=""
            width="50px"
            height="auto"
          />
          <div class="rails"></div>
        </div>

        <!-- LOGIC -->
        <template v-for="chapitre in chapitres" :key="chapitre.idEtape">
          <!-- MIDDLE -->
          <div
            class="town"
            v-if="chapitre.idEtape != 1 && chapitre.idEtape != chapitres.length"
          >
            <div class="row justify-content-center">
              <div class="illustration-left col text-right">
                <img
                :class="[
                    chapitre.idEtape <= currentUserLevel ? activeClass : 'chapter-locked',
                  ]"               
                  v-if="chapitre.idEtape % 2 != 0"
                  class="illustration-background"
                  :src="URL_PREFIX + vectorURL + chapitre.illustrationUrl"
                  alt=""
                  width="250px"
                  height="100%"
                />
              </div>
              <div class="illustration-right col text-left">
                <img
                :class="[
                    chapitre.idEtape <= currentUserLevel ? activeClass : 'chapter-locked',
                  ]"
                  v-if="chapitre.idEtape % 2 == 0"
                  class="illustration-background"
                  :src="URL_PREFIX + vectorURL + chapitre.illustrationUrl"
                  alt=""
                  width="250px"
                  height="100%"
                />
              </div>
            </div>
            <div class="row"><!-- v-if="user.experience > 1000 * idChapitre"-->

            <template v-if="chapitre.idEtape <= currentUserLevel ">
              <router-link
                :to="{
                  name: 'quizz',
                  params: { idChapitre: chapitre.idEtape },
                }"
                class="btn btn-play small mx-auto"
              >
                {{ chapitre.nom }}
              </router-link>
            </template>

            <template v-if="chapitre.idEtape > currentUserLevel">
              <div
                class="btn btn-play small mx-auto chapter-locked"
              >
                {{ chapitre.nom }}
              </div>
            </template>


            </div>
          </div>
        </template>
        <!-- END -->
        <div class="town" v-if="chapitres[chapitres.length - 1]">
          <div class="row text-center justify-content-center">
            <img
            :class="[
                    chapitres[chapitres.length - 1].idEtape <= currentUserLevel ? activeClass : 'chapter-locked',
                  ]"
              class="illustration-background-end"
              :src="
                URL_PREFIX +
                vectorURL +
                chapitres[chapitres.length - 1].illustrationUrl
              "
              alt=""
              width="250px"
              height="100%"
            />
          </div>
          <div class="row">
            <template v-if="chapitres[chapitres.length - 1].idEtape <= currentUserLevel ">
            <router-link
              :to="{
                name: 'quizz',
                params: { idChapitre: chapitres[chapitres.length - 1].idEtape },
              }"
              class="btn btn-play small mx-auto"
            >
              {{ chapitres[chapitres.length - 1].nom }}
            </router-link>
            </template>
            <template v-if="chapitres[chapitres.length - 1].idEtape > currentUserLevel">
              <div
                class="btn btn-play small mx-auto chapter-locked"
              >
                {{ chapitres[chapitres.length - 1].nom }}
              </div>

            </template>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row text-center mx-0">
    <router-link
      :to="{
        name: 'quizz',
        params: { idChapitre: 9 },
      }"
      class="btn btn-primary mx-auto px-4 py-2"
      style="z-index: 99"
    >
      Jouer
    </router-link>
  </div>
  <!-- <template v-for="chapitre in chapitres" :key="chapitre.idEtape">
    <a class="btn btn-play small mx-auto">
      <router-link
        :to="{
          name: 'quizz',
          params: { idChapitre: chapitre.idEtape },
        }"
      >
        {{ chapitre.nom }}
      </router-link>
    </a>
  </template> -->

  <!--Infos modal-->
  <div id="infos" class="uk-flex-top uk-modal-container" uk-modal>
      <div
        class="uk-modal-dialog uk-margin-auto-vertical px-3 py-2"
      >
      
          <header class="row border-bottom py-2">
            <div class="col-auto">
              <button
                class="uk-modal-close-default"
                type="button"
                uk-close
              ></button>
            </div>
            <div class="col text-center">
              <h2 class="mb-1">Infos</h2>
            </div>
          </header>

          <div class="container" uk-overflow-auto>
            <div class="row pt-5">
              <div class="col">
                <p class="text-justify">“Ça joue ?!” est une application créée par MTHW, rassemblant sept étudiants, dans le cadre d’un cours en ingénierie des médias.
                   Dans la mesure où ceci est réalisé dans un but pédagogique, nous déclinons toute responsabilité en cas de bug.</p>
                   <h2>“Ça joue ?!” Quésaco ?</h2>
                <p class="text-justify">
                  Le but du jeu est de t’offrir un petit tour de Suisse à travers différents cantons en suivant notre ligne de train.<br> Dans chacun des arrêts,
                  tu découvriras un quizz portant sur le canton en question. Dans ces quizz tu découvriras des questions sur le patois, les clichés,
                  les expressions, mais aussi sur des faits typiquement suisses et bien d’autres choses. Afin de valider une étape et de passer au canton suivant,
                  il te faudra réunir 1000 Edelweiss en répondant à ces fameuses questions. Ce qui nous fait au moins 6 réponses justes pour pouvoir avancer. 
                  À la fin de chaque étape, tu recevras un badge représentant un aliment typique de la région où tu te trouves. Tu pourras aussi recevoir,
                  tout au long du jeu, d’autres badges mystères pour féliciter tes hauts faits.<br>
                  Une fois arrivé au Lavaux, le jeu est terminé et tu recevras ton dernier badge. <br> Exceptionnellement, jusqu’au 20 juillet, 
                  une fois que tu as terminé le jeu, ton adresse mail sera ajoutée au tirage au sort pour gagner deux billets de train journaliers en 1ère classe valable dans toute la Suisse. 
                  Le tirage au sort est effectué par les CFF sous contrôle d’un huissier de justice et n’est pas accessible aux employés des CFF ni aux personnes ayant participé à la création du jeu. 
                  Après le tirage au sort, les CFF contacteront par mail la personne ayant gagné. Ainsi, tu pourras peut-être faire le tour de Suisse que nous t’avons proposé dans l’application, 
                  mais en vrai, et riche de tout ce que tu auras appris dans l’application « Ça joue ?! ».
                </p>
              </div>
            </div>
          </div>
          
      </div>
    </div>

</template>

<style scoped>
.info {
  width: 25px;
}

</style>
