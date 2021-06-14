<script>
import { computed, ref, watch, watchEffect } from "vue";

export default {
  components: {},
  setup(props, context) {
    const URL_PREFIX = window.URL_PREFIX;
    const imageURL = ref(window.imageURL);
    const edelweissURL = ref(window.edelweissURL);
    return { URL_PREFIX, imageURL, edelweissURL };
  },
};
</script>

<template>
  <div class="container">
    <div class="row mx-0">
      <div class="col-lg-8 mx-auto px-0">
        <h2>Résultats</h2>
        <template v-for="n in 8" :key="n">
          <div class="container-resultat">
            <div class="titre">Bâle</div>
            <div class="date">27.05.2021</div>
            <div class="score">50</div>
            <div class="icon">
              <img
                :src="URL_PREFIX + imageURL + edelweissURL"
                alt=""
                width="28px"
                height="28px"
              />
            </div>
          </div>
        </template>
        <div class="row pt-4">
          <!-- <a href="#" class="btn btn-primary small mx-auto"
            >Voir tous les résultats</a
          > -->
          <a class="btn btn-primary small mx-auto" href="#resultats" uk-toggle
            >Voir tous les résultats</a
          >
        </div>
      </div>
    </div>
  </div>

  <div id="resultats" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2">
      <header class="row border-bottom py-2">
        <div class="col-auto">
          <button
            class="uk-modal-close-default"
            type="button"
            uk-close
          ></button>
        </div>
        <div class="col text-center">
          <h2>Résultats</h2>
        </div>
      </header>
      <div class="row align-items-center py-4">
        <div class="col badges-container">
          <template v-for="n in 15" :key="n">
            <div class="container-resultat">
              <div class="titre">Bâle</div>
              <div class="date">27.05.2021</div>
              <div class="score">50</div>
              <div class="icon">
                <img
                  :src="URL_PREFIX + imageURL + edelweissURL"
                  alt=""
                  width="28px"
                  height="28px"
                />
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
</style>
