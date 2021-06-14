<script>
import { computed, ref, watch, watchEffect } from "vue";
import _ from "lodash";

export default {
  components: {},
  props: {},
  setup(props, context) {
    const getUserId = ref(window.idUser);
    const URL_PREFIX = ref(window.URL_PREFIX);
    const vectorURL = ref(window.vectorURL);
    const badges = ref([]);
    const currentUserLevel = ref([]);

    const fetchBadge = async () => {
      const result = await fetch(URL_PREFIX.value + "api/badges/");
      const data = await result.json();
      badges.value = data;
      // console.log(badges.value);
    };
    fetchBadge();

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

    return { badges, currentUserLevel, vectorURL, URL_PREFIX };
  },
  computed: {
    productChunks() {
      return _.chunk(Object.values(this.badges), 3);
    },
  },
};
</script>

<template>
  <div class="container pb-5">
    <div class="row mx-0">
      <div class="col-lg-8 mx-auto px-0">
        <h2>Badges</h2>
        <div class="container-scroll">
          <div style="flex-wrap: initial; display: inline-flex">
            <!-- <template
              v-for="badge in badges.slice(0, currentUserLevel - 1)"
              :key="badge.idEtape"
            > -->
            <template v-for="badge in badges" :key="badge.idEtape">
              <div class="badge-container">
                <img
                  :src="URL_PREFIX + vectorURL + badge.badgeUrl"
                  alt=""
                  v-bind:class="[
                    badge.idEtape < currentUserLevel ? activeClass : 'locked',
                  ]"
                />
              </div>
            </template>
          </div>
        </div>
        <div class="row pt-3">
          <!-- <a href="#" class="btn btn-primary small mx-auto">Voir tous les badges</a> -->
          <a class="btn btn-primary small mx-auto" href="#badges" uk-toggle
            >Voir tous les badges</a
          >
        </div>
      </div>
    </div>
  </div>
  <div id="badges" class="uk-flex-top" uk-modal>
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
          <h2>Badges</h2>
        </div>
      </header>
      <div class="row align-items-center py-4">
        <div class="col px-0 badges-container">
          <div
            class="row justify-content-center"
            v-for="i in Math.ceil(badges.length / 3)"
            v-bind:key="i"
          >
            <div
              class="badge-container"
              v-for="badge in badges.slice((i - 1) * 3, i * 3)"
              :key="badge.idEtape"
            >
              <img
                :src="URL_PREFIX + vectorURL + badge.badgeUrl"
                alt=""
                v-bind:class="[
                  badge.idEtape < currentUserLevel ? activeClass : 'locked',
                ]"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
</style>
