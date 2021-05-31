import { createWebHistory, createRouter } from "vue-router";
import Home from "../views/Home.vue";
import Admin from "../views/Admin.vue";
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
    path: "/admin",
    name: "Admin",
    component: Admin,
  },
  {
    path: "/quizz",
    name: "Quizz",
    component: Quizz,
  },
  {
    path: "/info",
    name: "Info",
    component: Info,
  },
  {
    path: "/profil",
    name: "Profil",
    component: Profil,
  },
  {
    path: "/ranking",
    name: "Ranking",
    component: Ranking,
  },

];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;