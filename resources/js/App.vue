<script>
import { computed, ref, watch, watchEffect } from "vue";
import { useRoute } from "vue-router";

export default {
  components: {},
  props: {},
  setup(props, context) {
    const URL_PREFIX = ref(window.URL_PREFIX);
    const vectorURL = ref(window.vectorURL);
    const isAdmin = ref(window.isAdmin);

    const route = useRoute();

    // fetch the user information when params change
    watch(() => route.params.id);

    return { vectorURL, URL_PREFIX, isAdmin, route };
  },
};
</script>

<template>
  <router-view />
  <div class="navigation row" :class="route.name">
    <div class="col-lg-8 mx-auto">
      <div class="row">
        <div class="col">
          <router-link :to="URL_PREFIX + 'accueil'"
            ><img
              :src="URL_PREFIX + vectorURL + 'train_couleur.svg'"
              alt="accueil"
              class="current img-nav"
          /></router-link>
        </div>
        <div class="col">
          <router-link :to="URL_PREFIX + 'profil'"
            ><img
              :src="URL_PREFIX + vectorURL + 'profil_couleur.svg'"
              alt="profil"
              class="img-nav"
          /></router-link>
        </div>
        <div class="col">
          <router-link :to="URL_PREFIX + 'ranking'"
            ><img
              :src="URL_PREFIX + vectorURL + 'classement_couleur.svg'"
              alt="classement"
              class="img-nav"
          /></router-link>
        </div>
        <div class="col" v-if="isAdmin == 1">
          <router-link :to="URL_PREFIX + 'admin'"
            ><img
              :src="URL_PREFIX + vectorURL + 'question_couleur.svg'"
              alt="admin"
              class="img-nav"
          /></router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.navigation {
  position: fixed;
  bottom: 0;
  left: 0;
  z-index: 100;
  background-color: white;
  justify-content: space-around;
  box-shadow: rgba(0, 0, 0, 0.15) 0 6px 15px;
  text-align: center;
  width: 100%;
  margin: auto;
  padding-top: 1.3rem;
  padding-bottom: 1.3rem;
}
.navigation.quizz {
  display: none;
}

.img-nav {
  width: 70px;
  height: 40px;
}
.navigation > col:not(:last-child)::after {
  content: "|";
}

.navigation .img-nav {
  filter: grayscale(100%);
  opacity: 0.6;
}

a.router-link-active.router-link-exact-active .img-nav {
  filter: none;
  opacity: 1;
}
</style>