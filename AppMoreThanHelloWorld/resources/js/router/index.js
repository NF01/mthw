import { createWebHistory, createRouter } from "vue-router";
import Home from "../views/Home.vue";
import Admin from "../views/Admin.vue";
import Quizz from "../views/Quizz.vue";
import Info from "../views/Info.vue";
import Profil from "../views/Profil/Profil.vue";

const routes = [
  {
    path: "/",
    name: "Home",
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
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;