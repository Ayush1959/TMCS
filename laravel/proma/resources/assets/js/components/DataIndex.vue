<template>
  <div id="app" class="mx-auto py-6">
    <div class="content">
      <Wizard/>
    </div>
  </div>
</template>

<script>
import Wizard from "./comps/Wizard.vue";

export default {
  name: "app",
  components: {
    Wizard
  }
};
</script>