
<template>
<div class="p-3">
      <div class="field border-2 border-purple-400 border-purple-400 p-4 my-4">
            <h2 class="uppercase">créer un compte</h2>
      <form @submit.prevent="addUser">
         
           <fieldset>
            <div class="field my-2 md:grid md:grid-cols-5 md:items-center md:justify-around text-left">
              

              <label class="field__label md:col-start-2">Nom</label>
              <input
                class="field__input mt-3 h-10 block md:col-span-2 md:col-start-3 w-full p-1 bg-gray-50 text-gray-700 border-2 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600"
                type="text"
                placeholder="Nom de famille"
                v-model="user.lastname"
                id="lastname"
                required="required"
                />
              

            </div>

            <div class="field my-2 md:grid md:grid-cols-5 md:items-center md:justify-around text-left">
              

              <label class="field__label md:col-start-2">Prénom</label>
              <input
                class="field__input mt-3 h-10 block md:col-span-2 md:col-start-3 w-full p-1 bg-gray-50 text-gray-700 border-2 border-purple-400 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600"
                type="text"
                placeholder="Prénom"
                v-model="user.firstname"
                id="firstname"
                required="required"
              />


            </div>

             <div class="field my-2 md:grid md:grid-cols-5 md:items-center md:justify-around text-left">
              
              <label class="field__label md:col-start-2">Nom d'utilisateur</label>
              <input
                class="field__input mt-3 h-10 block md:col-span-2 md:col-start-3 w-full p-1 bg-gray-50 text-gray-700 border-2 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600"
                type="text"
                placeholder="Nom d'utilisateur"
                v-model="user.username"
                id="username"
                required="required"
              />
            </div>

               <div class="field my-2 md:grid md:grid-cols-5 md:items-center md:justify-around text-left">
              
              <label class="field__label md:col-start-2">Mot de passe</label>
              <input
                class="field__input mt-3 h-10 block md:col-span-2 md:col-start-3 w-full p-1 bg-gray-50 text-gray-700 border-2 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600"
                type="password"
                placeholder="Votre Mot de passe"
                name = "mdp"
                v-model="user.password"
                id="mdp"
                required="required"
              />
            </div>

<!-- Option en suspens
               <div class="field my-2 md:grid md:grid-cols-5 md:items-center md:justify-around text-left">
              
              <label class="field__label md:col-start-2">Confirmation du mot de passe</label>
              <input
                class="field__input mt-3 h-10 block md:col-span-2 md:col-start-3 w-full p-1 bg-gray-50 text-gray-700 border-2 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600"
                type="password"
                placeholder="Confirmation du Mot de Passe"
                name="password"
                v-model="password_confirmation"
                id="password"
                required="required"
                onkeyup="checkPass();"
               />
               <span id="confirm-message" class="confirm-message"></span>
            </div>
-->

               <div class="field my-2 md:grid md:grid-cols-5 md:items-center md:justify-around text-left">
              <label class="field__label md:col-start-2">Email</label>
              <input
                class="field__input mt-3 h-10 block md:col-span-2 md:col-start-3 w-full p-1 bg-gray-50 text-gray-700 border-2 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600"
                type="email"
                placeholder="Email"
                v-model="user.email"
                id="email"
                required="required"
              />
            </div>

          </fieldset>

           
            <div class="grid grid-cols-5 text-left">
                <!-- <p class="my-4 col-start-2 col-span-4">
                    <input type="checkbox"> J'accepte d'être contacté par d'autres utilisateurs.</p> -->
                <p class="my-4 col-start-2 col-span-4">
                    <input required="required" type="checkbox"> Je comprends que mes publications sont soumises à modération.</p>
                <p class="my-4 col-start-2 col-span-4">
                    <input required="required" type="checkbox"> J'ai lu et j'accepte les CGU.</p>
            </div>

          
              <div class="flex flex-col md:flex-row items-center md:justify-around">

                    <div v-if="isConnected" class="w-2/5 md:w-1/5 my-2">
                      <button type="submit" class="uppercase bg-green-500 hover:bg-green-700 text-white p-2 mx-2">modifier le compte</button>
                    </div>

                     <div v-else class="w-2/5 md:w-1/5 my-2">
                      <button type="submit" class="uppercase bg-green-500 hover:bg-green-700 text-white p-2 mx-2">créer le compte</button>
                    </div>
                    <CancelButtonHome />
                 </div>


        </form>
      </div>

</div>
</template>


<script>
import AuthenticationService from "../services/AuthenticationService";
import CancelButtonHome from "../components/CancelButtonHome.vue"
export default {
    components: {
        CancelButtonHome,    
    },
  
data: function () {
     return {
      user: {
        lastname:"",
        firstname:"",
        username : "",
        email : "",
        password : "",
        },
        password_confirmation : ""
  //     //is_admin : null
    }
 
  },
  methods: {
    addUser() {
      console.log(this.user.lastname);
      console.log(this.user.firstname);
      console.log(this.user.username);
      console.log(this.user.password);
      console.log(this.password_confirmation);
      console.log(this.user.firstname);
      console.log(this.user.email);
      AuthenticationService.createUser(this.user)
    },
/* Option en suspens
    checkPass() {
      let password = document.getElementById('mdp');
      let confirm  = document.getElementById('password');
      let message = document.getElementById('confirm-message');
    
      if(password.value === confirm.value){
        message.innerHTML =  "Passwords Match!";
     }else{
        message.innerHTML =  "Passwords Does Not Match!";
    }
    },
*/
    // register: function () {
    //     let data = {
    //       lastname: this.lastname,
    //       firstname: this.firstname,
    //       username: this.username,
    //       email: this.email,
    //       password: this.password,
    //       password_confirmation: this.password_confirmation,
    //       //is_admin: this.is_admin
    //     }
    //     this.$store.dispatch('register', data)
    //    .then(() => this.$router.push('/'))
    //    .catch(err => console.log(err))
    //   },
    
  },
  computed: {
    isConnected() {
      // on récupère l'état de connexion (booléen) depuis le state
      return this.$store.state.isUserConnected;
    },
  },
  
   name: "LoginCreateModify",
  };
  
</script>