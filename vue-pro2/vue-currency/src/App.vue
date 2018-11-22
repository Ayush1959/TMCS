<template>
  <div id="app" class="container mx-auto py-6">    
    <div class="content">
      <Wizard/>
    </div>
  </div>
</template>

<script>
import Wizard from "./components/Wizard.vue";
export default {
  name: "app",
  components: {
    Wizard
  }
};
</script>