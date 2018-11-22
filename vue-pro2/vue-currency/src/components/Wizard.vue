<template>
  <div>
    <div>
    <Picker @onAmountChange="amount = $event"/>
    </div>   
    <div>
      {{ currency }}
    </div>
    <div>
      {{ amount }}
    </div>
  </div>
</template>

<script>
import Picker from "./Picker";

export default {
  name: "Wizard",
  components: {
    Picker
  },
  data() {
    return {
      currency: null,
      amount: null
    };
  },
  methods: {}
};
</script>

<style>
</style>
