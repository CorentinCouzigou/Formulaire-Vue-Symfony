<template>
  <div id="TableOfData">
    <h2>Liste des utilisateurs.</h2>
    <table class="mt-5">
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
              v-on:click="handleDeleteUser(user.id)"
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
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "TableOfData",
  props: {
    dataOfUsers: {
      type: Array,
    },
  },
  data: function () {
    return {};
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
  },
};
</script>

<style></style>
