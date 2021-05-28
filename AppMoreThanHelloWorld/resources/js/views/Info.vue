<script>
    import ExampleComponent from '../components/ExampleComponent.vue';
    import Hello from '../components/Hello.vue';

    export default {
        components: {
            Hello,
            ExampleComponent
        },
    setup(){
      console.log("setupInfo");
    },        
    }

</script>

<template>
    <div>
        <h1>Info</h1>
        <hello></hello>
    </div>
</template>

<style scoped>

</style>
