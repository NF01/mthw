<script>
    import ExampleComponent from '../../components/ExampleComponent.vue';
    import Hello from '../../components/Hello.vue';

    export default {
        components: {
            Hello,
            ExampleComponent
        },
    setup(){
      console.log("setupProfil");
    },        
    }

</script>

<template>
    <div>
        <h1>Profil</h1>
        <p>Badge</p>
        <p>Resultat</p>
        <p>edition</p>
    </div>
</template>

<style scoped>

</style>
