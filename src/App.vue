<template>
  <div>
    <img alt="Vue logo" src="./assets/logo.png" />
    <Formulaire />
    <TableOfData v-bind:dataOfUsers="users" />
  </div>
</template>

<script setup>
import Formulaire from "./components/Formulaire.vue";
import TableOfData from "./components/TableOfData.vue";
import axios from "axios";

let users = [
  { id: 0, email: "doe", password: "john" },
  { id: 2, email: "Poutine", password: "Vladimir" },
  { id: 3, email: "Poutine", password: "Vladimir" },
];
await axios.get("http://127.0.0.1:8000").then((r) => users.push(r.data));
console.log(users);
</script>

<style scoped src="./App.css"></style>
