<script>
import { computed, ref, watch, watchEffect } from "vue";

export default {
  components: {},
  setup(props, context) {
    const currentUser = ref([]);

    // //TO REPLACE WITH LARAVEL LOGIN'S INFO
    const fetchget = async () => {
      const result = await fetch("http://127.0.0.1:8000/api/user/5");
      const data = await result.json();
      currentUser.value = data;
    };
    fetchget();
    const getUserId = ref(window.idUser);
            console.log(getUserId.value);

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

    //return vue
    return {
      currentUser,
      addExperience,
      getUserId
    };
  },
};
</script>

<template>
<p>user {{getUserId}}</p>
  <div>
    <h1>Experience</h1>
    <h3>User : {{ currentUser.name }}</h3>
    <h3>Experience : {{ currentUser.experience }}</h3>
    <button class="btn btn-primary" @click="addExperience(getUserId)">
      Add Experience
    </button>
  </div>
</template>

<style scoped>
</style>