import { createWebHistory, createRouter } from "vue-router";
import Home from "../views/Home.vue";
import Admin from "../views/Admin.vue";
import Quizz from "../views/Quizz.vue";
import Profil from "../views/Profil.vue";
import Ranking from "../views/Ranking.vue";

URL_PREFIX = window.URL_PREFIX;

const routes = [
  {
    path: URL_PREFIX + "accueil",
    name: "accueil",
    component: Home,
  },
  {
    path: URL_PREFIX,
    component: Home,
  },
  {
    path: URL_PREFIX + "nouveau-compte",
    name: "nouveau-compte",
    component: Home,
  },
  {
    path: URL_PREFIX + "admin",
    name: "admin",
    component: Admin,
  },
  {
    path: URL_PREFIX + "quizz/:idChapitre",
    name: "quizz",
    component: Quizz,
    props: true
  },
  {
    path: URL_PREFIX + "profil",
    name: "profil",
    component: Profil,
  },
  {
    path: URL_PREFIX + "ranking",
    name: "ranking",
    component: Ranking,
  }

];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;