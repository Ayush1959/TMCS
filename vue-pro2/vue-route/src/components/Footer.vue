<template>
    <div class="component">
        <p>User age : {{ userAge }}</p>
        <button @click="editAge">Edit age</button>
    </div>
</template>

<script>
import { EventBus } from "../main";

export default {
  props: {
    userAge: {
      default: 20
    }
  },
  methods: {
    editAge() {
      this.userAge = 40;
      EventBus.$emit("ageWasEdited", this.userAge);
    }
  }
};
</script>

<style scoped>
div {
  background-color: lightgreen;
}
</style>
