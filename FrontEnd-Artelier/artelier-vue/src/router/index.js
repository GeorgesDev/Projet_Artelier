import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from '../views/Home.vue'

import Login from '../views/Login.vue'
import Conditions from '../views/CGU.vue'
import Error404 from '../views/Error404.vue'
import ContactForm from '../views/ContactForm.vue'
import Adminer from '../views/Adminer.vue'

import ExerciceDetail from '../views/ExerciceDetail.vue'
import ExerciceForm from '../views/ExerciceForm.vue'
import ExerciceLibrary from '../views/ExerciceLibrary.vue'

import LessonDetail from '../views/LessonDetail.vue'
import LessonForm from '../views/LessonForm.vue'
import LessonLibrary from '../views/LessonLibrary.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },

  {
    name: 'login',
    path: '/login',
    component: Login
  },

  {
    name: 'CGU',
    path: '/cgu',
    component: Conditions
  },
  
  {
    name: 'contact',
    path: '/contact',
    component: ContactForm
  },

  {
    name: 'Error404',
    path: '/Error404',
    component: Error404
  },

  {
    name: 'adminer',
    path: '/adminer',
    component: Adminer
  },

  {
    name: 'exercice-detail',
    path: '/exercice/:id',
    component: ExerciceDetail
  },

  {
    name: 'exercice-form',
    path: '/exercice-form',
    component: ExerciceForm
  },

  {
    name: 'exercice-library',
    path: '/exercice',
    component: ExerciceLibrary
  },

  {
    name: 'lesson-detail',
    path: '/lesson/:id',
    component: LessonDetail
  },

  {
    name: 'lesson-form',
    path: '/lesson-form',
    component: LessonForm
  },

  {
    name: 'lesson-library',
    path: '/lesson',
    component: LessonLibrary
  },

]

// const router = new VueRouter({
//   routes
// })

//export default router

export default new VueRouter({
  mode: "history",
  routes // raccourci pour `routes: routes`
})