<script>
import { computed, ref, watch, watchEffect } from "vue";

export default {
  components: {},
  setup(props, context) {
    const currentUser = ref([]);

    //TO REPLACE WITH LARAVEL LOGIN'S INFO
    const fetchget = async () => {
      const result = await fetch("http://127.0.0.1:8000/api/user/1");
      const data = await result.json();
      currentUser.value = data;
    };
    fetchget();

    const addExperience = (idUser) => {
      // fetch('http://127.0.0.1:8000/api/user/xp/{idUser}', {
      //   method: 'POST',
      //   body: idUser
      // });
      fetch("http://127.0.0.1:8000/api/user/xp", {
        method: "POST",
        headers: new Headers({
          "Content-Type": "application/json",
        }),
        body: JSON.stringify({
          idUser: idUser
        }),
      });
      location.reload();

    };

    //return vue
    return {
      currentUser,
      addExperience,
    };
  },
};
</script>

<template>
  <div>
    <h1>Experience</h1>
    <h3>User : {{ currentUser.name }}</h3>
    <h3>Experience : {{ currentUser.experience }}</h3>
    <button class="btn btn-primary" @click="addExperience(currentUser.id)">
      Add Experience
    </button>
  </div>
</template>

<style scoped>
</style>