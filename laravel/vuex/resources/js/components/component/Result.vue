<template>
  <div>
    <p>Counter is: {{ counter }}</p>
    <p>Double Counter is: {{ doubleCounter }}</p>
    <p>Number of clicks is: {{ stringCounter }}</p>
    <!-- <p>Counter is: {{ counter }}</p>
    <p>Number of clicks is: {{ clicks }}</p>-->
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters(["doubleCounter", "stringCounter"]),
    counter() {
      return this.$store.state.counter;
    }
  }
  // props: ['counter']
  //   computed: {
  //     counter() {
  //       return this.$store.state.counter;
  //     },
  //     clicks() {
  //       return this.$store.getters.stringCounter;
  //     }
  //   }
};
</script> 