<template>
    
            <button type="button" class="w-4/5 py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none text-l uppercase" tabindex="-1">
                <a href="" @click.once.prevent="deleteExercice" class="flex px-2">
                    <img src="../assets/icons/construction.svg" alt="" width="30">
                        <span> supprimer l'exercice </span>
                    <img src="../assets/icons/construction.svg" alt="" width="30">
                </a>
            </button>
    
</template>

<script>
import ExerciceService from "../services/ExerciceService";

import {
    apiClient,
    baseUrlSuffix
} from "../services/ApiClient";

import router from '../router/index.js'

export default {
  name: "DeleteButton",

    data () {
        return {
            exercice:[],
        }
        },

    mounted () 
        
    {
         ExerciceService.getExercice(this.$route.params.id).then((response) => {
            this.exercice = response.data;
            //console.log(response.data.statut)
            },
        );
    },

methods :{
    
    deleteExercice (){
            ExerciceService.getExercice(this.$route.params.id).then((response) => {
                this.statut = response.data.statut;
                this.statutid = response.data.id

            
                    console.log(response.data.id)
                    apiClient.delete(
                        baseUrlSuffix + '/exercice/' + this.statutid + "?force=true",
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
        )
    }
    },
};

</script>