<script>
    import {
        ref,
        computed
    } from 'vue';

    export default {
        props: {
        'count': {type: Number},
        },

        setup(props, context) {
        },
    }
</script>

<template>
    <div class="progressbar">
        <template v-for="(n, i) in 8" :key="i">
            <div v-if="i <= count " class="progressbar-item red"></div>
            <div v-if="i > count " class="progressbar-item black"></div>
        </template>
    </div>
</template>

<style scoped>
    .progressbar{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
  }

  .progressbar-item{
    width: 20px;
    height: 10px;
    border-radius: 4px;
  }

  .red {
    background-color:#da291c;
  }

  .black {
    background-color:#DADADA;
  }
</style>