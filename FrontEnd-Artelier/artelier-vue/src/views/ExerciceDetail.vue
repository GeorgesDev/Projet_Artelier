<template>
    <div>
            <body class="m-4">
                <main class="text-center">
                    <button type="button" class="hidden md:inline-block m-2 py-2 px-4 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none text-xl" tabindex="-1">
                    <router-link :to="{ name : 'home' }"> Retour à l'accueil </router-link>
                    </button>

                <div class="mt-2 border border-gray-700 px-2 bg-gradient-to-r from-red-100 via-red-300 to-red-100">
                    <section class="mt-2 border border-gray-700 px-2 md:flex md:justify-around md:items-center md:w-full bg-white">
                        <div class="p-2">
                            <h3 class="uppercase text-xl font-bold">titre de l'exercice : </h3>
                            <span class="text-2xl capitalize">{{ exercice.title.rendered }}</span>
                        </div>
                        <div class="flex justify-around">
                            <!-- <button type="button" class="m-2 py-2 px-4 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none uppercase" tabindex="-1">
                                editer
                            </button> -->
                            
                            <StatutButton />
      
                        </div>
                    </section>

                    <div class="md:grid md:grid-cols-5 ">

                        <section class="mt-2 border border-gray-700 pr-2 text-left md:border-none md:col-span-3 ">
                            <!-- <div class="border border-gray-700 flex items-center bg-white">
                                <h3 class="uppercase text-l font-bold p-2">catégorie :</h3>
                                <ul v-bind:key="idExercice" v-for="(type, idExercice) in exercice.art">
                                    <li :for="artListglobal[idExercice]" class="text-l pr-2">
                                        {{ artListglobal[idExercice].name }}
                                    </li>
                                </ul>
                                
                            </div> -->
                            <div class="border border-gray-700 flex items-center my-3 bg-white">
                                <h3 class="uppercase text-l font-bold p-2">type :</h3>
                                    <ul class="flex">
                                        <li class="pr-2" v-bind:key="idExerciceType" v-for="(type,idExerciceType) in exercice.meta.type_dexercice">
                                            <label>{{ type }}</label>
                                        </li>
                                    </ul>
                            </div>
                            <div class="border border-gray-700 p-1 my-3 bg-white">
                                <h3 class="uppercase text-l font-bold px-1">Description générale : </h3>
                                <p class="pl-5">
                                    <span v-html=exercice.excerpt.rendered></span>
                                </p>
                            </div>
                            <div class="border border-gray-700 p-1 mt-3 h-72 bg-white">
                                <h3 class="uppercase text-l font-bold px-1">notes :</h3>
                                <div class="pl-5">
                                    <div class="text-sm text-justify pr-2">
                                        <span v-html=exercice.content.rendered></span>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="mt-2 border border-gray-700 px-2 text-left md:col-span-2 bg-white">
                                <div class="flex">
                                    <div class="w-full">
                                        <!-- <div class="flex items-center md:py-4">
                                            <h3 class="capitalize text-xl font-bold">auteur : </h3>
                                            <p class="pl-5">
                                                <ul v-bind:key="idAuthor" v-for="idAuthor in exercice._edit_last">
                                                    <li :for="userListglobal[idAuthor]">
                                                        {{ userListglobal[idAuthor].name }}
                                                    </li>
                                                </ul>
                                            </p>
                                        </div> -->
                                        <div class="flex items-center md:py-4">
                                            <h3 class="capitalize text-xl font-bold">niveau :</h3>
                                            <p class="pl-5">{{ exercice.niveau }}</p>
                                        </div>
                                        <div class="flex items-center md:py-4">
                                            <h3 class="capitalize text-xl font-bold">temps estimé : </h3>
                                            <p class="pl-5">{{ exercice.duree_de_lexercice }} min</p>
                                        </div>
                                        <div class="flex md:py-4">
                                            <h3 class="capitalize text-xl font-bold">matériel :</h3>
                                                <div class="flex flex-col pl-3">
                                                    <h4 class="text-left italic capitalize">par éleves :</h4>
                                                    <ul class="flex" >
                                                        <li class="pr-2 capitalize" v-bind:key="idMatosEleve" v-for="(type,idMatosEleve) in exercice.meta.materiel_eleve">
                                                            <label>{{ type }}</label>
                                                        </li>
                                                    </ul>
                                                    <h4 class="text-left italic capitalize">global :</h4>
                                                    <ul class="flex flex-col" >
                                                        <li class="pr-2 capitalize" v-bind:key="idMatosGlobal" v-for="(type,idMatosGlobal) in exercice.meta.materiel_global">
                                                            <label>{{ type }}</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                        </div>
                                        <div class="pt-3 px-2">
                                            <div v-if="exercice.status =='publish'">
                                                <div class="hidden md:flex flex-col justify-center items-center py-5">
                                                    <img class="object-scale-down border-4 border-green-500 w-20 h-20 bg-white" src="../assets/icons/validation.svg" alt="" ><span class="uppercase p-2">publié</span>
                                                </div>
                                            </div>
                                            <div v-if="exercice.status =='draft'">
                                                <div class="hidden md:flex flex-col justify-center items-center py-5">
                                                    <img class="object-scale-down border-4 border-yellow-500 w-20 h-20" src="../assets/icons/validation.svg" alt="" ><span class="uppercase p-2">brouillon</span>
                                                </div>
                                            </div>
                                            <div v-if="exercice.status =='pending'">
                                                <div class="hidden md:flex flex-col justify-center items-center py-5">
                                                    <img class="object-scale-down border-4 border-red-500 w-20 h-20" src="../assets/icons/validation.svg" alt="" ><span class="uppercase p-2">en cours de modération</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="hidden m-2 py-2 px-4 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none" tabindex="-1">
                                Ajouter à un nouveau cours
                                </button>
                        </section>

                        <div class="md:col-span-3 border border-gray-700 p-1 mr-2 my-3 bg-white">
                            <section class="mt-2 border border-gray-700 px-2 my-2 flex md:border-none">
                                <h3 class="capitalize text-xl font-bold">media</h3>
                                <div class="grid grid-cols-2 p-5">
                                    <a href="" class="p-5 text-7xl"><img src="../assets/icons/K7.svg" alt="" width="80"></a>
                                    <a href="" class="p-5 text-7xl">&#9654;</a>
                                    <p class="text-sm underline"> {{ exercice.media }}</p>

                                </div>
                            </section>
                        </div>
                        <div class="md:col-span-2 flex items-center">
                            <section class="flex justify-around">
                                <button type="button" class="hidden m-2 py-2 px-4 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none text-xl" tabindex="-1">
                                    Partager l'exercice
                                </button>
                                <button type="button" class="hidden m-2 py-2 px-4 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none text-xl" tabindex="-1">
                                    voir mon cours
                                </button>
                            </section>
                            <!-- <section class="flex justify-around">
                              <DeleteButton />  
                            </section> -->
                        </div>
                    </div>
                </div>
            </main>
        
            </body>
    </div>
</template>
<script>
import ExerciceService from "../services/ExerciceService";
import StatutButton from "../components/StatutButton.vue";
//import DeleteButton from "../components/DeleteButton.vue";
export default {
    data () {
        return {
            exercice:[],
            artList: [],
            art:[],
            userListglobal:[],
        };
    },
    components: {
        StatutButton,
        //DeleteButton,   
    },
    name: 'exercice',
    mounted () 
        
    {
        ExerciceService.artList(this.$route.params).then((response) => {
            this.artListglobal = response.data;
            //console.log(response.data)
            },
        );
         ExerciceService.usersList(this.$route.params).then((response) => {
            this.userListglobal = response.data;
            //console.log(response.data)
            },
        );
        ExerciceService.getExercice(this.$route.params.id).then((response) => {
            this.exercice = response.data;
            console.log(response.data)
            this.artList = response.data.art;
            //console.log(this.artList)
            this.exoType = response.data.meta.type_dexercice;
            //console.log(this.exoType)
            },
        );
     },
}
</script>