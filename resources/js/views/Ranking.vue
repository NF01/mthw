<script>
import { ref } from "vue";
export default {
  components: {},
  setup() {
    const URL_PREFIX = ref(window.URL_PREFIX);
    const imageURL = ref(window.imageURL);
    const vectorURL = ref(window.vectorURL);
    const getUserId = ref(window.idUser);
    const edelweissURL = ref(window.edelweissURL);

    const allUser = ref([]);
    const user = ref([]);
    // const userPosition = ref([]);

    //fetch question & reponse
    const fetchData = async () => {
      // user
      const fetchUser = await fetch(
        URL_PREFIX.value + "api/user/" + getUserId.value
      );
      user.value = await fetchUser.json();

      const fetchAllUser = await fetch(URL_PREFIX.value + "api/users/xp");
      allUser.value = await fetchAllUser.json();
    };
    fetchData();

    return {
      allUser,
      user,
      getUserId,
      imageURL,
      vectorURL,
      URL_PREFIX,
      edelweissURL,
    };
  },
};
</script>

<template>
  <div class="container">
    <div class="row mx-0">
      <div class="col-lg-8 mx-auto px-0">
        <div class="row header">
          <h1>Classement</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="container caption">
    <img
      class="img-fluid"
      id="podium"
      :src="URL_PREFIX + vectorURL + 'classement_couleur.svg'"
      alt="podium"
    />
    <p class="place1" v-if="allUser[0]">
      <span>{{ allUser[0].name }}</span> <br />
      {{ allUser[0].experience }} points
    </p>
    <p class="place2" v-if="allUser[1]">
      <span>{{ allUser[1].name }}</span> <br />
      {{ allUser[1].experience }} points
    </p>
    <p class="place3" v-if="allUser[2]">
      <span>{{ allUser[2].name }}</span> <br />
      {{ allUser[2].experience }} points
    </p>
  </section>

  <section class="container">
    <div class="row" v-if="allUser[3]">
      <p class="col-2 place">4</p>
      <p class="col-6 pseudo">{{ allUser[3].name }}</p>
      <p class="col-2 points">{{ allUser[3].experience }}</p>
      <div class="col-2">
        <img
          class="edelweiss"
          :src="URL_PREFIX + imageURL + edelweissURL"
          alt="points"
        />
      </div>
    </div>
    <div class="row" v-if="allUser[4]">
      <p class="col-2 place">5</p>
      <p class="col-6 pseudo">{{ allUser[4].name }}</p>
      <p class="col-2 points">{{ allUser[4].experience }}</p>
      <div class="col-2">
        <img
          class="edelweiss"
          :src="URL_PREFIX + imageURL + edelweissURL"
          alt="points"
        />
      </div>
    </div>

    <template v-if="allUser[5]">
      <template v-if="user.experience < allUser[5].experience">
        <div class="espace">
          <img
            id="espace"
            :src="URL_PREFIX + imageURL + 'petits_points.png'"
            alt="espace"
          />
        </div>
        <span class="row">
          <template v-for="(user, index) in allUser" :key="index">
            <template v-if="user.id == getUserId">
              <p class="col-2 place">{{ index }}</p>
            </template>
          </template>

          <p class="col-6 pseudo">{{ user.name }}</p>
          <p class="col-2 points">{{ user.experience }}</p>
          <div class="col-2">
            <img
              class="edelweiss"
              :src="URL_PREFIX + imageURL + edelweissURL"
              alt="points"
            />
          </div>
        </span>
      </template>
    </template>
  </section>
</template>

<style scoped>
section.container.caption {
  text-align: center;
}
#podium {
  width: 90vw;
  max-width: 600px;
  padding-top: 8rem;
  padding-bottom: 3rem; 
   /*   
  padding-top: 150px;
  padding-bottom: 30px;*/
  margin-left: auto;
  margin-right: auto;
    /* position: absolute; */
  display: block;
}

#espace {
  width: 1%;
  min-width: 8px;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
  margin-left: auto;
  margin-right: auto;
  display: block;
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

/*
.image {
  width: 30px;
  display: block;
  margin-left: 0;
}
*/

.edelweiss {
 width: 30px;
}
.place2 {
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-200%, 20%);
  color: #2d327d;
}

.place1 {
  position: absolute;
  top: 15%;
  left: 50%;
  transform: translate(-50%, 0%);
  color: #da291c;
}

.place3 {
  position: absolute;
  top: 33%;
  left: 50%;
  transform: translate(90%,140%);
  color: #f7db3e;
}

.caption {
  position: relative;
  margin-bottom: 2%;
}

span {
  font-weight: bold;
}
@media (max-width: 767px) {
  .image {
    width: 20px;
    text-align: left;
  }

  .place2 {
    position: absolute;
    top: 30%;
    left: 45%;
    transform: translate(-19vw, 3vw);
    font-size: 18px;
  }

  .place1 {
    position: absolute;
    top: 23%;
    left: 52%;
    transform: translate(-20%, -50%);
    font-size: 18px;
  }

  .place3 {
    position: absolute;
    top: 33%;
    left: 50%;
    transform: translate(22vw, 15vw);
    font-size: 18px;
  }
}
/*
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
*/
@media (max-width: 575.98px) {
  .place2 {
    position: absolute;
    top: 30%;
    left: 42%;
    transform: translate(-26vw, 10vw);
    font-size: 13px;
  }

  .place1 {
    position: absolute;
    top: 23%;
    left: 50%;
    transform: translate(-11vw, 2vw);
    font-size: 13px;
  }

  .place3 {
    position: absolute;
    top: 33%;
    left: 48%;
    transform: translate(16vw, 22vw);
    font-size: 13px;
  }
}
</style>
