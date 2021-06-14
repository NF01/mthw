<script>
import { ref, computed } from 'vue';

export default {
    setup(props) {
        console.log('helloQuestion');
    },
}
</script>

<template>
    <div>
      <p>question</p>
      <p>reponse</p>
    </div>
</template>

<style scoped>

    p {
        background-color: lightgray;
    }

</style>