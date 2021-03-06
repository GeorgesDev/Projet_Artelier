<template>
    <div>
            <body class="m-4">
                <main class="text-center">
   
                

                    <section class="border-2 border-gray-400 my-4">
                        <h1 class="uppercase p-2 border-b-2 border-gray-400">ADMINISTRATION DES EXERCICES</h1>
                    </section>

                            <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="border border-gray-700 px-2">Domaine</th>
                                    <th class="border border-gray-700 px-2">Titre</th>
                                    <th class="border border-gray-700 px-2">Exercice</th>
                                    <th class="border border-gray-700 px-2">Validation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-gray-700">Théâtre</td>
                                    <td class="border border-gray-700">Titre 1</td>
                                    <td class="border border-gray-700"><img src="../assets/icons/look.svg" alt="" width="23"></td>
                                    <td class="border border-gray-700"><img src="../assets/icons/ok.svg" alt="" width="23"><img src="../assets/icons/cross.svg" alt="" width="23"></td>
                                </tr>
                                <tr>
                                   <td class="border border-gray-700">Danse</td>
                                    <td class="border border-gray-700">Titre 2</td>
                                    <td class="border border-gray-700"><img src="../assets/icons/look.svg" alt="" width="23"></td>
                                    <td class="border border-gray-700"><img src="../assets/icons/ok.svg" alt="" width="23"><img src="../assets/icons/cross.svg" alt="" width="23"></td>
                                </tr>
                               
                            </tbody>
                        </table>

                </main> 
            </body>
    </div>
</template>

<script>
    export default {
        data: () => {
            return {
                domain : ['Theatre', 'Danse', 'Musique', 'Chant', 'Cinéma'],
                ExerciceModeration : [

                ]
            }
        }
    }
</script>