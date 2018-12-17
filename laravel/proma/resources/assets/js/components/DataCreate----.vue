<template>
  <div class="container">
    <br>
    <button class="btn btn-primary" @click="getMonitoredData">Get Monitored Data</button>
    <button class="btn btn-primary" @click="getNonMonitoredData">Get Non Monitored Data Data</button>
    <br>
    <br>
    <br>
    <!-- PopUp Start -->
    <modal name="delayPopup">
      <div class="container-fluid">
        <div class="col-md-10">
          <form>
            <select
              v-model="selectedClient"
              class="form-control sele mrgt"
              @blur="$v.selectedClient.$touch()"
            >
              <option v-for="option in projectMembers" :value="option.id">{{ option.user_name }}</option>
            </select>
            <p
              v-if="$v.selectedClient.$dirty &&  !$v.selectedClient.required"
              class="error-message"
            >Select a user</p>
            <br>
            <div
              id="success_message"
              class="alert alert-danger"
              v-if="userInDelayTable == 1"
            >Already in Delay Table</div>
            <div
              id="success_message"
              class="alert alert-success"
              v-if="addToDelayTable == 1"
            >Added to delay table</div>
            <div id="success_message" class="alert alert-danger" v-if="removeFromDelayTable == 1">
              Removed from Delay
              table
            </div>
            <div>
              <div class="col-md-7 col-md-offset-1">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>User Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tr v-for="option in delayedUsers">
                    <td>{{ option.user_name }}</td>
                    <td>
                      <button
                        class="btn btn-primary btn-xs"
                        @click.prevent="submitted"
                        @click="removeUserFromDelayTable(option.id)"
                      >Remove</button>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-2">
          <button
            class="btn btn-primary okk mrgt"
            @click.prevent="submitted"
            @click="addUserToDelayTable()"
            :disabled="$v.selectedClient.$invalid"
          >Add</button>
          <button
            class="btn btn-primary cncl"
            @click.prevent="submitted"
            @click="hidePopup()"
          >Cancel</button>
        </div>
      </div>
    </modal>

    <!-- PopUp Ends -->
    <!-- Template Starts -->
    <div>
      <div>
        <div
          id="success_message"
          class="alert alert-success"
          v-if="monitorAlert == 1"
        >Status Changed</div>

        <!-- Table for monitored Data -->
        <table class="table table-bordered table-responsive">
          <thead>
            <tr v-if="displayTable == 1">
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
          <tbody>
            <tr v-for="item in projectData" :key="item.id" v-if="displayTable == 1" class="brdr">
              <td>{{ item.id }}</td>
              <td>{{ item.title }}</td>
              <table class="nobrdr">
                <tr v-for="ite in item.user_names">{{ ite.user_name }}</tr>
              </table>
              <td>{{ item.start_date }}</td>
              <td>{{ item.end_date }}</td>
              <td>{{ item.actual_close }}</td>
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
                <button class="btn btn-primary btn-xs mrg" @click="showPopup(item.id)">Delay</button>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Table For Non Monitored Data -->
        <table class="table table-bordered table-responsive">
          <thead>
            <tr v-if="displayTable == 2">
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
          <tbody>
            <tr v-for="item in projectData" :key="item.id" v-if="displayTable == 2" class="brdr">
              <td>{{ item.id }}</td>
              <td>{{ item.title }}</td>
              <table class="nobrdr">
                <tr v-for="ite in item.user_names">{{ ite.user_name }}</tr>
              </table>
              <td>{{ item.start_date }}</td>
              <td>{{ item.end_date }}</td>
              <td>{{ item.actual_close }}</td>
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
                <button class="btn btn-primary btn-xs mrg" @click="showPopup(item.id)">Delay</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Template Ends -->
  </div>
</template>

