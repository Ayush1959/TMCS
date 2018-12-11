<template>
  <div>
    <!-- {{ selectedClient }} -->
    <button @click="getAllData()">Get</button>
    <button @click="getAll()">Month</button>
    <!-- {{ Type }} -->
    <div id="success_message" class="alert alert-success" v-if="xx == 1">Score Changed</div>
    <form name="myform">
      Employee:
      <select v-model="selectedClient" class="form-control sell">
        <option v-for="option in items1" :value="option.id">{{ option.user_name }}</option>
      </select>
      Type:
      <select v-model="Type" class="form-control sell">
        <option v-for="option in types" :value="option">{{ option }}</option>
      </select>
      Score:
      <input type="number" class="form-control" v-model="score">
      Comments:
      <input type="text" class="form-control" v-model="comments">
    </form>
    <br>
    <br>
    <button @click="scoreUpdate()">Update Score</button>
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
          // x.items2 = response.data[2];
          // x.looper(response.data);
          //x.items0 = response.data;
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
      //   axios
      //     .all([
      //       axios.put(`http://127.0.0.1:8000/projectuser/${x.selectedClient}`, {
      //         score: this.score,
      //         type: this.Type
      //       }),
      //       axios.post("http://127.0.0.1:8000/projectuser", {
      //         id: this.selectedClient,
      //         comments: this.comments
      //       })
      //     ])
      //     .then(
      //       axios.spread((firstResponse, secondResponse) => {
      //         console.log(firstResponse.data, secondResponse.data);
      //         // console.log(secondResponse.status);
      //         if (secondResponse.status == 200) {
      //           x.xx = 1;
      //           x.selectedClient = null;
      //           x.Type = null;
      //           x.score = null;
      //           setTimeout(function() {
      //             x.xx = 0;
      //           }, 3000);
      //         } else {
      //           alert("Error");
      //         }
      //       })
      //     )
      //     .catch(error => console.log(error));
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
    },
    getAllData() {
      //   this.bttn = false;
      //   this.mrdata = 1;
      var x = this;
      //   x.Newdata = true;
      axios
        .get("http://127.0.0.1:8000/projectcontroller", {})
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data);
            // x.items = response.data;
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    getAll() {
      //   this.bttn = false;
      //   this.mrdata = 1;
      var x = this;
      //   x.Newdata = true;
      axios
        .get("http://127.0.0.1:8000/projectmonthly", {})
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data);
            // x.items = response.data;
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
</style>
