<script>
export default {
  components: {},
  setup() {
    console.log("setupRanking");
  },
};
</script>

<template>
  <div>
    <h1>Classement</h1>
    <section>
        <div id="place2">
            <p>Nom 2</p>
        </div>
      <img id="podium" src="/img/classement_couleur.png" alt="podium" />
    </section>
    <section>
      <div class="container">
        <p class="place">4</p>
        <p class="pseudo">Nom</p>
        <p class="points">256</p>
        <img class="image" src="/img/edelweiss.png" alt="points" />
      </div>
      <div class="container">
        <p class="place">5</p>
        <p class="pseudo">Nom</p>
        <p class="points">256</p>
        <img class="image" src="/img/edelweiss.png" alt="points" />
      </div>
      <div class="espace">
          . <br>
          . <br>
          . <br>
          .
      </div>
      <div class="container">
        <p class="place">4</p>
        <p class="pseudo">Nom</p>
        <p class="points">256</p>
        <img class="image" src="/img/edelweiss.png" alt="points" />
      </div>
    </section>
  </div>
</template>

<style scoped>
#podium {
  width: 40%;
  padding-top: 8rem;
  padding-bottom: 3rem;
}
.place {
    grid-area: place;
}
.pseudo {
    grid-area: pseudo;
    text-align: left;
}
.points {
    grid-area: points;
    text-align: right;
    padding-right: 5px;
}
.image {
    grid-area: image;
   width: 40%;
}
.container {
    display: grid;
    grid-template-columns: 70px auto 80px 70px;
    grid-template-areas: "place pseudo points image";
    padding-left: 15rem;
    padding-right: 15rem;
}
/*
.espace {
    font-size: 50px;
    font-weight: bold;
    color: red;
}*/
#place2 {
    position: absolute;
    margin-left: 20rem;
    margin-top: 20rem;
    
}
</style>