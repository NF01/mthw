<script>
    

</script>

<template>
    <div>
        <router-view />
        <div id="nav">
            <router-link to="/accueil">Home</router-link> |
            <router-link to="/admin">Admin</router-link> |
            <router-link to="/quizz">Quizz</router-link> |
            <router-link to="/info">Info</router-link> |
            <router-link to="/profil">Profil</router-link> |
            <router-link to="/ranking">Classement</router-link>
        </div>
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
