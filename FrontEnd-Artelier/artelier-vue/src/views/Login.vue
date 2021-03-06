<template>

  <div>
      <body class="m-4"> 
          <main class="text-center">
            <section class="border-2 border-purple-400 my-4">
                <div  v-if="isConnected">
                    <h1 class="uppercase p-2 border-1 border-purple-400">modifier mon compte</h1>   
                    <LoginCreateModify />       
                </div>
                <div v-else>
                    <h1 class="uppercase p-2 border-1 border-purple-400">créer un compte ou se connecter</h1>
                        <LoginConnection />
                        <LoginCreateModify />  
                </div>
            </section>

                    
                    
                           

          </main>
      </body>
  </div>
</template>

<script>
import LoginConnection from "../components/LoginConnection.vue";
import LoginCreateModify from "../components/LoginCreateModify.vue";

export default {
    components: {
        LoginConnection,
        LoginCreateModify,
    },

    name : "login",

    computed: {
    isConnected() {
      // on récupère l'état de connexion (booléen) depuis le state
      return this.$store.state.isUserConnected;
    },
    },
}


</script>