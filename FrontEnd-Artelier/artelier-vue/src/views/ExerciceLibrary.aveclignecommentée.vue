<template>
    <div>
            <body class="m-4">

            
                <main class="text-center w-full">
                    <!-- <section class="mt-2 border border-gray-700 px-2 md:border-none">
                        <h3 class="uppercase p-2 md:pb-4 text-xl font-bold">catégories</h3>
                            <div class="grid grid-cols-3 md:grid-cols-none md:flex md:justify-around gap-4 pb-4 text-left md:border md:border-gray-700 md:p-2 md:mx-16 md:mb-10">
                           
                            <div class="capitalize"><input type="checkbox" name="exercice" value="1" > Theâtre</div>
                            <div class="capitalize"><input type="checkbox" name="exercice" value="1" > musique</div>
                            <div class="capitalize"><input type="checkbox" name="exercice" value="1" > cinéma</div>
                            <div class="capitalize"><input type="checkbox" name="exercice" value="1" > dance</div>
                            <div class="capitalize"><input type="checkbox" name="exercice" value="1" > chant</div>
                              
                            </div>
                            
                    </section> -->
                <!--    <section class="mt-2 border border-gray-700 px-2 md:border-none">
                        <h3 class="uppercase p-2 text-xl font-bold">thématique</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 md:p-5 gap-4 pb-4 text-left md:border md:border-gray-700" :key="index" v-for="(exercice,index) in exercices">>
                              <div class="capitalize"><input type="checkbox" name="exercice" value="1" > echauffements</div>
                                <div class="capitalize"><input type="checkbox" name="exercice" value="1" > ecoute</div>
                                <div class="capitalize"><input type="checkbox" name="exercice" value="1" > imagination</div>
                                <div class="capitalize"><input type="checkbox" name="exercice" value="1" > espace</div>
                                <div class="capitalize"><input type="checkbox" name="exercice" value="1" > voix</div>
                                <div class="capitalize"><input type="checkbox" name="exercice" value="1" > concentration</div>
                                <div class="capitalize"><input type="checkbox" name="exercice" value="1" > personnage</div> 
                            </div>
                    </section> -->
                    <section class="m-4">
                        <h2>liste des 5 derniers exercices</h2>

                    <table class="w-full">
                        <thead>
                           
                            <tr>
                               <!-- <th class="hidden md:block border border-gray-700 px-2">validation</th> -->
                               <th class="w-2/4 border border-gray-700 px-2">Titre</th>                                                         
                               <th class="w-1/4 border border-gray-700 px-2">Niveau</th>
                               <th class="border border-gray-700 px-2">Durée</th>
                               <th class="border border-gray-700 px-2">Type d'Exercice</th>
                    <!--            <th class="border border-gray-700 px-2">+</th> -->

                <!--   <li :key="index" v-for="(exercice,index) in exerciceLibraryData" ><input type="text"  :title="exercice.title" :list="exercice.list" :id="exercice.id" v-model="exercice.title" >
    <label :for="exercice.id" :key="exercice.id">{{exercice.title}}</label></li> -->

                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr :key="index" v-for="(exercice,index) in exercices">
                                <!-- <td class="hidden md:block border border-gray-700"><img src="../assets/icons/validation.svg" alt="" width="23"></td> -->
                                
                                <td class="border border-gray-700"><router-link :to="`/exercice/${exercice.id}`"><titre :exercice="exercice" />{{ exercice.title.rendered}}</router-link></td> 
                                <td class="border border-gray-700 capitalize">{{exercice.niveau}}</td>
                                <td class="border border-gray-700">{{exercice.duree_de_lexercice}} min</td>
                                <td class="border border-gray-700">
                                    <ul class="flex justify-center " >
                                    <li class="pr-2" v-bind:key="idExerciceType" v-for="(type,idExerciceType) in exercice.meta.type_dexercice">
                                        <label>{{ type }}</label>
                                    </li>
                                    </ul>
                                </td>
                            </tr>
                            <!--
                            <tr>
                                <td class="hidden md:block border border-gray-700"><img src="../assets/icons/wait.svg" alt="" width="23"></td>
                                <td class="border border-gray-700"></td>
                                <td class="border border-gray-700 capitalize"></td>
                                <td class="border border-gray-700"></td>
                                <td class="border border-gray-700 text-center"><input type="checkbox" name="exercice" value="1"></td>
                            </tr>
                            <tr>
                                <td class="hidden md:block border border-gray-700"><img src="../assets/icons/wait.svg" alt="" width="23"></td>
                                <td class="border border-gray-700"></td>
                                <td class="border border-gray-700 capitalize"></td>
                                <td class="border border-gray-700"></td>
                                <td class="border border-gray-700 text-center"><input type="checkbox" name="exercice" value="1"></td>
                            </tr> -->
                        </tbody>
                    </table>
                    </section>
                    <!-- <button type="button" class="m-2 py-2 px-4 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none" tabindex="-1">
                        Ajouter à un nouveau cours
                    </button> -->
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
            exercicesUrl: 'http://localhost/Wordpress/wp-json/wp/v2/exercice',
            artUrl: 'http://localhost/Wordpress/wp-json/wp/v2/art',
            exercices: [],
            artList: [],
            art:[],
            exercicesData: {
                per_page: 15,
                

            },
        }
    },
    methods: {
        getExerciceList() {
            axios.get(this.exercicesUrl, {params: this.exercicesData})
            .then((response) => {
                this.exercices = response.data;
                this.artList = response.data.art;
                console.log(this.exercices);
            })
            

            .catch( (error) => {
                console.log(error);
            });
        },
        getArtList(){
            axios.get(this.arturl, {params: this.artData})
            .then((response) => {
                this.artListglobal = response.data;
            })
        }

    } 
}
</script>

