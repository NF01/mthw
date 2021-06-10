<script>
export default {
  components: {},
  setup() {
    
    //fetch question & reponse
      const fetchData = async () => {
          // user
          const fetchUser = await fetch( "/api/user/" + getUserId.value);
          user.value = await fetchUser.json();
      };
      fetchData();



  },
};
</script>

<template>
  <div class="page">
    <h1>Classement</h1>
    <section class="container caption">
      <img
        class="img-fluid"
        id="podium"
        src="/img/classement_couleur.png"
        alt="podium"
      />
      <p class="place1">
        <span> Place 1 </span> <br />
        points
      </p>
      <p class="place2">
       <span> Place 2 </span><br />
        points
      </p>
      <p class="place3">
       <span> Place 3 </span> <br />
        points
      </p>
    </section>

    <section class="container">
      <div class="row">
        <p class="col-2 place">4</p>
        <p class="col-6 pseudo">Nom</p>
        <p class="col-2 points">256</p>
        <div class="col-2">
          <img class="image" src="/img/edelweiss.png" alt="points" />
        </div>
      </div>
      <div class="row">
        <p class="col-2 place">5</p>
        <p class="col-6 pseudo">Nom</p>
        <p class="col-2 points">256</p>
        <div class="col-2">
          <img class="image" src="/img/edelweiss.png" alt="points" />
        </div>
      </div>
      <div class="espace">
        <img id="espace" src="/img/petits_points.png" alt="espace" />
      </div>
      <span class="row">
        <p class="col-2 place">6</p>
        <p class="col-6 pseudo">Nom</p>
        <p class="col-2 points">256</p>
        <div class="col-2">
          <img class="image" src="/img/edelweiss.png" alt="points" />
        </div>
      </span>
    </section>
  </div>
</template>

<style scoped>
#podium {
  width: 90vw;
  max-width: 600px;
  padding-top: 8rem;
  padding-bottom: 3rem;
}

#espace {
  width: 1%;
  min-width: 8px;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.pseudo {
  text-align: left;
}

.place {
  text-align: right;
}
.points {
  text-align: right;
  padding-right: 5px;
}
.image {
  width: 30px;
  display: block;
  margin-left: 0;
}

.place2 {
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-285%, -20%);
  color:#2D327D;
}
.place1 {
  position: absolute;
  top: 15%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #DA291C;
}
.place3 {
  position: absolute;
  top: 33%;
  left: 50%;
  transform: translate(182%, 100%);
  color: #F7DB3E;
}

.caption {
  position: relative;
  margin-bottom: 2%;
}

span {
font-weight: bold;
}

@media (max-width: 576px) {

  .image {
    width: 20px;
     text-align: left;
  }

  .place2 {
    position: absolute;
    top: 30%;
    left: 45%;
    transform: translate(-17vw, 1vw);
    font-size: 15px;
  }
  .place1 {
    position: absolute;
    top: 23%;
    left: 52%;
    transform: translate(0vw, -8vw);
    font-size: 15px;
  }
  .place3 {
    position: absolute;
    top: 33%;
    left: 50%;
    transform: translate(25vw, 13vw);
    font-size: 15px;
  }
}

@media (max-width: 575.98px) {
  .place2 {
    position: absolute;
    top: 30%;
    left: 45%;
    transform: translate(-23vw, 3vw);
    font-size: 15px;
  }
  .place1 {
    position: absolute;
    top: 23%;
    left: 52%;
    transform: translate(-6vw, -5vw);
    font-size: 15px;
  }
  .place3 {
    position: absolute;
    top: 33%;
    left: 50%;
    transform: translate(19vw, 15vw);
    font-size: 15px;
  }
}
</style>