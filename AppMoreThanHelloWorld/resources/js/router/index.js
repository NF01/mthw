import { createWebHistory, createRouter } from "vue-router";
import Home from "../views/Home.vue";
import Admin from "../views/Admin.vue";
import Quizz from "../views/Quizz.vue";
import Info from "../views/Info.vue";
import Profil from "../views/Profil.vue";
import Ranking from "../views/Ranking.vue";
import Experience from "../views/Experience.vue";

const routes = [
  {
    path: "/accueil",
    name: "accueil",
    component: Home,
  },
  {
    path: "/admin",
    name: "admin",
    component: Admin,
  },
  {
    path: "/quizz",
    name: "quizz",
    component: Quizz,
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
  },
  {
    path: "/experience",
    name: "experience",
    component: Experience,
  },

];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;