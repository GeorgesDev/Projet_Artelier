<template>
    <div>
        <form @submit.prevent="addExercice">

            <body class="m-4">

                <main class="text-center" >

                <section class="border-2 border-purple-400 my-4 w-full">
                    <h1 class="uppercase p-2 border-1 border-purple-400">création d'un exercice</h1>
                </section>

                <!-- Bloc Catégorie -->

                <!-- <section class="my-4">
                    <div class="self-auto md:border-none border-2 border-purple-400 p-2 mx-2">
                        <h3 class="md:text-xl">Catégorie : </h3>
                            <div class="border-2 border-purple-400 w-2/5 w-full">        
                                <ul class="flex justify-around pt-4">
                                    <li v-for="art in arts" :key="art.id">
                                        <label>
                                            <input type="checkbox" v-bind:value="art.id" v-model="checkedArts">
                                            {{ art.text }}
                                            
                                        </label>
                                    </li>
                                </ul>
                                <input  v-model="exercice.art"/> 
                            </div>
                        
                    </div> 
                </section> -->

                <!-- Bloc Durée -->

                <section class="md:border-none border-2 border-purple-400 p-2 mx-2 ">
                    <h3 class="md:text-xl ">Durée de l'exercice: </h3>
                        <input  class="border-2 border-purple-400 w-1/3 p-2 bg-gray-50 text-gray-700 border-2 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" 
                            type="number" 
                            step="1"
                            min="1"
                            max="90"
                            placeholder="En minutes (de 1 à 90)"
                            v-model="exercice.meta.duree_de_lexercice"/>
                </section>

                <!-- Bloc Type -->

                <section class="type border-2 border-purple-400 p-2 w-full">
                    <h3 class="pr-4 text-left pb-4">Type (3 choix maximum): </h3>

                        <ol class="grid grid-rows-3 grid-flow-col gap-4 text-left">
                            <li v-for="type in types" :key="type.id">
                                <label>
                                    <input type="checkbox"
                                    v-bind:value="type.text" v-model="checkedTypes">

                                    {{ type.text }}

                                </label>
                            </li>
                        </ol>

                    <input  class=""
                    v-model="exercice.type"/>
                </section>

                <!-- Bloc Niveau -->

                <section class="grid grid-cols-2 my-4 w-full">

                    <div class="grid p-2 text-left grid-cols-4 m-5">        
                        <h3 class="col-span-2">Niveau conseillé : </h3>
                            <div class="col-span-2">
                                <select class="border-2 border-purple-400"
                                    name="catégorie" 
                                    id="catégorie"
                                    v-model="exercice.meta.niveau">
                                        <option value="Débutant">Débutant</option>
                                        <option value="Intermédiaire">Intermédiaire</option>
                                        <option value="Confirmé">Confirmé</option>
                                </select>
                            </div>
                    </div>

                    <!-- Bloc Titre -->

                    <div class="grid p-2 w-2/5 text-left grid-cols-4 ml-1 w-full">        
                        <p class="col-span-2">Nom de l'exercice : </p>
                            <div class="col-span-2">
                                <textarea type="text" 
                                    class="mt-3 h-10 md:w-full p-1 bg-gray-50 text-gray-700 border-2 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" 
                                    placeholder="Nom de l'exercice"
                                    v-model="exercice.title">
                                </textarea>
                            </div>
                    </div>

                    <div class="grid grid-cols-2 my-2 col-span-2">

                    <!-- Bloc Description Courte -->

                        <p class="grid m-5">Description générale : 
                            <textarea type="text" 
                                class="mt-3 block w-full p-2 bg-gray-50 text-gray-700 border-2 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" 
                                placeholder="Extrait général de l'exercice"
                                v-model="exercice.excerpt">
                            </textarea>
                        </p>

                        <!-- Bloc Matos Élève -->

                        <div class="">
                            <p class="grid col-span-2">Matériel par élève :
                                <input type="text" 
                                    class="mt-3 block w-full p-2 bg-gray-50 text-gray-700 border-2 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" 
                                    placeholder="Matériel par élève"
                                    v-model="exercice.meta.materiel_eleve">
                            </p>

                        <!-- Bloc Matos Global -->

                            <p class="grid col-span-2 pt-3">Matériel global : 
                                <input type="text" 
                                class="mt-3 block w-full p-2 bg-gray-50 text-gray-700 border-2 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" 
                                placeholder="Matériel global"
                                v-model="exercice.meta.materiel_global">
                            </p>

                        </div>

                                            <!-- Bloc Description Détaillée -->

                        <div class="w-full mt-4 grid col-span-2">
                            <p class="text-left">Description detaillée de l'exercice :
                                <textarea type="text" 
                                class="mt-3 block border-2 w-full p-4 bg-gray-50 text-gray-700 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600 h-48" 
                                placeholder="Description detaillée de l'exercice :"
                                v-model="exercice.content">
                                </textarea>
                            </p>
                        </div>
                        <div class="md:flex justify-around my-4 pb-4">
                            <div class="flex flex-col">
                                <h3 class="">Je souhaite que mon exercice soit: </h3>
                                <h4> (Privé / Public) </h4>
                                    <select 
                                        name="privacy" 
                                        id="privacy"
                                        v-model="exercice.meta.statut" class="border-2 border-purple-400">
                                        <option value="Privé">Privé</option>
                                        <option value="Public">Public</option>
                                    </select>
                            </div>
                        </div>

                        <!-- Bloc Médias -->

                        <p class="flex items-center">Ajouter un lien vers un média : 
                            <textarea type="text" 
                                class="mt-3 block w-full p-2 bg-gray-50 text-gray-700 border-2 border-purple-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" 
                                placeholder="Photos, Vidéos, Musiques"
                                v-model="exercice.meta.media">
                            </textarea>
                        </p>
                    </div>
                </section>

                <!-- Bloc Boutons -->

                <section class="flex-wrap">
                    
                        <button class="bg-green-500 hover:bg-green-700 text-white p-2 mx-2 uppercase w-2/5 md:w-1/5 my-2"
                        type="submit">Publier
                        </button>
                    
                    <CancelButtonHome />
                </section>

                <!-- Bloc Erreurs -->

                <section>
                    <p v-if="errors.length" class="errors w-full bg-red-800 text-white p-2 mx-2 uppercase w-2/5">
                        <b>Il y a des erreurs :</b>
                        <ul>
                            <li class="errorItem" v-for="(error, index) in errors" v-bind:key="index">{{ error }}</li>
                        </ul>
                    </p>
                </section>

                </main>
            </body>
        </form>        
    </div>  
