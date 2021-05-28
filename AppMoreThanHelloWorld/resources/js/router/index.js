import { createWebHistory, createRouter } from "vue-router";
import Home from "../views/Home.vue";
import About from "../views/About.vue";
import Quizz from "../views/Quizz.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/about",
    name: "About",
    component: About,
  },
  {
    path: "/quizz",
    name: "Quizz",
    component: Quizz,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;