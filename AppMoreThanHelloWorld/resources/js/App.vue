<script>
    import {
        computed,
        ref,
        watch,
        watchEffect
    } from 'vue';

    export default {
        components: {
            
        },
        props: {
        },
        setup(props, context) {

        }
    }
    


<template :user={{ auth()->user() }}>
    <div>
        <router-view />
        <div id="nav">
            <router-link to="/accueil">Home</router-link> |
            <router-link to="/profil">Profil</router-link> |
            <router-link to="/ranking">Classement</router-link> |
            <router-link to="/admin">Admin</router-link>
            <!-- <router-link to="/info">Info</router-link> | -->
            <router-link to="/experience">Experience</router-link>
        </div>
    </div>
</template>

<script>
       export default {
        props: ['user'],
        data(){
            return {

            }
        },
        mounted() {
            console.log(this.user)
        }
    }

</script>
<style>

</style>