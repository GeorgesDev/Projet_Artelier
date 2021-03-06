import {
    apiClient,
    baseUrlSuffix
} from "./ApiClient"

import router from '../router/index.js'

export default {

    // récupération de l'ensemble (liste) des exercices
    getExerciceList: function () {
        return apiClient.get(baseUrlSuffix + '/exercice')
    },

    // récupération d'un exercice
    getExercice: function (id) {
        return apiClient.get(baseUrlSuffix + '/exercice/' + id)
    },

      // récupération de l'ensemble (liste) des exercices
      getArtList: function () {
        return apiClient.get(baseUrlSuffix + '/art')
    },

    // création d'un exercice
    createExercice: function (exercice) {
    
        apiClient.post(
                baseUrlSuffix + '/exercice',
                exercice,
               
                {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                })
            .then(() => {
                router.push({
                    name: 'home'
                })
            })
    },

    //recuperation des arts
    artList: function (){
        return apiClient.get(baseUrlSuffix + '/art')
    },

    //recuperation des auteurs
    usersList: function (){
        return apiClient.get(baseUrlSuffix + '/users')
    },

    
    //modification satatut Privé/public
    // changeExerciceStatut: function(){
    //     this.getExercice;
    // },
}