<template>
  <div class="modal__container">
    <h1>Salut</h1>
    <div class="modal__contain" >
      <p>Modifier vos informations:</p>
      <form>
        <label for="email">
          Modifier votre email
          <input id="email" type="email" placeholder="{{userEmail}}" />
        </label>
        <label for="password">
          Modifier votre password
          <input id="password" type="text" placeholder="{{userPassword}}" />
        </label>
      </form>
      <div>
        <button class="modal__close" v-on:click="handleToggleModale">X</button>
      </div>
    </div>
    <div class="modal__overlay"></div>
  </div>
</template>

<script setup>
import { defineProps } from "vue";

defineProps({
  userId: Number,
  userEmail: String,
  userPassword: String,
  handleToggleModale: Function,
});
</script>
<style scoped src="./Modale.css"></style>
