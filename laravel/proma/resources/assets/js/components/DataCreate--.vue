<template>
  <div class="container">
    <br>
    <br>
    <!-- {{ items }} -->
    <br>
    <!-- <button class="btn btn-primary" @click="getData">Get first Data</button> -->
    <button class="btn btn-primary" @click="getAllData">Get Monitored Data</button>
    <button class="btn btn-primary" @click="getAllNonData">Get Non Monitored Data Data</button>

    <!-- <div>
      <b-btn v-b-modal.modal1>Launch demo modal</b-btn>
      <b-modal id="modal1" title="Bootstrap-Vue">
        <p class="my-4">Hello from modal!</p>
      </b-modal>
    </div>-->
    <br>
    <br>
    <!-- <h1>{{ testVal }}</h1> -->
    <br>
    <modal name="hello-world">
      <div class="container-fluid">
        <div class="col-md-10">
          <form>
            <select v-model="selectedClient" class="form-control sele mrgt">
              <option v-for="option in items1" :value="option.id">{{ option.user_name }}</option>
            </select>
            <!-- <select v-model="DeselectedClient">
          <option v-for="option in items2" :value="option.id">{{ option.user_name }}</option>
            </select>-->
            <br>
            <table>
              <thead>
                <tr>
                  <th>User Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tr v-for="option in items2">
                <td>{{ option.user_name }}</td>
                <td>
                  <button
                    class="btn btn-primary btn-xs"
                    @click.prevent="submitted"
                    @click="removedelayperson(option.id)"
                  >Remove</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
        <div class="col-md-2">
          <button
            class="btn btn-primary okk mrgt"
            @click.prevent="submitted"
            @click="delayperson()"
          >Add</button>
          <button class="btn btn-primary cncl" @click.prevent="submitted" @click="hide()">Cancel</button>
        </div>
      </div>

      <!-- <button class="btn btn-primary" @click="removedelayperson()">Remove</button> -->
    </modal>
    <div>
      <div>
        <div id="success_message" class="alert alert-success" v-if="xx == 1">Status Changed</div>
        <table class="table table-dark">
          <thead>
            <tr v-if="mrdata == 1">
              <th>Id</th>
              <th>Project</th>
              <th>Users</th>
              <th>Start Date</th>
              <th>Expected Date</th>
              <th>Actual Close</th>
              <th>Delayed by</th>
              <th>Actions</th>
              <th>Delay Responsive</th>
            </tr>
          </thead>
          <!-- <tr> -->
          <tr v-for="item in items" :key="item.id" v-if="mrdata == 1" class="brdr">
            <td>{{ item.id }}</td>
            <td>{{ item.title }}</td>
            <table class="nobrdr">
              <tr v-for="ite in item.user_names">{{ ite.user_name }}</tr>
            </table>
            <td>{{ item.start_date }}</td>
            <td>{{ item.end_date }}</td>
            <td>{{ item.actual_close }}</td>
            <!-- <td v-for="(ite, value) in item" :key="value">{{ ite }}</td> -->
            <table class="nobrdr">
              <tr v-for="ite in item.delay">{{ ite.user_name }}</tr>
            </table>
            <td>
              <button
                class="btn btn-danger btn-xs mrg"
                @click="doNotMonitor(item.id)"
              >Stop Monitoring</button>
            </td>
            <td>
              <button class="btn btn-primary btn-xs mrg" @click="show(item.id)">Delay</button>
              <!-- <button onclick="myFunction()">Submit</button> -->
            </td>
          </tr>
        </table>
        <table class="table table-dark">
          <thead>
            <tr v-if="mrdata == 2">
              <th>Id</th>
              <th>Project</th>
              <th>Users</th>
              <th>Start Date</th>
              <th>Expected Date</th>
              <th>Actual Close</th>
              <th>Delayed by</th>
              <th>Actions</th>
              <th>Delay Responsive</th>
            </tr>
          </thead>
          <!-- <tr> -->
          <!-- <div id="error_message" class="alert alert-danger"> </> -->
          <tr v-for="item in items" :key="item.id" v-if="mrdata == 2" class="brdr">
            <td>{{ item.id }}</td>
            <td>{{ item.title }}</td>
            <table class="nobrdr">
              <tr v-for="ite in item.user_names">{{ ite.user_name }}</tr>
            </table>
            <td>{{ item.start_date }}</td>
            <td>{{ item.end_date }}</td>
            <td>{{ item.actual_close }}</td>
            <!-- <td v-for="(ite, value) in item" :key="value">{{ ite }}</td> -->
            <table class="nobrdr">
              <tr v-for="ite in item.delay">{{ ite.user_name }}</tr>
            </table>
            <td>
              <button
                class="btn btn-success btn-xs mrg"
                @click="doMonitor(item.id)"
              >Start Monitoring</button>
            </td>
            <td>
              <button class="btn btn-primary btn-xs mrg" @click="show(item.id)">Delay</button>
              <!-- <button onclick="myFunction()">Submit</button> -->
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
// import { EventBus } from "../main";
export default {
  data() {
    return {
      items: [],
      items0: [],
      items1: [],
      items2: [],
      testVal: 0,
      testVal1: null,
      isSubmitted: false,
      bttn: true,
      selectedClient: null,
      DeselectedClient: null,
      mrdata: 1,
      xx: 0,
      selected: null
    };
  },
  created: function() {
    this.bttn = false;
    this.mrdata = 1;
    var x = this;
    x.Newdata = true;
    axios
      .get("http://127.0.0.1:8000/project", {})
      .then(function(response) {
        if (response.status == 200) {
          console.log(response.data);
          x.items = response.data;
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
    removedelayperson(index) {
      this.DeselectedClient = index;
      // alert(this.selectedClient);
      // e.preventDefault();
      // this.testVal1 = e;
      var x = this;
      axios
        .delete(`http://127.0.0.1:8000/projectde/${x.DeselectedClient}`, {
          // testVal: this.testVal,
          // selectedClient: this.selectedClient
        })
        .then(function(response) {
          if (response.status == 204) {
            console.log(response.data);
            x.$modal.hide("hello-world");
            x.getAllData();
            // x.$modal.show("hello-world");
            // x.items1 = response.data;
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    delayperson() {
      // alert(this.selectedClient);
      // e.preventDefault();
      // this.testVal1 = e;
      var x = this;
      axios
        .post(`http://127.0.0.1:8000/projectde/${x.testVal1}`, {
          testVal: this.testVal,
          selectedClient: this.selectedClient
        })
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data);
            x.$modal.hide("hello-world");
            x.getAllData();
            // x.$modal.show("hello-world");
            // x.items1 = response.data;
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    show(index) {
      this.testVal = index;
      var x = this;
      //   x.Newdata = true;
      axios
        .get(`http://127.0.0.1:8000/projectid/${x.testVal}`, {})
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data);
            x.items1 = response.data[1];
            x.items2 = response.data[2];
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

      this.$modal.show("hello-world");
    },
    hide() {
      this.$modal.hide("hello-world");
    },
    looper(index) {
      this.items0 = index;
      console.log(this.items0[1]);
    },
    changeDate(index) {
      console.log(index);
    },
    getAllData() {
      this.bttn = false;
      this.mrdata = 1;
      var x = this;
      x.Newdata = true;
      axios
        .get("http://127.0.0.1:8000/project", {})
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data);
            x.items = response.data;
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    doNotMonitor(index) {
      this.bttn = false;
      this.mrdata = 1;
      //   alert(index);
      this.testVal = index;
      var x = this;
      axios
        .put(`http://127.0.0.1:8000/project/${x.testVal}`, {
          monitoring: 0
        })
        .then(function(response) {
          if (response.status == 200) {
            // alert("Success");
            x.getAllData();
            x.xx = 1;
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
    getAllNonData() {
      // this.bttn = false;
      this.mrdata = 2;
      var x = this;
      x.Newdata = true;
      axios
        .get("http://127.0.0.1:8000/projects", {})
        .then(function(response) {
          if (response.status == 200) {
            x.items = response.data;
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    doMonitor(index) {
      this.bttn = false;
      this.mrdata = 2;
      //   alert(index);
      this.testVal = index;
      var x = this;
      axios
        .put(`http://127.0.0.1:8000/project/${x.testVal}`, {
          monitoring: 1
        })
        .then(function(response) {
          if (response.status == 200) {
            // alert("Success");
            x.getAllNonData();
            x.xx = 1;
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

<style scoped>
.sele {
  width: 80%;
}
.mrgt {
  margin-top: 10px;
}
.brdr {
  border-bottom: #42b983 2px solid;
}
.nobrdr {
  border: transparent;
  margin: 5px;
}
.ull {
  margin-top: 20px;
}
.cncl {
  margin-top: 210px;
}
table {
  border: 2px solid #42b983;
  border-radius: 3px;
  background-color: #fff;
}

th {
  background-color: #42b983;
  color: rgba(255, 255, 255, 0.66);
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

td {
  background-color: #f9f9f9;
  border: #42b983 1px solid;
}

th,
td {
  min-width: 120px;
  padding: 10px 20px;
}

th.active {
  color: #fff;
}

th.active .arrow {
  opacity: 1;
}

.arrow {
  display: inline-block;
  vertical-align: middle;
  width: 0;
  height: 0;
  margin-left: 5px;
  opacity: 0.66;
}

.arrow.asc {
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
  border-bottom: 4px solid #fff;
}
</style>
