<template>
  <div class="formulaire">
    <h1>Mon formulaire</h1>
    <form class="formulaire" method="post" action="">
      <label for="Email">Votre Email</label>
      <input
        v-model="formData.email"
        type="email"
        placeholder="email"
        id="email"
        class="form-control"
      />
      <label for="name">Votre nom</label>
      <input
        v-model="formData.name"
        type="text"
        placeholder="name"
        id="firstname"
        class="form-control"
      />
      <label for="MDP">Votre mot de passe</label>
      <input
        v-model="formData.password"
        type="password"
        placeholder="Mot de passe"
        id="MDP"
        class="form-control"
      />
      <button class="btn btn-primary mt-4" v-on:click.prevent="onSubmitForm">
        Valider
      </button>
    </form>
  </div>
</template>

<script setup>
import axios from "axios";
let formData = { email: "", name: "", password: "" };

function onSubmitForm() {
  let jsonData = JSON.stringify(formData);
  console.log("json", jsonData);
  axios({ method: "post", url: "http://127.0.0.1:8000/", data: jsonData })
    .catch((error) => console.log(error))
    .then((r) => console.log("responsePost", r));
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped src="./Formulaire.css"></style>
