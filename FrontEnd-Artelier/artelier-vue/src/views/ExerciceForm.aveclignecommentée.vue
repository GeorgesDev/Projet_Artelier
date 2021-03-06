<template>
    <div>
        <form @submit.prevent="addExercice">

            <body class="m-4">

                <main class="text-center" >

                <section class="border-2 border-gray-400 my-4">
                    <h1 class="uppercase p-2 border-1 border-gray-400" >CRÉATION / MODIFICATION DES EXERCICES</h1>
                </section>

                <!-- Bloc Catégorie -->

                <div class="my-4">

                    <div class="self-auto md:border-none border-2 border-gray-400 p-2 mx-2">
                        <h3 class="md:text-xl">Catégorie : </h3>
                            <div class="border-2 border-gray-400 w-2/5 w-full">        
                                <ul class="flex justify-around pt-4">
                                    <li v-for="art in arts" :key="art.id">
                                        <label>
                                            <input type="checkbox" v-bind:value="art.id" v-model="checkedArts">

                                            {{ art.text }}
                                            
                                        </label>
                                    </li>
                                </ul>

                                <input  v-model="exercice.art"/> 

                                <!-- <input type="checkbox" id=5 value="1" v-model="artList"/> <label for=" musique "> Musique </label><br>
                                <input type="checkbox" id=8 value="2" v-model="artList"/> <label for=" danse "> Danse </label><br>
                                <input type="checkbox" id=4 value="3" v-model="artList"/> <label for=" Chant" > Chant </label><br>
                                <input type="checkbox" id=7 value="4" v-model="artList"/> <label for=" Cinéma "> Cinéma </label><br>
                                <input type="checkbox" id=6 value="5" v-model="artList"/> <label for=" théatre "> Théâtre </label><br>
                                <input  v-model="exercice.art"/> -->

                            </div>
                        
                    </div> 

                </div>

                <!-- Bloc Durée -->

                <div class="md:border-none border-2 border-gray-400 p-2 mx-2 ">
                    <h3 class="md:text-xl ">Durée de l'exercice: </h3>
                        <input  class="border-2 w-1/3 p-2 bg-gray-50 text-gray-700 placeholder-gray-400" 
                            type="number" 
                            step="1"
                            min="1"
                            max="90"
                            placeholder="en minutes"
                            v-model="exercice.meta.duree_de_lexercice"/>
                </div>

                <!-- Bloc Type -->

                <div class="type border-2 border-gray-200 p-2 w-full">
                    <h3 class="pr-4 text-left pb-4">Type (3 choix maximum): </h3>

                        <ol class="grid grid-rows-3 grid-flow-col gap-4">
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


                    <!-- <input type = "checkbox" value = "echauffement" v-model = "checkedTypes" /> 
                    <label> Echauffement </label> 
                    <input type = "checkbox" value = " ecoute " v-model = "checkedTypes "/> 
                    <label> Ecoute </label> 
                    <input type =" checkbox " value =" imagination " v-model = "checkedTypes "/> 
                    <label> Imagination </label> 
                    <input type =" checkbox " value =" espace " v-model = "checkedTypes "/> 
                    <label> Espace </label> 
                    <input type =" checkbox " value =" voix " v-model = "checkedTypes "/> 
                    <label> Voix </label> 
                    <input type =" checkbox " value =" concentration " v-model = "checkedTypes "/> 
                    <label> Concentration </label> 
                    <input type =" checkbox " value =" corporel " v-model = "checkedTypes "/> 
                    <label> Corporel </label> 
                    <input type =" checkbox " value =" manipulation " v-model = "checkedTypes "/> 
                    <label> Manipulation </label> 
                    <input type =" checkbox " value =" pratique " v-model = "checkedTypes "/> 
                    <label> Pratique </label> 
                    <input type =" checkbox " value =" personnages " v-model = "checkedTypes "/> 
                    <label> Personnages </label> 
                    <input type =" checkbox " value =" stress " v-model = "checkedTypes "/> 
                    <label> Stress </label> 
                    <input type =" checkbox " value =" autre " v-model = "checkedTypes "/> 
                    <label> Autres </label> 
                    <p >{{checkedTypes}} </p>  -->

                    <!-- <p><input type="checkbox"  id="1" value="1">Échauffement</p>
                    <p><input type="checkbox"  id="2" value="2">Écoute</p>
                    <p><input type="checkbox"  id="3" value="3">Imagination</p>
                    <p><input type="checkbox"  id="4" value="4">Espace</p>
                    <p><input type="checkbox"  id="5" value="5">Voix</p>
                    <p><input type="checkbox"  id="6" value="6">Concentration</p> 
                    <p><input type="checkbox"  id="7" value="7">Corporel</p>
                    <p><input type="checkbox"  id="8" value="8">Manipulation</p>
                    <p><input type="checkbox"  id="9" value="9">Pratique</p>
                    <p><input type="checkbox"  id="10" value="10">Personnages</p>
                    <p><input type="checkbox"  id="11" value="11">Stress</p>
                    <p><input type="checkbox"  id="12" value="12">Autre</p>
                    <p></p>-->
                </div>

                <!-- Bloc Niveau -->

                <div class="grid grid-cols-2 my-4">

                    <div class="grid border-2 border-gray-200 p-2 w-2/5 text-left grid-cols-4 m-1 w-full">        
                        <h3 class="col-span-2">Niveau conseillé : </h3>
                            <div class="col-span-2">
                                    <select 
                                        name="catégorie" 
                                        id="catégorie"
                                        v-model="exercice.meta.niveau">
                                            <option value="Débutant">Débutant</option>
                                            <option value="Intermédiaire">Intermédiaire</option>
                                            <option value="Confirmé">Confirmé</option>
                                    </select>
                            </div>
                    </div>

                    <!-- 
                    <div class="md:hidden flex justify-around">
                    <div class="border-2 border-gray-400 p-2">
                    <h3 class="md:text-xl">Type (3 max)</h3>
                    <select name="Type" 
                    id="Type"
                    multiple="yes"
                    v-model="exercice.type_dexercice"
                    >
                    <option type="checkbox" value="Type_1">Échauffement</option>
                    <option type="checkbox" value="Type_2">Écoute</option>
                    <option type="checkbox" value="Type_3">Imagination</option>
                    <option type="checkbox" value="Type_4">Espace</option>
                    <option type="checkbox" value="Type_5">Voix</option>
                    <option type="checkbox" value="Type_6">Concentration</option>
                    </select>
                    </div>
                    <div class="border-2 border-gray-400 p-2">
                    <h3 class="md:text-xl">Niveau</h3>
                    <select name="Niveau" 
                    id="Niveau"
                    v-model="exercice.niveau">
                    <option value="Type">Débutant</option>
                    <option value="Type">Intermédiaire</option>
                    <option value="Type">Confirmé</option>
                    </select>
                    </div>
                    </div>

                    -->

                    <!-- Bloc Titre -->

                    <div class="grid border-2 border-gray-200 p-2 w-2/5 text-left grid-cols-4 ml-1 w-full ">        

                    <p class="">Nom de l'exercice : 
                    <textarea 
                    type="text" 
                    class="mt-3 h-10 md:w-full p-1 bg-gray-50 text-gray-700 border-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" 
                    placeholder="Nom de l'exercice"
                    v-model="exercice.title"
                    >
                    </textarea>
                    </p>
                    </div>

                    <div class="md:grid grid-cols-12 my-2">

                    <!-- Bloc Description Courte -->

                    <p class="flex items-center col-span-7">Description générale : 
                    <textarea 
                    type="text" 
                    class="mt-3 block w-full p-2 bg-gray-50 text-gray-700 border-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" 
                    placeholder="Description générale"
                    v-model="exercice.excerpt"
                    >
                    </textarea>
                    </p>

                    <!-- Bloc Matos Élève -->

                    <div class="col-span-5">
                    <p class="flex items-center">Matériel par élève :
                    <input
                    type="text" 
                    class="mt-3 block w-full p-2 bg-gray-50 text-gray-700 border-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" 
                    placeholder="Matériel par élève"
                    v-model="exercice.meta.materiel_eleve"
                    >
                    </p>

                    <!-- Bloc Matos Global -->

                    <p class="flex items-center">Matériel global : 
                    <input
                    type="text" 
                    class="mt-3 block w-full p-2 bg-gray-50 text-gray-700 border-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" 
                    placeholder="Matériel global"
                    v-model="exercice.meta.materiel_global"
                    >
                    </p>

                    </div>
                    </div>

                    <!-- Bloc Description Détaillée -->

                    <div class="w-full mt-4">
                    <p class="text-left">Description detaillée de l'exercice :
                    <textarea 
                    type="text" 
                    class="mt-3 block border-2 w-full p-4 bg-gray-50 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600 h-48" 
                    placeholder="Description detaillée de l'exercice :"
                    v-model="exercice.content">
                    </textarea>
                    </p>
                    </div>

                    <!-- Bloc Privacy -->
                    <!-- <div class="md:flex justify-around my-4">
                    <div class="flex flex-col">
                    <h3 class="pb-4">Je choisis que cet exercice soit :</h3>
                    <div class="flex flex-block justify-around">
                    <p><input type="checkbox" name="public" value="0"> Public</p>
                    <p><input type="checkbox" name="prive" value="1"> Privé</p>
                    </div>
                    </div>
                    -->

                    <div class="md:flex justify-around my-4">
                    <div class="flex flex-col">
                    <h3 class="col-span-2">Mon exercice est en : </h3>
                    <div class="col-span-2">
                    <select 
                    name="privacy" 
                    id="privacy"
                    v-model="exercice.meta.statut">
                    <option value="Privé">Privé</option>
                    <option value="Public">Public</option>
                    </select>
                    </div>
                    </div>
                    </div>

                    <!-- Bloc Médias -->

                    <p class="flex items-center">Ajouter un média : 
                    <textarea 
                    type="text" 
                    class="mt-3 block w-full p-2 bg-gray-50 text-gray-700 border-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" 
                    placeholder="Ajout d'un média"
                    v-model="exercice.meta.media"
                    >
                    </textarea>
                    </p>
                </div>

                <!-- Bloc Boutons -->

                <div class="flex-wrap">

                <!-- <button class="bg-gray-500 hover:bg-gray-700 text-black p-2 mx-2 uppercase w-2/5 md:w-1/5 my-2">Brouillon</button>
                <button class="bg-green-500 hover:bg-green-700 text-white p-2 mx-2 uppercase w-2/5 md:w-1/5 my-2"
                type="submit"
                >Soumettre à modération</button> -->

                <button class="bg-green-500 hover:bg-green-700 text-white p-2 mx-2 uppercase w-2/5 md:w-1/5 my-2"
                type="submit"
                >Publier</button>
                <CancelButtonHome />
                </div>

                <!-- Bloc Erreurs -->

                <div>
                <p  v-if="errors.length" 
                class="errors w-full bg-red-800 text-white p-2 mx-2 uppercase w-2/5">
                <b>Il y a des erreurs :</b>
                <ul>
                <li class="errorItem" v-for="(error, index) in errors" v-bind:key="index">{{ error }}</li>
                </ul>
                </p>
                </div>

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
//   category: [],
//   time :"",
//   level :"",
//   title: "",
meta:{
//   type :[],
//   description_courte: "",
//   materiel_eleve: "",
//   materiel_global: "",
//   content: "",
//   statut: "",
//   media: "",
//   duree_de_lexercice: "",
}


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


