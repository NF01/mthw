<script>
import { computed, ref, watch, watchEffect } from "vue";

export default {
  components: {},
  props: {},
  setup(props, context) {
    const getUserId = ref(window.idUser);
    const URL_PREFIX = ref(window.URL_PREFIX);
    const vectorURL = ref(window.vectorURL);

    const chapitres = ref([]);

    const fetchChapitre = async () => {
      const result = await fetch(URL_PREFIX.value + "api/chapitres/");
      const data = await result.json();
      chapitres.value = data;
    };
    fetchChapitre();

    return { getUserId, chapitres, vectorURL, URL_PREFIX };
  },
};
</script>

<template>
  <div class="custom-nav">
    <div class="row">
      <div class="col">i</div>
      <div class="col text-right">790</div>
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
                  v-if="chapitre.idEtape % 2 == 0"
                  class="illustration-background"
                  :src="URL_PREFIX + vectorURL + chapitre.illustrationUrl"
                  alt=""
                  width="250px"
                  height="100%"
                />
              </div>
            </div>
            <div class="row">
              <router-link
                :to="{
                  name: 'quizz',
                  params: { idChapitre: chapitre.idEtape },
                }"
                class="btn btn-play small mx-auto"
              >
                {{ chapitre.nom }}
              </router-link>
            </div>
          </div>
        </template>
        <!-- END -->
        <div class="town" v-if="chapitres[chapitres.length - 1]">
          <div class="row text-center justify-content-center">
            <img
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
            <router-link
              :to="{
                name: 'quizz',
                params: { idChapitre: chapitres[chapitres.length - 1].idEtape },
              }"
              class="btn btn-play small mx-auto"
            >
              {{ chapitres[chapitres.length - 1].nom }}
            </router-link>
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
</template>

<style scoped>
</style>
