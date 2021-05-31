<script>
import Question from '../components/Question.vue';

  export default {
    components: {
      Question
    },
    setup(props, context){

      // const url = "http://localhost/mthw/AppMoreThanHelloWorld/public/api";
      // const fetchget = async () => {
      //   const resp = await fetch(url);
      //   console.log(resp);
      //   resp.json().then(json => console.log(json));
      // }

      // fetchget();

      
      
    },
}
</script>

<template>
  <div>
    <h1>Quizz</h1>
    <question></question>

  </div>
</template>

<style scoped>

</style>