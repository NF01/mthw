import { createWebHistory, createRouter } from "vue-router";
import Home from "../views/Home.vue";
// import Admin from "../views/Admin.vue";
import Admin from "../views/Adminv2.vue";
import Quizz from "../views/Quizz.vue";
import Info from "../views/Info.vue";
import Profil from "../views/Profil.vue";
import Ranking from "../views/Ranking.vue";

const routes = [
  {
    path: "/accueil",
    name: "accueil",
    component: Home,
  },
  {
    path: "/nouveau-compte",
    name: "nouveau-compte",
    component: Home,
  },
  {
    path: "/admin",
    name: "admin",
    component: Admin,
  },
  {
    path: "/quizz/:idChapitre",
    name: "quizz",
    component: Quizz,
    props: true
  },
  {
    path: "/info",
    name: "info",
    component: Info,
  },
  {
    path: "/profil",
    name: "profil",
    component: Profil,
  },
  {
    path: "/ranking",
    name: "ranking",
    component: Ranking,
  }

];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;