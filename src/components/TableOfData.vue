<template>
  <div id="TableOfData">
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
      </thead>
      <tbody>
        <tr
          :style="{ border: '1px solid black', 'text-align': 'center' }"
          v-bind:key="user.id"
          v-for="user in dataOfUsers"
        >
          <td>{{ user.id }}</td>
          <td
            :style="{
              'border-right': '1px solid black',
            }"
          >
            {{ user.email }}
          </td>
          <td>{{ user.password }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
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
};
</script>

<style></style>
