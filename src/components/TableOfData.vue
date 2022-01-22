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
        <th>Lastname</th>
        <th>Firstname</th>
      </thead>
      <tbody>
        <tr
          :style="{ border: '1px solid black', 'text-align': 'center' }"
          v-bind:key="user._id"
          v-for="user in dataOfUsers"
        >
          <td
            :style="{
              'border-right': '1px solid black',
            }"
          >
            {{ user.lastname }}
          </td>
          <td>{{ user.firstname }}</td>
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