// computed: {
//     isConnected() {
//     // on récupère l'état de connexion (booléen) depuis le state
//     return this.$store.state.isUserConnected;
//     },
//     username() {
//         console.log(this.$store.state.username);
//     return this.$store.state.username;
//     },
// },

methods: {

// disconnectUser() {
//   AuthenticationService.disconnectUser()
// },

addExercice() {

console.log("coucou", this.exercice);
this.errors = []
if (!this.exercice.title) {
this.errors.push("Titre obligatoire !");
} else {
//console.log(this.exercice);
// console.log(this.checkedArts);
// //console.log(this.exercice.art);
// console.log(this.exercice.meta.duree_de_lexercice);
// console.log(this.checkedTypes);
// console.log(this.exercice.meta.niveau);
// console.log(this.exercice.title);
// console.log(this.exercice.excerpt);
// console.log(this.exercice.meta.materiel_eleve);
// console.log(this.exercice.meta.materiel_global);
// console.log(this.exercice.content);
// console.log(this.exercice.meta.media);
// console.log(this.exercice.meta.statut);
this.exercice.meta.type_dexercice=this.checkedTypes;
this.exercice.art=this.checkedArts;
//console.log(this.checkedTypes, this.checkedArts);
ExerciceService.createExercice(this.exercice);
}
}


}
}
</script>

<style>

</style>