<template>
  <div id="app">
      <Header />

        <div id="nav">
          <!-- <router-link to="/">Home</router-link>  |
          <router-link to="/adminer">Adminer</router-link>  |
          <router-link to="/login">Login</router-link>  | -->
          <!-- <router-link to="/cgu">CGU</router-link>  | -->
          <!-- <router-link to="/contact">Contact</router-link>  | -->
          <!-- <router-link to="/exercice/:id">Exercices</router-link>  |
          <router-link to="/exercice">Bibliothèque d'exercices</router-link>  |
          <router-link to="/exercice-form">Formulaire Exercice</router-link>  |  -->
          <!-- <router-link to="/lesson/:id">Cours </router-link>  |  -->
          <!-- <router-link to="/lesson">Bibliothèque de Cours</router-link>  |
          <router-link to="/lesson-form">Formulaire de Cours</router-link>  | -->
          <!-- <router-link to="/error404">404</router-link>  | -->
        </div>

      <!--<div v-if="latestApiResponseIs404">

        <Error404/>
      </div>
      <div v-else>-->
        <router-view/>
      <!--</div>-->


      <Footer />

  </div>
</template>

 <script>
import AuthenticationService from "./services/AuthenticationService";
//import Error404 from "./views/Error404.vue"
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
export default {
  name: "App",
  components: {
    Header,
    Footer,
    //Error404
  },
   beforeCreate: function () {
    AuthenticationService.isConnected();
  },
};
</script>

<style lang="css">
@import "./assets/css/tailwind.css";
</style>