</template>

<script>
import ExerciceService from "../services/ExerciceService";
import CancelButtonHome from "../components/CancelButtonHome";
export default {
    components: {
        CancelButtonHome,
    },
    computed: {
        username() {
        return this.$store.state.username;
        },
    },
    data: function () {
    return {
    exercice: {
        status: "publish",
        meta:{}
    },
    checkedArts: [],
    arts:[	    
        { id:4, text: "Chant"},
        { id:5, text: "Musique"},	
        { id:6, text: "Théâtre"},	
        { id:7, text: "Cinéma"},	
        { id:8, text: "Danse"}
    ],
    errors: [],
    checkedTypes: [],
    types: [
        { id:1, text: "Échauffement"},
        { id:2, text: "Écoute"},
        { id:3, text: "Imagination"},
        { id:4, text: "Espace"},
        { id:5, text: "Voix"},
        { id:6, text: "Concentration"},
        { id:7, text: "Corporel"},
        { id:8, text: "Manipulation"},
        { id:9, text: "Pratique"},
        { id:10, text: "Personnages"},
        { id:11, text: "Stress"},
        { id:12, text: "Autre"}
    ]
    }},
    methods: {
    addExercice() {
    this.errors = []
    if (!this.exercice.title) {
        this.errors.push("Titre obligatoire !");
    } else {
        this.exercice.meta.type_dexercice=this.checkedTypes;
        this.exercice.art=this.checkedArts;
        ExerciceService.createExercice(this.exercice);
    }
    }
    }
}
</script>

<style>
</style>