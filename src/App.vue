<template>
  <img alt="Vue logo" src="./assets/logo.png" />
  <Formulaire />
  <TableOfData v-bind:dataOfUsers="users" />
</template>

<script setup>
import Formulaire from "./components/Formulaire.vue";
import TableOfData from "./components/TableOfData.vue";
// import axios from "axios";

let users = [
  { _id: 1, lastname: "doe", firstname: "john" },
  { _id: 2, lastname: "Poutine", firstname: "Vladimir" },
];
// const dataUsers = await axios
//   .get("http://127.0.0.1:8000")
//   .then((r) => console.log("response", r));
// console.log("dataUsers", dataUsers);
// users = dataUsers;
</script>

<style scoped src="./App.css"></style>
