<template>
    <div> 
        <body class="m-4">
            <main class="flex flex-col items-center">
                <!-- <form class="md:m-7 flex flex-col items-center">
                    <p class="pt-2 block md:hidden text-left w-72">Recherche exercice, prof</p>
                    
                    <div class="relative"> 
                        <i class="absolute fa fa-search text-gray-400 top-5 left-4"></i> 
                        <input type="text" class="bg-gray-600 h-14 w-full px-12 focus:outline-none focus: ring-gray-600 focus:border-gray hover:cursor-pointer md:text-white" placeholder="Recherche exercice, prof"> 
                        <span class="absolute top-4 right-5 border-l pl-4"></span> 
                    </div>


                    


                    <button class="my-2 md:my-4 px-4 py-1 w-auto bg-gray-600 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50">
                    Rechercher
                    </button>
                </form> -->
            
                <HomeIcons />
                
                <section class="hidden md:flex flex-col items-center md:mx-8">
                    <h3 class="border-b-2 border-purple-400 text-center text-2xl">A propos d'Artelier</h3>
                    <p class="text-justify md:pt-5">Artelier est un projet à l’attention des professeurs d’éducation artistique. Il permet à ces formateurs de pouvoir centraliser leurs propres exercices pour créer leurs propres cours.Nous sommes partis de la volonté de pouvoir créer des exercices sur le pouce, de pouvoir élaborer des cours à la volée, et de pouvoir le faire sur plusieurs supports numériques. Fini les cahiers, les feuilles volantes, et les exercices notés quelque part mais je sais plus où. Avec Artelier, il est possible d’y déposer son exercice, marquer le matériel à prévoir, y inscrire les liens des médias parfois nécessaires pour la réalisation de certains exercices, le temps par élève, le niveau, etc... et de pouvoir sélectionner ces exercices pour créer des cours en fonction des thématiques que vous souhaitez ! Vous aurez également la possibilité de garder privé vos exercices, comme de les partager avec d’autres utilisateurs, ou même de les rendre public.</p>
                </section>
            </main>   
        </body>
    </div>
</template>

<script>  
import HomeIcons from "../components/HomeIcons.vue"

export default {
    components: {
        HomeIcons
    }
}
</script>
