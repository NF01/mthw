<script>
import { computed, ref, watch, watchEffect } from "vue";
import Badges from "../components/ProfilComponents/Badges.vue";
import Resultat from "../components/ProfilComponents/Resultat.vue";

export default {
  components: {
    Badges,
    Resultat,
  },
  setup(props, context) {
    const getUserId = ref(window.idUser);
    const updatedName = ref();
    const updatedEmail = ref();
    const updatedPassword = ref();

    const log = () => {
      // console.log(updatedEmail.value);
      // console.log(updatedName.value);
      // console.log(updatedPassword.value);
      // console.log( getUserId.value);
    };
    const URL_PREFIX = ref(window.URL_PREFIX);

    const allUser = ref([]);
    const user = ref([]);

    const fetchUser = async () => {
      // user
      const fetchUser = await fetch(
        URL_PREFIX.value + "api/user/" + getUserId.value
      );
      user.value = await fetchUser.json();
      //   console.log(user.value);

      const fetchAllUser = await fetch(URL_PREFIX.value + "api/users/xp");
      allUser.value = await fetchAllUser.json();
      //   console.log(allUser.value);
    };
    fetchUser();

    const updateUser = async () => {
      const result = await fetch(URL_PREFIX.value + "api/user", {
        method: "PUT",
        headers: new Headers({
          "Content-Type": "application/json",
        }),
        body: JSON.stringify({
          id: getUserId.value,
          newUserName: updatedName.value,
          newsUserEmail: updatedEmail.value,
          newPassword: updatedPassword.value,
        }),
      });
      // const data = await result.json();
    };
    return {
      updateUser,
      URL_PREFIX,
      updatedName,
      updatedEmail,
      updatedPassword,
      log,
      user,
      allUser,
      getUserId,
    };
  },
};
</script>

<template>
  <div class="container">
    <div class="row mx-0">
      <div class="col-lg-8 mx-auto px-0">
        <div class="row header">
          <h1>Profil</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container pt-2 pb-4">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="row justify-content-center pt-3">
          <div class="col">
            <p class="primary">{{ user.name }}</p>
          </div>

          <div class="col text-right">
            <a
              class="btn btn-primary smaller mx-auto edit-icon"
              href="#edit"
              uk-toggle
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="30"
                fill="white"
                class="bi bi-pencil-square"
                viewBox="0 0 16 16"
              >
                <path
                  d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                />
                <path
                  fill-rule="evenodd"
                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                /></svg
            ></a>
          </div>
        </div>
        <div class="row text-center justify-content-center">
          <a :href="URL_PREFIX + 'logout'" class="btn btn-primary small mx-auto"
            >Se déconnecter</a
          >
        </div>
      </div>
    </div>
  </div>

  <div id="edit" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2">
      <form method="PUT" v-on:submit.prevent="updateUser()" class="col px-2">
        <header class="row border-bottom py-2">
          <div class="col-auto">
            <button
              class="uk-modal-close-default"
              type="button"
              uk-close
            ></button>
          </div>
          <div class="col text-center">
            <h2 class="mb-1">Profil - Édition</h2>
          </div>
        </header>
        <div class="row align-items-center">
          <div class="col py-default">
            <div class="form-group">
              <label for="pseudo">Pseudo</label>
              <input
                v-model="updatedName"
                type="pseudo"
                id="pseudo"
                class="form-control"
                name="pseudo"
                placeholder="Nouveau nom"
                autofocus
              />
            </div>
            <div class="form-group">
              <label for="email">Adresse Email</label>
              <input
                v-model="updatedEmail"
                type="email"
                id="email"
                class="form-control"
                name="email"
                placeholder="Nouveau e-mail"
              />
            </div>
            <div class="form-group">
              <label for="password">Mot de passe</label>
              <input
                v-model="updatedPassword"
                type="password"
                id="password"
                class="form-control"
                name="password"
                autocomplete="current-password"
                placeholder="Nouveau mot de passe"
              />
            </div>
          </div>
        </div>
        <div class="row border-top pt-4 mt-auto">
          <div class="col">
            <div class="row my-3">
              <button
                @click="updateUser()"
                type="submit"
                class="btn btn-primary full-width uk-modal-close"
              >
                Modifier
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <badges></badges>
  <!-- <resultat></resultat> -->
</template>
<style scoped>
</style>
