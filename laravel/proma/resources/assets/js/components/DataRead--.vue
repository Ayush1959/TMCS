<template>
  <div>
    <div class="container">
      <!-- {{ selectedDate }} -->
      <span class="glyphicon glyphicon-plus"></span>
      <router-link :to="{name: 'dataScore'}">Add Score</router-link>
      <div class="row">
        <form name="myForm" class="form-group">
          <div class="col-md-5 col-md-offset-3">
            <select v-model="selectedDate" class="form-control sell" id="empl">
              <option v-for="option in items2" :value="option">{{ option }}</option>
            </select>
          </div>
          <div class="col-md-2 col-md-offset-1">
            <button @click.prevent="submitted" @click="dataChange()" class="btn btn-primary">Go</button>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col-md-9 col-md-offset-3">
          <!-- <label for="empl">Employee:</label> -->
          <!-- <h1>Heyy</h1> -->
          <table class="table table-dark wid">
            <thead>
              <tr>
                <!-- <th>Id</th> -->
                <th>Users</th>
                <th>Score</th>
              </tr>
            </thead>
            <tr v-for="item in items" :key="item.id" class="brdr">
              <!-- <td>{{ item.id }}</td> -->
              <td>{{ item.user_name }}</td>
              <td>{{ item.score }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [],
      items2: [],
      selectedDate: null,
      isSubmitted: false
    };
  },
  created: function() {
    var x = this;
    axios
      .get("http://127.0.0.1:8000/projectuserdata", {})
      .then(function(response) {
        if (response.status == 200) {
          console.log(response.data);
          x.items = response.data;
          x.items2 = response.data["dates"];
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
    submitted() {
      this.isSubmitted = true;
    },
    dataChange() {
      // e.preventDefault();
      var x = this;
      axios
        .get(`http://127.0.0.1:8000/projectuserdatedata/${x.selectedDate}`, {
          // testVal: this.testVal,
          // selectedClient: this.selectedClient
        })
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data);
            // x.$modal.hide("hello-world");
            // x.getAllData();
            x.items = response.data;
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
.row {
  margin-top: 15px;
}
.wid {
  width: 75%;
}
table {
  border-collapse: collapse;
  width: 75%;
}

th,
td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

th {
  background-color: #4caf50;
  color: white;
}
</style>
