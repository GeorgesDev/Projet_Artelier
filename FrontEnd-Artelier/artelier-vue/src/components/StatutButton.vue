 
<template>
    
     
            <button @click.once.prevent="statutExo" type="button" v-if=" exercice.statut == 'Public'" class="m-2 py-2 px-4 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none uppercase" tabindex="-1">
                {{ exercice.statut }}
                <!-- faire devenir privé -->
            </button>
            <button @click.once.prevent="statutExo" type="button" v-else-if=" exercice.statut == 'Privé'" class="m-2 py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none uppercase" tabindex="-1">
                {{ exercice.statut }}
                <!-- faire devenir public -->
            </button>
      
    
</template>

<script>
import ExerciceService from "../services/ExerciceService";
import {
    apiClient,
    baseUrlSuffix
} from "../services/ApiClient";
export default {
  name: "StatutButton",
    data () {
        return {
            exercice:[],
            statutid: [],
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
    url() {
        this.currentUrl = window.location.href
        console.log(window.location.href)
    },
    
    statutExo (){
            ExerciceService.getExercice(this.$route.params.id).then((response) => {
                this.statut = response.data.statut;
                this.statutid = response.data.id
                if (this.statut == "Public" ){
                    console.log(response.data.statut)
                    apiClient.post(
                        baseUrlSuffix + '/exercice/' + this.statutid,
                    {
                        "meta" : {"statut" : "Privé"}
                    },
                    {
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
                    })
                }
                else if (this.statut == "Privé"){
                    console.log(response.data.statut)
                    apiClient.post(
                        baseUrlSuffix + '/exercice/' + this.statutid,
                        {
                            "meta" : {"statut" : "Public"}
                        },
                        {
                            headers: {
                                Authorization: 'Bearer ' + localStorage.getItem('token')
                            }
                        })
                }
                
            },
        )
    }
    },
};
</script>