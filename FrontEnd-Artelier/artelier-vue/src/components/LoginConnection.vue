<template>
<div class="p-3">
  <div class="field border-2 border-purple-400 border-purple-400 p-4 my-4">
      <h2 class="uppercase">connectez-vous</h2>

      <form @submit.prevent="loginUser">
          <fieldset>
            <div class="field my-2 md:grid md:grid-cols-5 md:items-center md:justify-around text-left">
              <label class="field__label md:col-start-2">Login</label>
              <input
                class="field__input mt-3 h-10 block md:col-span-2 md:col-start-3 w-full p-1 bg-gray-50 text-gray-700 border-2 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600"
                type="text"
                placeholder="Votre Login"
                v-model="usernameValue"
              />
            </div>

            <div class="field my-2 md:grid md:grid-cols-5 md:items-center md:justify-around text-left">
              <label class="field__label md:col-start-2">Mot de passe</label>
              <input
                class="field__input mt-3 h-10 block md:col-span-2 md:col-start-3 w-full p-1 bg-gray-50 text-gray-700 border-2 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600"
                type="password"
                placeholder="Mot de passe"
                v-model="passwordValue"
              />
            </div>
          </fieldset>
          <button class="bg-green-400 hover:bg-gray-700 p-2 mx-2 uppercase">Connexion</button>
        </form>
  </div>
</div>
</template>

<script>
import AuthenticationService from "../services/AuthenticationService";
export default {
  data: function () {
    return {
      usernameValue: "",
      passwordValue: "",
    };
  },
   methods: {
    loginUser() {
      // on souhaite ici connecter un utilisateur
      // (on va déléguer une partie du travail à un service)
      // 1. Créer un service Authentication
      // Service Authentication
      // - Permet de vérifier l'existence d'un token (en localStorage)
      // - si on a un token en localStrage => il faudra vérifier sa validité
      // - Si il est valide => l'utilisateur est connecté
      // Permet de récupérer un token depuis l'API à partir des infos du formulaire de login
      // - Une fois le token récupéré => on le stock dans le localStorage
      // Permet de supprimer le token du localStorage pour déconnecter l'utilisateur
      console.log(this.usernameValue);
      console.log(this.passwordValue);
      AuthenticationService.loginUser(this.usernameValue, this.passwordValue);
    },
  },
  name: "LoginConnection",
};
</script>