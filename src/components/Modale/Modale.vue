<template>
  <div class="modal__container">
    <div class="modal__contain">
      <p>Modifier vos informations:</p>
      <form class="modal__formulaire" method="post" action="">
        <label for="email">
          Modifier votre email
          <input
            v-model="formData.email"
            id="email"
            type="email"
            v-bind:placeholder="userEmail"
          />
        </label>
        <label for="password">
          Modifier votre password
          <input
            v-model="formData.password"
            id="password"
            type="text"
            v-bind:placeholder="userPassword"
          />
        </label>
        <button
          class="btn btn-primary mt-4"
          v-on:click.prevent="onSubmitForm(userId, userEmail, userPassword)"
        >
          Valider
        </button>
        <span>{{ errorMessage }}</span>
      </form>
      <div>
        <button class="modal__close" v-on:click="handleToggleModale()">
          X
        </button>
      </div>
    </div>
    <div class="modal__overlay"></div>
  </div>
</template>

<script setup>
import { defineProps, ref } from "vue";
import axios from "axios";
defineProps({
  userId: Number,
  userEmail: String,
  userPassword: String,
  handleToggleModale: Function,
});

let formData = { email: "", password: "" };
let errorMessage = ref("");
function onSubmitForm(id, email, password) {
  // transformation en json de mes data
  if (formData.email.length > 0 && formData.password.length > 0) {
    console.log("id", id);
    console.log("id", email);
    console.log("id", password);
    let jsonData = JSON.stringify(formData);
    console.log("json", jsonData);
    axios({ method: "patch", url: "http://127.0.0.1:8000/", data: jsonData })
      .catch((error) => console.log(error))
      .then((r) => console.log("responsePost", r));
    errorMessage.value = "Votre modification est validée.";
  } else {
    errorMessage.value = "Modification des champs requise.";
  }
}
</script>
<style scoped src="./Modale.css"></style>
