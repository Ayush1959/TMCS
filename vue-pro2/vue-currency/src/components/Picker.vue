<template>
    <div class="container">
        <div>Hey There</div>
        <form action="">
            <input @input="submit" name="amount" v-model="amount" id="amount" type="number">
            <select name="Curency" id="Curency" v-model="currency">
              <option v-for="curr in currencies" >{{ curr }}</option>
            </select>
        </form>
    </div>
</template>

<script>
export default {
  data() {
    return {
      currency: null,
      amount: null,
      currencies: ["Rupee", "Dollar", "Pound"]
    };
  },
  methods: {
    submit() {
      // alert(this.amount);
      this.$emit("onAmountChange", this.amount);
    }
  }
};
</script>

<style>
</style>
