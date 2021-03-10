<template>
    <div>
            <body class="m-4">

            
                <main class="text-center w-full">
                    <section class="mt-2 border border-gray-700 px-2 md:border-none">
                        <h3 class="uppercase p-2 md:pb-4 text-xl font-bold">catégories</h3>
                            <div class="grid grid-cols-3 md:grid-cols-none md:flex md:justify-around gap-4 pb-4 text-left md:border md:border-gray-700 md:p-2 md:mx-16 md:mb-10">
                           
            
                          <tr :key="index" v-for="(exercice,index) in exercices">
                                <div class="capitalize"><input type="checkbox" name="exercice" value="1" > {{exercice.art}}</div>
                              <!--  <div class="capitalize"><input type="checkbox" name="exercice" value="1" > musique</div>
                                <div class="capitalize"><input type="checkbox" name="exercice" value="1" > cinéma</div>
                                <div class="capitalize"><input type="checkbox" name="exercice" value="1" > dance</div>
                                <div class="capitalize"><input type="checkbox" name="exercice" value="1" > chant</div> -->
                                </tr>
                            </div>
                            
                    </section>

                    <section class="m-4">
                            <h3 class="uppercase p-2 md:pb-4 text-xl font-bold">exercices</h3>
  
                    <table class="w-full">
                        <thead>
                               <tr>
                                <th class="border border-blue-800 px-2">Titre</th>
                                <th class="border border-blue-800 px-2">Niveau</th>
                                <th class="border border-blue-800 px-2">Description courte</th>
                                <th class="border border-blue-800 px-2">Durée</th>
                                <!-- <th class="border border-blue-800 px-2">Catégorie</th> -->
                                <th class="border border-blue-800 px-2">Type d'Exercice</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr :key="index" v-for="(exercice,index) in exercices">
                                <td class="border border-blue-800 capitalize underline"><router-link :to="`/exercice/${exercice.id}`"><title :exercice="exercice" />{{ exercice.title.rendered}}</router-link></td> 
                                <td class="border border-blue-800 capitalize">{{ exercice.niveau }}</td>
                                <td class="border border-blue-800 capitalize">{{ exercice.description_courte }}</td>
                                <td class="border border-blue-800 ">{{ exercice.duree_de_lexercice }} min</td>
                                
                                <td class="border border-gray-700"> <li class="pr-2" v-bind:key="idExerciceType" v-for="(type,idExerciceType) in exercice.type_dexercice">
                                    {{ type }}</li></td>
                            </tr>
                           
                        </tbody>
                    </table>
                    </section>
                    <button type="button" class="m-2 py-2 px-4 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none" tabindex="-1">
                        Ajouter à un nouveau cours
                    </button>
                    <p class="hidden md:block text-center py-4">Pensez-bien que tout seul on va plus vite, mais à plusieurs on va plus loin</p>
                </main>
            </body>
    </div>
</template>

<script>
import axios from "axios"
export default {
    mounted () {
        this.getExerciceList();
    },
   
    data() {
        return {
            exercicesUrl: 'http://localhost/apotheose_complet/project-artelier/Wordpress/wp-json/wp/v2/exercice/',
            exercices: [],
            exercicesData: {
                per_page: 5,
                page: 1
            },
        }
    },
    methods: {
        getExerciceList() {
            axios.get(this.exercicesUrl, {params: this.exercicesData})
            .then((response) => {
                this.exercices = response.data;
                console.log(this.exercices);
            })
            .catch( (error) => {
                console.log(error);
            });
        },
        getExercice() {
            axios.get(this.exercicesUrl, {params: this.$route.id})
            .then((response) => {
                this.exoType = response.data.meta.type_dexercice;
                console.log(this.exercices);
            })
            .catch( (error) => {
                console.log(error);
            });
        },
    } 
}
</script>