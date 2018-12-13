<template>
  <div>
    <div class="container">
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
          <table class="table table-dark wid">
            <thead>
              <tr>
                <th>Users</th>
                <th>Score</th>
              </tr>
            </thead>
            <tr v-for="item in items" :key="item.id" class="brdr">
              <td>{{ item.user_name }}</td>
              <td>{{ item.score }}</td>
            </tr>
          </table>
          <!-- <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5" @paginate="fetchPosts()"></pagination> -->
          <div>
            <div class="col-md-3">
              <button @click="prevPage" v-if="!!purl">Previous</button>
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-3">
              <button @click="nextPage" v-if="!!nurl">Next</button>
            </div>
          </div>
          <!-- {{ url }} -->
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
      isSubmitted: false,
      pageSize: 3,
      nurl: null,
      purl: null,
      currentPage: 1,
      next: 2,
      pagination: {
        current_page: 2
      }
    };
  },
  created: function() {
    var x = this;
    axios
      .get("http://127.0.0.1:8000/projectuserdata", {})
      .then(function(response) {
        if (response.status == 200) {
          console.log(response.data.data);
          x.items = response.data.data;
          x.nurl = response.data.next_page_url;
          x.purl = response.data.prev_page_url;
          x.items2 = response.data.data["dates"];
          // console.log(response.data.data["dates"]);
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
    nextPage() {
      var x = this;
      axios
        .get(this.nurl)
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data.data);
            x.items = response.data.data;
            x.nurl = response.data.next_page_url;
            x.purl = response.data.prev_page_url;
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    prevPage() {
      var x = this;
      axios
        .get(this.purl)
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data.data);
            x.items = response.data.data;
            x.nurl = response.data.next_page_url;
            x.purl = response.data.prev_page_url;
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
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
            console.log(response.data.data);
            x.nurl = response.data.next_page_url;
            x.purl = response.data.prev_page_url;
            x.items = response.data.data;
            // x.$modal.hide("hello-world");
            // x.getAllData();
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


<style scoped>
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
