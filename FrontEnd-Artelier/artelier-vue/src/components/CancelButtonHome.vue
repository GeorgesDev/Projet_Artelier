<template>

  <button class="bg-red-500 hover:bg-red-700 text-black p-2 mx-2 uppercase w-2/5 md:w-1/5 my-2">
    <router-link :to="{ name : 'home' }">
      Annuler
    </router-link>
  </button>

</template>

<script>
export default {
  name: "CancelButtonHome",
};
</script>