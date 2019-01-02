<template>
  <div>
    <div v-if="userslist">
      <!-- Displays Users name and Score from DB -->
      <div class="container">
        <span class="glyphicon glyphicon-plus"></span>
        <router-link :to="{name: 'dataScore'}">Add Score</router-link>
        <div class="row">
          <!-- PopUp Start -->
          <modal name="userPopup">
            <div class="container-fluid">
              <div class="col-md-10">
                <div id="app">
                  <graph-bar
                    :width="500"
                    :height="300"
                    :axis-min="0"
                    :axis-max="150"
                    :labels="labels"
                    :values="values"
                  >
                    <note :text="chartName"></note>
                    <!-- <tooltip :names="names" :position="'left'"></tooltip>
                    <legends :names="names" :filter="true"></legends>-->
                  </graph-bar>
                </div>
              </div>
              <div class="col-md-2">
                <button
                  class="btn btn-primary cncl"
                  @click.prevent="submitted"
                  @click="hidePopup()"
                >Cancel</button>
              </div>
            </div>
          </modal>

          <!-- PopUp Ends -->
          <!-- {{ selectedDate }} -->
          <form name="myForm" class="form-group">
            <div class="col-md-5 col-md-offset-3">
              <select
                v-model="selectedDate"
                @blur="$v.selectedDate.$touch()"
                class="form-control sell"
                id="empl"
              >
                <option v-for="option in dateFromDb" :value="option">{{ dates(option) }}</option>
              </select>
              <p
                v-if="$v.selectedDate.$dirty &&  !$v.selectedDate.required"
                class="error-message"
              >Select a Date</p>
            </div>
            <div class="col-md-2 col-md-offset-1">
              <button
                @click.prevent="submitted"
                @click="dataChange()"
                :disabled="$v.$invalid"
                class="btn btn-primary"
              >Go</button>
            </div>
          </form>
        </div>
        <div class="row">
          <div class="col-md-9 col-md-offset-3">
            <table class="table table-bordered wid">
              <thead>
                <tr>
                  <th>Users</th>
                  <th>Score</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in userData" :key="item.id" class="brdr">
                  <td>
                    <button class="btnBrdr" @click="showPopup2(item.user_name)">{{ item.user_name }}</button>
                  </td>
                  <td>
                    <button class="btnBrdr" @click="showPopup(item.user_name)">{{ item.score }}</button>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- PAGINATION -->
            <div>
              <div class="col-md-3">
                <button @click="prevPage" v-if="!!previousUrl">Previous</button>
              </div>
              <div class="col-md-5"></div>
              <div class="col-md-3">
                <button @click="nextPage" v-if="!!nextUrl">Next</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <userdetails
        :labels="labels"
        :values="values"
        :years="years"
        :month="month"
        :functionalityBug="functionalityBug"
        :otherBug="otherBug"
        :totalBug="totalBug"
        :completedTask="completedTask"
        :readytoview="readytoview"
        :trackedHours="trackedHours"
        :chartName="chartName"
        :projectData="projectData"
        :selectedTaskYear="selectedTaskYear"
        :selectedTaskMonth="selectedTaskMonth"
        :selectedUser="selectedUser"
        @close="closeFn"
        @yearChange="yearChangeFn($event)"
        @monthChange="monthChangeFn($event)"
      ></userdetails>
    </div>
  </div>
</template>

