<template>
<div>
    <h3>Edit the user</h3>
    <hr>
    <button class="btn btn-primary" @click="confirmed = true">Confirm</button>
</div>
    <!-- <div style="height: 700px"></div> -->
    <!-- <p id="data"></p> -->
</template>


<script>
export default {
  data() {
    return {
      confirmed: false
    };
  },
  beforeRouteLeave(to, from, next) {
    if (this.confirmed) {
      next();
    } else {
      if (confirm("Are you sure?")) {
        next();
      } else {
        next(false);
      }
    }
  }
};
</script>
