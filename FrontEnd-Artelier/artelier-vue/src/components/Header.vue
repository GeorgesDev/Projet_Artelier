<template>

  <header class="header">
    <div class="m-2">
        <div class="border-2 border-purple-400 bg-gradient-to-r from-red-400 to-purple-500">
            <nav class="flex justify-around px-4 md:m-3 items-center">
                <router-link :to="{ name : 'home' }" class="capitalize text-xl md:text-4xl font-bold">art'elier</router-link>

                <div v-if="!isConnected" class="flex">
                  <router-link :to="{ name : 'exercice-library' }" class="hidden md:block m-2 px-2 capitalize border-2 border-purple-900 text-white">Exercices</router-link>
                </div>
                  <div v-if="isConnected" class="flex">
                     <router-link :to="{ name : 'exercice-library' }" class="hidden md:block m-2 px-2 capitalize border-2 border-purple-900 text-white">Mes exercices</router-link>
                  <router-link :to="{ name : 'exercice-form' }" class="hidden md:block m-2 px-2 capitalize border-2 border-purple-900 text-white">creer un exercice</router-link>
                  <!-- <a href="/lesson" class="hidden md:block">mes cours</a> -->
                  </div>

                <div v-if="isConnected" class="flex flex-col items-center">
                    <router-link :to="{ name : 'login' }" class="capitalize p-2 text-white"><span class="underline font-bold">Mon compte : </span>{{ username }}</router-link>
                    <p><a href="" @click.prevent="disconnectUser" class="capitalize border-2 border-red-400 p-1 bg-red-600 text-white">déconnexion</a></p>
                </div>

                <div v-else>
                    <router-link :to="{ name : 'login' }" class="hidden md:block py-1 px-2 bg-green-400">connexion</router-link>
                </div>

                <!-- <button class="md:hidden px-4 py-1 w-auto bg-gray-600 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50">menu</button> -->
            </nav>
        </div>
            <img class="w-full h-40 md:h-60 object-cover object-top p-3 border-2 border-red-500 mt-2" src="../assets/img/image2.png" alt="">
    </div>
  </header>
</template>

<script>
import AuthenticationService from "../services/AuthenticationService"
export default {
  name: "Header",
  
  computed: {
    isConnected() {
      // on récupère l'état de connexion (booléen) depuis le state
      return this.$store.state.isUserConnected;
    },
    username() {
      return this.$store.state.username;
    },
  },
  methods: {
    disconnectUser() {
      AuthenticationService.disconnectUser()
    },
  },
};
</script>