<script>
// import bmodal from "./modals";
import userdetails from "./UserDetails.vue";
import {
  required,
  minLength,
  between,
  integer,
  email
} from "vuelidate/lib/validators";
export default {
  components: {
    userdetails
  },
  data() {
    return {
      userData: [],
      dateFromDb: [],
      selectedDate: null,
      selectedUser: null,
      isSubmitted: false,
      pageSize: 3,
      selectedTaskYear: null,
      selectedTaskMonth: null,
      nextUrl: null,
      previousUrl: null,
      month: [],
      userslist: true,
      years: [],
      functionalityBug: null,
      otherBug: null,
      projectData: null,
      totalBug: null,
      completedTask: null,
      readytoview: null,
      trackedHours: null,
      currentmonth: null,
      currentyear: null,
      currentPage: 1,
      date: null,
      chartName: "noChart",
      labels: [],
      values: []
      // names: ["MS", "Apple", "Google"],
    };
  },
  // LOADS DATA WHILE LOADING PAGE
  created: function() {
    this.month[0] = "January";
    this.month[1] = "February";
    this.month[2] = "March";
    this.month[3] = "April";
    this.month[4] = "May";
    this.month[5] = "June";
    this.month[6] = "July";
    this.month[7] = "August";
    this.month[8] = "September";
    this.month[9] = "October";
    this.month[10] = "November";
    this.month[11] = "December";
    this.currentMonth();
    this.currentYear();
    // window.location.origin+/
    var x = this;
    axios
      .get(`${x.$Url}projectuserdata`, {})
      .then(function(response) {
        if (response.status == 200) {
          //console.log(response.data.data);
          x.userData = response.data.data["udatas"];
          x.nextUrl = response.data.next_page_url;
          x.previousUrl = response.data.prev_page_url;
          x.dateFromDb = response.data.data["dates"];
        } else {
          alert("Error");
        }
        //console.log(response);
      })
      .catch(function(error) {
        //console.log(error);
      });
  },
  watch: {
    selectedTaskYear: function() {
      this.getTasks(this.selectedUser);
    },
    selectedTaskMonth: function() {
      this.getTasks(this.selectedUser);
    }
  },
  validations: {
    selectedDate: {
      required
    }
  },
  methods: {
    yearChangeFn(index) {
      this.selectedTaskYear = index;
    },
    monthChangeFn(index) {
      this.selectedTaskMonth = index;
    },
    showPopup2(index) {
      this.labels = [];
      this.values = [];
      this.getUserData(index);
      this.getTasks(index);
      this.userslist = false;
      //   this.$modal.show("userdataPopup");
    },
    closeFn() {
      this.userslist = true;
    },
    showPopup(index) {
      this.labels = [];
      this.values = [];
      this.getUserData(index);
      this.$modal.show("userPopup");
    },
    getTasks(index) {
      this.selectedUser = index;
      var x = this;
      // //console.log(index);
      // return index;
      axios
        .post(`${x.$Url}userPopupTaskdata`, {
          user: this.selectedUser,
          year: this.selectedTaskYear,
          month: this.selectedTaskMonth
        })
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data);
            x.functionalityBug = response.data["funBug"];
            x.otherBug = response.data["othBug"];
            x.totalBug = response.data["totBug"];
            x.completedTask = response.data["compTask"];
            x.readytoview = response.data["readyTask"];
            x.trackedHours = response.data["hours"];
            x.projectData = response.data["projects"];
            // console.log(response.data["projects"]);
          } else {
            alert("Error");
          }
          //console.log(response);
        })
        .catch(function(error) {
          //console.log(error);
        });
    },
    getUserData(index) {
      this.selectedUser = index;
      var x = this;
      // //console.log(index);
      // return index;
      axios
        .get(`${x.$Url}userPopupdata/${x.selectedUser}`, {})
        .then(function(response) {
          if (response.status == 200) {
            //console.log(response.data);
            response.data.forEach(function(element) {
              x.values.push(element.score);
              // x.labels.push(element.date);
              x.labels.push(
                x.month[new Date(element.date).getMonth()] +
                  "-" +
                  new Date(element.date).getFullYear()
              );
              x.chartName = element.user_name + "'s Chart";
              // //console.log(element.score);
            });
          } else {
            alert("Error");
          }
          //console.log(response);
        })
        .catch(function(error) {
          //console.log(error);
        });
    },
    hidePopup() {
      this.$modal.hide("userPopup");
    },
    hideTaskPopup() {
      this.$modal.hide("userdataPopup");
    },
    dates(index) {
      // this.date = new Date(index);

      return (
        this.month[new Date(index).getMonth()] +
        "-" +
        new Date(index).getFullYear()
      );
    },
    currentYear() {
      this.selectedTaskYear = new Date().getFullYear();
      this.years.push(this.selectedTaskYear);
      this.years.push(this.selectedTaskYear - 1);
      // this.years.push(this.selectedTaskYear - 2);
    },
    currentMonth() {
      this.selectedTaskMonth = this.month[new Date().getMonth()];
    },
    nextPage() {
      var x = this;
      axios
        .get(this.nextUrl)
        .then(function(response) {
          if (response.status == 200) {
            //console.log(response.data.data);
            x.userData = response.data.data["udatas"];
            x.nextUrl = response.data.next_page_url;
            x.previousUrl = response.data.prev_page_url;
          } else {
            alert("Error");
          }
          //console.log(response);
        })
        .catch(function(error) {
          //console.log(error);
        });
    },
    prevPage() {
      var x = this;
      axios
        .get(this.previousUrl)
        .then(function(response) {
          if (response.status == 200) {
            //console.log(response.data.data);
            x.userData = response.data.data["udatas"];
            x.nextUrl = response.data.next_page_url;
            x.previousUrl = response.data.prev_page_url;
          } else {
            alert("Error");
          }
          //console.log(response);
        })
        .catch(function(error) {
          //console.log(error);
        });
    },
    submitted() {
      this.isSubmitted = true;
    },
    // New data according to date
    dataChange() {
      var x = this;
      axios
        .get(`${x.$Url}projectuserdatedata/${x.selectedDate}`, {})
        .then(function(response) {
          if (response.status == 200) {
            //console.log(response.data.data);
            x.nextUrl = response.data.next_page_url;
            x.previousUrl = response.data.prev_page_url;
            x.userData = response.data.data["udatas"];
          } else {
            alert("Error");
          }
          //console.log(response);
        })
        .catch(function(error) {
          //console.log(error);
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
.btnBrdr {
  padding: 0;
  border: none;
  background: none;
  color: blue;
}
.cncl {
  margin-top: 210px;
}
.xcncl {
  margin-top: 10px;
  float: right;
}
.popsell {
  display: inline-block;
  width: 20%;
}
.nopad {
  padding: 0;
}
.fonts {
  font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
}
/* .modal-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
}
.modal-container {
  display: inline-block;
  width: auto;
  height: auto;
} */
/* table {
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
} */
</style>
