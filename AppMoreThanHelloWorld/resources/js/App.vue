<script>
    

</script>

<template>
    <div>
        <div id="nav">
            <router-link to="/accueil">Home</router-link> |
            <router-link to="/Admin">Admin</router-link> |
            <router-link to="/Quizz">Quizz</router-link> |
            <router-link to="/Info">Info</router-link> |
            <router-link to="/Profil">Profil</router-link> |
            <router-link to="/Ranking">Classement</router-link>
        </div>
        <router-view />
    </div>
</template>


<style>
    /* #app {
        font-family: Avenir, Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    } */
</style>
