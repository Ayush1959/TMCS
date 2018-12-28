<template>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <h1>Vuex</h1>
        <app-result></app-result>
        <hr>
        <app-anotherresult></app-anotherresult>
        <!-- <app-result :counter="counter"></app-result> -->
        <hr>
        <app-counter></app-counter>
        <app-anothercounter></app-anothercounter>
        <app-anotheraction></app-anotheraction>
        <!-- <app-counter @updated="counter += $event"></app-counter> -->
        <hr>
        <!-- <input type="text" :value="value" @input="updateValue"> -->
        <input type="text" v-model="value">
        <p>{{ value }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import Counter from "./component/Counter.vue";
import AnotherAction from "./component/AnotherAction.vue";
import AnotherCounter from "./component/AnotherCounter.vue";
import Result from "./component/Result.vue";
import AnotherResult from "./component/AnotherResult.vue";

export default {
  computed: {
    value: {
      get() {
        return this.$store.getters.value;
      },
      set(value) {
        this.$store.dispatch("updateValue", value);
      }
    }
  },
  methods: {
    updateValue(event) {
      this.$store.dispatch("updateValue", event.target.value);
    }
  },
  //   data() {
  //     return {
  //       counter: 0
  //     };
  //   },
  components: {
    appCounter: Counter,
    appAnothercounter: AnotherCounter,
    appAnotheraction: AnotherAction,
    appResult: Result,
    appAnotherresult: AnotherResult
  }
};
</script>

