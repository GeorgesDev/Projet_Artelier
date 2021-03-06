<template>
    <div>
        <body class="m-4">
            <main class="text-center w-full">

                <section class="m-4 grid grid-cols-5">
                    <h2 class="uppercase p-2 border border-blue-800 mb-4 col-span-3 col-start-2">liste des 5 derniers exercices</h2>

                    <table class="col-start-1 w-full col-span-5">
                        <thead>
                            <tr>
                                <th class="border border-blue-800 px-2">Titre</th>
                                <th class="border border-blue-800 px-2">Niveau</th>
                                <th class="border border-blue-800 px-2">Durée</th>
                                <!-- <th class="border border-blue-800 px-2">Catégorie</th> -->
                                <th class="border border-blue-800 px-2">Type d'Exercice</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr :key="index" v-for="(exercice,index) in exercices">
                                <td class="border border-blue-800 capitalize underline"><router-link :to="`/exercice/${exercice.id}`"><titre :exercice="exercice" />{{ exercice.title.rendered}}</router-link></td> 
                                <td class="border border-blue-800 capitalize">{{exercice.niveau}}</td>
                                <td class="border border-blue-800">{{exercice.duree_de_lexercice}} min</td>
                                 <!-- <td class="border border-blue-800 p-2">
        <ul class="flex justify-center">
            <li class="pr-2" v-bind:key="idExerciceType" v-for="(type,idExerciceType) in exercice.art">
                <label >{{ type }}</label>
            </li>
        </ul>
        <ul class="flex justify-center" v-bind:key="idExerciceType" v-for="(type,idExerciceType) in exercice.art">
            <li class="pr-2" :for="artListglobal['{{type}}']" >
                <label :for="artListglobal[type]" >{{ artListglobal['{{type}}'] }}</label>
            </li>
        </ul> -->


        <!-- <ul v-bind:key="idExercice" v-for="(type, idExercice) in exercice.art">
            <li :for="artListglobal[idExercice]" class="text-l pr-2">
                {{ artListglobal[idExercice].name }}
            </li>
        </ul> -->


                                <!-- </td> -->

                                <td class="border border-blue-800 p-2">

                                    <ul class="flex justify-center">
                                        <li class="pr-2" v-bind:key="idExerciceType" v-for="(type,idExerciceType) in exercice.meta.type_dexercice">
                                            <label>{{ type }}</label>
                                        </li>
                                    </ul>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
             </main>
        </body>
    </div>
</template>

<script>
import axios from "axios"
import ExerciceService from "../services/ExerciceService";
export default {
   
    data() {
        return {
            exercicesUrl: 'http://localhost/apotheose_complet/project-artelier/Wordpress/wp-json/wp/v2/exercice',
            artUrl: 'http://localhost/apotheose_complet/project-artelier/Wordpress/wp-json/wp/v2/art',
            exercices: [],
            artList:[],
            exercicesData: {
                per_page: 15,
            },
            exercice:[],
            artList2: [],
            art:[],
            userListglobal:[],
            artListglobal:[],
        }
    },
    mounted () {
        this.getExerciceList();
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
            //console.log(response.data)
            this.artList2 = response.data.art;
            //console.log(this.artList)
            this.exoType = response.data.meta.type_dexercice;
            //console.log(this.exoType)
            },
        );
    },
    methods: {
        getExerciceList() {
            axios.get(this.exercicesUrl, {params: this.exercicesData})
            .then((response) => {
                this.exercices = response.data;
                this.artList = response.data.art;
                //console.log(this.exercices);
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
    },
}
</script>
