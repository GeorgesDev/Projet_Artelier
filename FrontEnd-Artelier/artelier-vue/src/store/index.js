import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    // on stocke un booléen qui représente l'état de la connexion de l'utilisateur (true => connecté)
    isUserConnected: false,
    art : [],
    username: localStorage.getItem('username'),
    title: [],
    temps: [],
    niveau:[],
    type_dexercice: [],
    dureeexercice: 0,

  },
  mutations: {
      // par ex. une mutation pour mettre à jour notre message de bienvenue
  // cette mutation ne sera pas appellée directement, on utilisera un "commit"
  // de cette façon, on demande à VueX de déclencher la mise à jour des composants qui utilisent le store
  // cette méthode, comme toutes les mutations, reçoit en premier paramètre le state
    isUserConnectedMutation (state, data) {
      state.isUserConnected = data;
    },
  
    updateUsername (state, newUsername) {
      state.username = newUsername;
    },
  },

  actions: {
  },

  modules: {
  }
});

export default store;
