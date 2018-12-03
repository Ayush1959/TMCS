<template>
  <div id="app" class="container mx-auto py-6">
    <div class="content">
      <Wizard/>
    </div>
  </div>
</template>

<script>
// import Wizard from "./components/CompOne.vue";
import Wizard from "./components/masterComp.vue";
// import Wizard from "./components/realtime.vue";

export default {
  name: "app",
  components: {
    Wizard
  }
};
</script>