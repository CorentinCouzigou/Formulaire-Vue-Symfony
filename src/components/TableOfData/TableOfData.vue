<template>
  <div id="TableOfData">
    <div v-if="toggleModified">
      <modale
        v-bind:userId="modalData.id"
        v-bind:userEmail="modalData.email"
        v-bind:userPassword="modalData.password"
        v-bind:handleToggleModale="handleToggleModale"
      />
    </div>
    <h2>Liste des utilisateurs.</h2>
    <table>
      <thead
        :style="{
          color: 'white',
          'background-color': 'black',
          border: '1px solid black',
        }"
      >
        <th>id</th>
        <th>Email</th>
        <th>Password</th>
        <th></th>
        <th></th>
      </thead>
      <tbody>
        <tr
          :style="{ border: '1px solid black', 'text-align': 'center' }"
          v-bind:key="user.id"
          v-for="user in dataOfUsers"
        >
          <td
            :style="{
              'border-right': '1px solid black',
            }"
          >
            {{ user.id }}
          </td>
          <td
            :style="{
              'border-right': '1px solid black',
            }"
          >
            {{ user.email }}
          </td>
          <td
            :style="{
              'border-right': '1px solid black',
            }"
          >
            {{ user.password }}
          </td>
          <td>
            <button
              type="button"
              v-bind:id="user.id"
              v-on:click="
                handleDeleteUser(user.id, user.email, user.password);
                handleToggleModale();
              "
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-x-circle-fill"
                viewBox="0 0 16 16"
              >
                <path
                  d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"
                />
              </svg>
            </button>
          </td>
          <td :style="{ border: '1px solid black', 'text-align': 'center' }">
            <button
              type="button"
              v-bind:id="user.id"
              v-on:click="
                handleUpdateUser(user.id, user.email, user.password),
                  handleToggleModale()
              "
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-pencil"
                viewBox="0 0 16 16"
              >
                <path
                  d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"
                />
              </svg>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
import Modale from "../Modale/Modale.vue";
export default {
  name: "TableOfData",
  components: {
    modale: Modale,
  },
  props: {
    dataOfUsers: {
      type: Array,
    },
  },
  data: function () {
    return {
      toggleModified: false,
      modalData: {
        id: "",
        email: "",
        password: "",
      },
    };
  },
  methods: {
    handleDeleteUser: function (id) {
      console.log(id);
      let jsonData = JSON.stringify(id);
      console.log("json", jsonData);
      axios({ method: "delete", url: "http://127.0.0.1:8000/", data: jsonData })
        .catch((error) => console.log(error))
        .then((r) => console.log("responseDelete", r));
    },
    handleToggleModale: function () {
      this.toggleModified = !this.toggleModified;
    },
    handleUpdateUser: function (id, email, password) {
      console.log(email);
      console.log(password);
      this.modalData.id = id;
      console.log("userId", this.modal);
      this.modalData.email = email;
      this.modalData.password = password;
    },
  },
};
</script>

<style scoped src="./TalbeOfData.css"></style>
