<script>
import ExampleComponent from '../components/ExampleComponent.vue';
import Hello from '../components/Hello.vue';

  export default {
    components: {
      Hello,
      ExampleComponent
    },
    setup(){
      console.log("setupadmin");
    },
}
</script>

<template>
  <div>
    <h1>Admin Page</h1>
    <hello></hello>
    <example-component></example-component>
  </div>  
</template>

<style scoped>

</style>