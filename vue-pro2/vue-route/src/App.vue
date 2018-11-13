<template>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <h1>Routing</h1>
      <hr>
      <app-header :userAge='age'></app-header>
      <router-view></router-view>
      <app-footer></app-footer>
    </div>
  </div>
</div>  
</template>

<script>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

export default {
  data: function() {
    return {
      age: 27
    };
  },
  components: {
    appHeader: Header,
    appFooter: Footer
  }
};
</script>

<style>
</style>