<script>
import {
  required,
  minLength,
  between,
  integer,
  email
} from "vuelidate/lib/validators";
// import { EventBus } from "../main";
export default {
  data() {
    return {
      projectData: [],
      projectMembers: [],
      delayedUsers: [],
      selectedProjectId: 0,
      isSubmitted: false,
      selectedClient: null,
      DeselectedClient: null,
      displayTable: 1,
      monitorAlert: 0,
      addToDelayTable: 0,
      userInDelayTable: 0,
      removeFromDelayTable: 0
    };
  },
  // Get data on the page while loading
  created: function() {
    this.displayTable = 1;
    var x = this;
    x.Newdata = true;
    axios
      .get(`${x.$Url}project`, {})
      .then(function(response) {
        if (response.status == 200) {
          console.log(response.data);
          x.projectData = response.data;
        } else {
          alert("Error");
        }
        console.log(response);
      })
      .catch(function(error) {
        console.log(error);
      });
  },
  validations: {
    selectedClient: {
      required
    }
  },
  methods: {
    status(validation) {
      return {
        error: validation.$error,
        dirty: validation.$dirty
      };
    },
    submitted() {
      this.isSubmitted = true;
    },
    // To Remove Users from the delayresponsible table
    removeUserFromDelayTable(index) {
      this.DeselectedClient = index;
      var x = this;
      axios
        .delete(`${x.$Url}projectde/${x.DeselectedClient}`, {})
        .then(function(response) {
          if (response.status == 204) {
            console.log(response.data);
            x.showPopup(x.selectedProjectId);
            x.removeFromDelayTable = 1;
            setTimeout(function() {
              x.removeFromDelayTable = 0;
            }, 3000);
            x.getMonitoredData();
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    //  Add Users into the delayresponsible table
    addUserToDelayTable() {
      var x = this;
      axios
        .post(`${x.$Url}projectdelay`, {
          selectedProjectId: this.selectedProjectId,
          selectedClient: this.selectedClient
        })
        .then(function(response) {
          if (response.status == 208) {
            x.userInDelayTable = 1;
            setTimeout(function() {
              x.userInDelayTable = 0;
            }, 3000);
          } else if (response.status == 200) {
            console.log(response.data);
            x.showPopup(x.selectedProjectId);
            x.addToDelayTable = 1;
            setTimeout(function() {
              x.addToDelayTable = 0;
            }, 3000);
            x.getMonitoredData();
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    //Shows Popup
    showPopup(index) {
      this.selectedProjectId = index;
      var x = this;
      axios
        .get(`${x.$Url}projectid/${x.selectedProjectId}`, {})
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data);
            x.projectMembers = response.data[1];
            x.delayedUsers = response.data[2];
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });

      this.$modal.show("delayPopup");
    },
    //Hide Popup
    hidePopup() {
      this.$modal.hide("delayPopup");
    },
    //Get all monitored projects
    getMonitoredData() {
      this.displayTable = 1;
      var x = this;
      x.Newdata = true;
      axios
        .get(`${x.$Url}project`, {})
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data);
            x.projectData = response.data;
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    //Stop monitoring a project
    doNotMonitor(index) {
      this.displayTable = 1;
      this.selectedProjectId = index;
      var x = this;
      axios
        .put(`${x.$Url}project/${x.selectedProjectId}`, {
          monitoring: 0
        })
        .then(function(response) {
          if (response.status == 200) {
            x.getMonitoredData();
            x.monitorAlert = 1;
            setTimeout(function() {
              x.monitorAlert = 0;
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
    //get all projects which are not monitored
    getNonMonitoredData() {
      this.displayTable = 2;
      var x = this;
      x.Newdata = true;
      axios
        .get(`${x.$Url}projects`, {})
        .then(function(response) {
          if (response.status == 200) {
            x.projectData = response.data;
            // x.nurl = response.data.next_page_url;
            // x.purl = response.data.prev_page_url;
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    //Start monitoring specific project
    doMonitor(index) {
      this.displayTable = 2;
      this.selectedProjectId = index;
      var x = this;
      axios
        .put(`${x.$Url}project/${x.selectedProjectId}`, {
          monitoring: 1
        })
        .then(function(response) {
          if (response.status == 200) {
            x.getNonMonitoredData();
            x.monitorAlert = 1;
            setTimeout(function() {
              x.monitorAlert = 0;
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

.mrg {
  /* margin-top: 50%; */
}

.brdr {
  border-bottom: #dadada 1px solid;
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

/* table {
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
  min-width: 130px;
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
} */
</style>