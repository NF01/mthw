<script>
import Question from '../components/Question.vue';

  export default {
    components: {
      Question
    },
    setup(){
      console.log("setupQuizz");
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