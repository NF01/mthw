  <script>
import { computed, ref, watch, watchEffect } from "vue";
import { useRoute } from "vue-router";

export default {
  components: {},
  props: {},
  setup(props, context) {
    const getUserId = ref(window.idUser);
    const URL_PREFIX = ref(window.URL_PREFIX);
    const vectorURL = ref(window.vectorURL);
    const imageURL = ref(window.imageURL);
    const edelweissURL = ref(window.edelweissURL);

    const user = ref([]);
    const currentUserLevel = ref([]);

    const chapitres = ref([]);

    const trainDefaultPosition = -990;
    const trainIncrement = 385;
    const trainPosition = ref(0);
    const trainAnimation = ref();

    const route = useRoute();

    window.scrollTo(0, 0);
    const fetchUser = async () => {
      const result = await fetch(
        URL_PREFIX.value + "api/user/" + getUserId.value
      );
      user.value = await result.json();
    };

    const getUserLevel = async () => {
      const result = await fetch(
        URL_PREFIX.value + "api/user/" + getUserId.value + "/level"
      );
      const level = await result.json();
      var lvl = level;
      currentUserLevel.value = ++lvl;
      trainPosition.value =
        parseInt(trainDefaultPosition) +
        parseInt(trainIncrement) * parseInt(currentUserLevel.value);

      trainAnimation.value =
        currentUserLevel.value > 2
          ? "top " +
            parseInt(currentUserLevel.value * 0.35) +
            "s cubic-bezier(0.33, -0.01, 0.76, 0.99)"
          : "top 0s";
      $("html, body").animate({ scrollTop: trainPosition.value + 600 }, 2500);
    };

    const scrollToTrain = () => {
      if (document.readyState == "complete") {
        var currentLevel = currentUserLevel.value;
        var anchor =
          currentLevel == chapitres.value.length + 1 ? "final" : currentLevel;

        $("html, body").animate(
          { scrollTop: $("#etape-" + anchor).offset().top },
          2000
        );
      }
    };

    const fetchChapitre = async () => {
      const result = await fetch(URL_PREFIX.value + "api/chapitres");
      const data = await result.json();
      chapitres.value = data;
      watch(
        () => route.params.id,
        () => {
          console.log("hey");
        }
      );

      // watch(() => {
      //   console.log(route.params.id);
      //   scrollToTrain();
      //   console.log("scroll");
      // });

      // document.onreadystatechange = () => {
      //   scrollToTrain();
      // };
    };

    fetchUser();
    getUserLevel();
    fetchChapitre();

    return {
      getUserId,
      chapitres,
      vectorURL,
      user,
      currentUserLevel,
      trainPosition,
      URL_PREFIX,
      imageURL,
      edelweissURL,
      trainAnimation,
    };
  },
};
</script>

  <template>
  <div class="custom-nav">
    <div class="row">
      <div class="col-xs-3">
        <a class="mx-auto edit-icon" href="#infos" uk-toggle
          ><img
            :src="URL_PREFIX + vectorURL + 'information-button.svg'"
            alt="infos"
            class="info"
        /></a>
      </div>
      <div class="col-xs-9 text-right">
        {{ user.experience }}
        <img
          :src="URL_PREFIX + imageURL + edelweissURL"
          class="icon"
          alt=""
          width="28px"
          height="28px"
        />
      </div>
    </div>
  </div>

  <div class="container home-container">
    <div class="row mx-0">
      <div class="col-lg-8 mx-auto px-0 py-5">
        <!-- CONTAINER TRAIN -->
        <div class="container-train">
          <img
            class="train"
            id="train"
            :src="URL_PREFIX + vectorURL + 'train-top-entier.svg'"
            alt=""
            width="50px"
            height="auto"
            :style="{
              top: parseInt(trainPosition) + 'px',
              transition: trainAnimation,
            }"
          />
          <div class="rails"></div>
        </div>
        <!-- FIRST -->
        <div
          class="town"
          v-if="chapitres[0]"
          :id="'etape-' + chapitres[0].idEtape"
        >
          <div class="row text-center justify-content-center">
            <img
              class="illustration-background-first"
              :src="URL_PREFIX + vectorURL + chapitres[0].illustrationUrl"
              alt=""
              width="250px"
              height="100%"
            />
          </div>
          <div class="row">
            <router-link
              :to="{
                name: 'quizz',
                params: { idChapitre: chapitres[0].idEtape },
              }"
              class="btn btn-play small mx-auto"
              :class="{ red: chapitres[0].idEtape >= currentUserLevel }"
            >
              {{ chapitres[0].nom }}
            </router-link>
          </div>
        </div>
        <!-- LOGIC -->
        <template v-for="chapitre in chapitres" :key="chapitre.idEtape">
          <!-- MIDDLE -->
          <div
            class="town"
            :id="'etape-' + chapitre.idEtape"
            v-if="chapitre.idEtape != 1 && chapitre.idEtape != chapitres.length"
          >
            <div class="row justify-content-center">
              <div class="illustration-left col text-right">
                <img
                  :class="[
                    chapitre.idEtape <= currentUserLevel
                      ? ''
                      : 'chapter-locked',
                  ]"
                  v-if="chapitre.idEtape % 2 != 0"
                  class="illustration-background"
                  :src="URL_PREFIX + vectorURL + chapitre.illustrationUrl"
                  alt=""
                  width="250px"
                  height="100%"
                />
              </div>
              <div class="illustration-right col text-left">
                <img
                  :class="[
                    chapitre.idEtape <= currentUserLevel
                      ? ''
                      : 'chapter-locked',
                  ]"
                  v-if="chapitre.idEtape % 2 == 0"
                  class="illustration-background"
                  :src="URL_PREFIX + vectorURL + chapitre.illustrationUrl"
                  alt=""
                  width="250px"
                  height="100%"
                />
              </div>
            </div>
            <div class="row">
              <!-- v-if="user.experience > 1000 * idChapitre"-->
              <template v-if="chapitre.idEtape <= currentUserLevel">
                <router-link
                  :to="{
                    name: 'quizz',
                    params: { idChapitre: chapitre.idEtape },
                  }"
                  class="btn btn-play small mx-auto"
                  :class="{
                    red: chapitre.idEtape == currentUserLevel,
                    pulse: chapitre.idEtape == currentUserLevel,
                  }"
                >
                  {{ chapitre.nom }}
                </router-link>
              </template>

              <template v-if="chapitre.idEtape > currentUserLevel">
                <div class="btn btn-play small mx-auto chapter-locked">
                  {{ chapitre.nom }}
                </div>
              </template>
            </div>
          </div>
        </template>
        <!-- END -->
        <div
          class="town"
          :id="'etape-' + chapitres[chapitres.length - 1].idEtape"
          v-if="chapitres[chapitres.length - 1]"
        >
          <div class="row text-center justify-content-center">
            <img
              :class="[
                chapitres[chapitres.length - 1].idEtape <= currentUserLevel
                  ? ''
                  : 'chapter-locked',
              ]"
              class="illustration-background-end"
              :src="
                URL_PREFIX +
                vectorURL +
                chapitres[chapitres.length - 1].illustrationUrl
              "
              alt=""
              width="250px"
              height="100%"
            />
          </div>
          <div class="row">
            <template
              v-if="chapitres[chapitres.length - 1].idEtape <= currentUserLevel"
            >
              <router-link
                :to="{
                  name: 'quizz',
                  params: {
                    idChapitre: chapitres[chapitres.length - 1].idEtape,
                  },
                }"
                class="btn btn-play small mx-auto"
                :class="{
                  red:
                    chapitres[chapitres.length - 1].idEtape == currentUserLevel,
                  pulse:
                    chapitres[chapitres.length - 1].idEtape == currentUserLevel,
                }"
              >
                {{ chapitres[chapitres.length - 1].nom }}
              </router-link>
            </template>
            <template
              v-if="chapitres[chapitres.length - 1].idEtape > currentUserLevel"
            >
              <div class="btn btn-play small mx-auto chapter-locked">
                {{ chapitres[chapitres.length - 1].nom }}
              </div>
            </template>
          </div>
        </div>
      </div>
    </div>

    <!-- SECRET TROPHY -->
    <div
      class="town"
      id="etape-final"
      v-if="currentUserLevel == chapitres.length + 1"
    >
      <div class="row text-center justify-content-center">
        <img
          class="illustration-background-end"
          :src="URL_PREFIX + vectorURL + 'final.svg'"
          alt=""
          width="0"
          height="0"
        />
      </div>
    </div>

    <div
      class="row text-center mx-0"
      v-if="currentUserLevel <= chapitres.length"
    >
      <router-link
        :to="{
          name: 'quizz',
          params: { idChapitre: parseInt(currentUserLevel) },
        }"
        class="btn btn-primary ml-auto mr-3 full-width fixed-bottom"
      >
        Jouer
      </router-link>
    </div>
  </div>

  <!--Infos modal-->
  <div id="infos" class="uk-flex-top uk-modal-container" uk-modal>
    <div class="uk-modal-dialog uk-margin-auto-vertical px-3 py-2">
      <header class="row border-bottom py-2">
        <div class="col-auto">
          <button
            class="uk-modal-close-default"
            type="button"
            uk-close
          ></button>
        </div>
        <div class="col text-center">
          <h2 class="mb-1">Infos</h2>
        </div>
      </header>
      <div class="container" uk-overflow-auto>
        <div class="row pt-5">
          <div class="col">
            <h2>Qui sommes-nous ?</h2>
            <p class="text-justify">
              “Ça joue ?!” est une application créée par MTHW, rassemblant sept
              étudiants, dans le cadre d’un cours en ingénierie des médias. Dans
              la mesure où ceci est réalisé dans un but pédagogique, nous
              déclinons toute responsabilité en cas de bug.
            </p>
            <h2>“Ça joue ?!” Quésaco ?</h2>
            <p class="text-justify">
              Le but du jeu est de t’offrir un petit tour de Suisse à travers
              différents cantons en suivant notre ligne de train.<br />
              Dans chacun des arrêts, tu découvriras un quizz portant sur le
              canton en question. Dans ces quizz tu découvriras des questions
              sur le patois, les clichés, les expressions, mais aussi sur des
              faits typiquement suisses et bien d’autres choses. Afin de valider
              une étape et de passer au canton suivant, il te faudra réunir 1000
              Edelweiss en répondant à ces fameuses questions. À la fin de
              chaque étape, tu recevras un badge représentant un aliment typique
              suisse. Une fois arrivé au Lavaux, le jeu est terminé et tu
              recevras ton dernier badge.
            </p>
            <h2>Concours !!</h2>
            <p>
              Exceptionnellement, jusqu’au 20 juillet, une fois que tu as
              terminé le jeu, ton adresse mail sera ajoutée au tirage au sort
              pour gagner deux billets de train journaliers en 1ère classe
              valable dans toute la Suisse. Le tirage au sort n’est pas
              accessible aux employés des CFF ni aux personnes ayant participé à
              la création du jeu. Après le tirage au sort, les CFF contacteront
              par mail la personne ayant gagné. Ainsi, tu pourras peut-être
              faire le tour de Suisse que nous t’avons proposé dans
              l’application, mais en vrai, et riche de tout ce que tu auras
              appris dans l’application « Ça joue ?! ».
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

  <style scoped>
.info {
  width: 25px;
}
</style>
