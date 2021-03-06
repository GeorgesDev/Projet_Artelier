 
<template>
    <section class="md:border-2 md:border-purple-400 md:p-10 md:mb-10 flex flex-col md:flex-row md:justify-center bg-gradient-to-r from-red-100 via-red-300 to-red-100">
                    <router-link :to="{ name : 'home' }"  class="text-6xl py-4 md:px-4 flex md:flex-col items-center"><img src="../assets/icons/theater.svg" alt="theatre" width="80"><span class="pl-4 text-xl capitalize">theatre</span></router-link>
                    <router-link :to="{ name : 'home' }"  class="text-6xl py-4 md:px-4 flex md:flex-col items-center"><img src="../assets/icons/music.svg" alt="musique" width="80"><span class="pl-4 text-xl capitalize">musique</span></router-link>
                    <router-link :to="{ name : 'home' }"  class="text-6xl py-4 md:px-4 flex md:flex-col items-center"><img src="../assets/icons/dance.svg" alt="danse" width="80"><span class="pl-4 text-xl capitalize">danse</span></router-link>
                    <router-link :to="{ name : 'home' }"  class="text-6xl py-4 md:px-4 flex md:flex-col items-center"><img src="../assets/icons/cinema.svg" alt="cinéma" width="80"><span class="pl-4 text-xl capitalize">cinéma</span></router-link>
                    <router-link :to="{ name : 'home' }"  class="text-6xl py-4 md:px-4 flex md:flex-col items-center"><img src="../assets/icons/sing.svg" alt="chant" width="80"><span class="pl-4 text-xl capitalize">chant</span></router-link>
                </section> 
</template>

<script>
export default {
  name : "HomeIcons",
}
</script>