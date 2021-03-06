<template>
    <div>
            <body class="m-4">
                <main class="text-center">

                    <section class="border-2 border-gray-400 my-4">
                        <h1 class="uppercase p-2 border-b-2 border-gray-400">FORMULAIRE DE CONTACT DES AUTRES PROFESSEURS</h1>
                    </section>

                    <div class="border-2 border-gray-400 p-4">
                        <p class="my-2 md:grid md:grid-cols-5 md:items-center md:justify-around text-left"><span class="md:col-start-2">Nom : </span><input type="text" class="mt-3 h-10 block md:col-span-2 md:col-start-3 w-full p-1 bg-gray-50 text-gray-700 border-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" placeholder="Nom"/></p>
                        <p class="my-2 md:grid md:grid-cols-5 md:items-center md:justify-around text-left"><span class="md:col-start-2">Prénom : </span><input type="text" class="mt-3 h-10 block md:col-span-2 md:col-start-3 w-full p-1 bg-gray-50 text-gray-700 border-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" placeholder="Prénom"/></p>
                        <p class="my-2 md:grid md:grid-cols-5 md:items-center md:justify-around text-left"><span class="md:col-start-2">Nom d'utilisateur : </span><input type="text" class="mt-3 h-10 block md:col-span-2 md:col-start-3 w-full p-1 bg-gray-50 text-gray-700 border-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" placeholder="Nom d'utilisateur"/></p>
                        <p class="my-2 md:grid md:grid-cols-5 md:items-center md:justify-around text-left"><span class="md:col-start-2">Email : </span><input type="email" class="mt-3 h-10 block md:col-span-2 md:col-start-3 w-full p-1 bg-gray-50 text-gray-700 border-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600" placeholder="Email"/></p>
                    </div>

                    <div class="w-full mt-4 border-2 border-gray-400 p-4">
                        <p class="text-left md:grid md:grid-cols-9"><span class="md:col-start-2"> Message : </span><input type="text" class="md:col-start-2 md:col-span-7 mt-3 block border-2 w-full p-4 bg-gray-50 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600 h-96" placeholder="Message"/></p>
                    </div>

                    <div class="flex flex-row items-center justify-around md:my-4">
                        <button class="bg-green-500 hover:bg-green-700 text-white p-2 mx-2 uppercase w-2/5 md:w-1/5 my-2">envoyer</button>
                        <CancelButtonHome />

                    </div>
                </main>
            </body>
    </div>
</template>

<script>
import CancelButtonHome from "../components/CancelButtonHome.vue"


export default {
    components: {
        CancelButtonHome,
    }
}
</script>