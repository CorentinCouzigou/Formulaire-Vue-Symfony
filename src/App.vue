<template>
  <div class="container">
    <Modale />
    <img alt="Vue logo" src="./assets/logo.png" />
    <Formulaire />
    <div class="wrapper">
      <TableOfData v-if="loaderToggle" v-bind:dataOfUsers="users" />
      <div v-else class="loaderUsers"></div>
    </div>
  </div>
</template>

<script setup>
import Formulaire from "./components/Formulaire/Formulaire.vue";
import TableOfData from "./components/TableOfData/TableOfData.vue";

import { onBeforeMount, ref } from "vue";
import axios from "axios";

let loaderToggle = ref(false);
console.log(loaderToggle.value);
let users = ref();
let toggleModale = ref(true);
console.log(toggleModale.value);

onBeforeMount(async () => {
  await axios.get("http://127.0.0.1:8000").then((r) => (users.value = r.data));
  console.log(users);
  loaderToggle.value = true;
});
</script>

<style scoped src="./App.css">
.hidden {
  display: none;
}
.visible {
  display: block;
}
</style>
