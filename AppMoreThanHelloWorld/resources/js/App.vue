<script>
import { computed, ref, watch, watchEffect } from "vue";

export default {
  components: {},
  props: {},
  setup(props, context) {
    const URL = "/svg";
  },
};
</script>


<template>
    <div>
        <router-view />
        <div id="nav" class="container ">
            <div class="row mw-50 navigation py-4">
                <div class="col">
                    <router-link to="/accueil"><img src="/img/train_couleur.svg" alt="accueil" class="current img-nav"></router-link>
                </div>
                <div class="col">
                    <router-link to="/profil"><img src="/img/profil_couleur.svg" alt="profil" class="img-nav"></router-link>
                </div>
                <div class="col">
                    <router-link to="/ranking"><img src="/img/classement_couleur.svg" alt="classement" class="img-nav"></router-link>
                </div>
                <div class="col">
                    <router-link to="/admin"><img src="/img/question_couleur.svg" alt="admin" class="img-nav"></router-link>
                </div>
                
                
                <!-- <router-link to="/info">Info</router-link> | -->
                <!--router-link to="/experience">Experience</router-link-->
            </div>
            
        </div>
    </div>
  </div>
</template>

<style>
.navigation {
    background-color: white;
    justify-content: space-around;
    box-shadow: rgba(0, 0, 0, .15) 0 6px 15px;
    text-align:center;
}
.img-nav {
    width: 70px;
    height: 40px;
    
}
.navigation > col:not(:last-child)::after {
    content: "|"
}

</style>