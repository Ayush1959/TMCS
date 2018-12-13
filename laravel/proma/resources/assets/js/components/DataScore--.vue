<template>
  <div class="container">
    <div class="col-md-6 col-md-offset-2">
      <div id="success_message" class="alert alert-success" v-if="xx == 1">Score Changed</div>
      <form name="myform">
        <label for="empl">Employee:</label>
        <select v-model="selectedClient" class="form-control sell" id="empl">
          <option v-for="option in items1" :value="option.id">{{ option.user_name }}</option>
        </select>
        <label for="typ">Type:</label>
        <select v-model="Type" class="form-control sell" id="typ">
          <option v-for="option in types" :value="option">{{ option }}</option>
        </select>
        <label for="typ">Score:</label>
        <input type="number" class="form-control" v-model="score" id="scr">
        <label for="typ">Comments:</label>
        <input type="text" class="form-control" v-model="comments" id="cmnt">
      </form>
      <br>
      <br>
      <button @click="scoreUpdate()" class="btn btn-primary fr">Update Score</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items1: [],
      types: ["Credit", "Debit"],
      Type: null,
      selectedClient: null,
      score: null,
      xx: 0,
      comments: null
    };
  },
  created: function() {
    var x = this;
    // `this` points to the vm instance
    axios
      .get("http://127.0.0.1:8000/projectuser", {})
      .then(function(response) {
        if (response.status == 200) {
          console.log(response.data);
          x.items1 = response.data;
        } else {
          alert("Error");
        }
        console.log(response);
      })
      .catch(function(error) {
        console.log(error);
      });
  },
  methods: {
    scoreUpdate() {
      var x = this;
      axios
        .put(`http://127.0.0.1:8000/projectuser/${x.selectedClient}`, {
          score: this.score,
          type: this.Type,
          id: this.selectedClient,
          comments: this.comments
        })
        .then(function(response) {
          if (response.status == 200) {
            console.log(response);
            x.xx = 1;
            x.selectedClient = null;
            x.Type = null;
            x.score = null;
            x.comments = null;
            setTimeout(function() {
              x.xx = 0;
            }, 3000);
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>

<style>
.fr {
  float: right;
}
</style>
