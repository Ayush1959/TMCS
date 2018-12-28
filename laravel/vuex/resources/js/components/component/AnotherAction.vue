<template>
  <div>
    <button class="btn btn-primary" @click="increment">Increment</button>
    <button class="btn btn-primary" @click="decrement">Decrement</button>
    <button class="btn btn-primary" @click="asyncIncrement">Async Increment</button>
    <button class="btn btn-primary" @click="asyncDecrement">Async Decrement</button>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  methods: {
    ...mapActions([
      "increment",
      "decrement",
      "asyncIncrement",
      "asyncDecrement"
    ])
    // increment() {
    //   // this.$emit('updated', 1);
    //   this.$store.state.counter++;
    // },
    // decrement() {
    //   // this.$emit('updated', -1);
    //   this.$store.state.counter--;
    // }
  }
};
</script> 