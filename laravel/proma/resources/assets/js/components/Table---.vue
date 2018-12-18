<template>
  <div class="container">
    <!-- <router-link :to="{ path: getcomponent() }"></router-link> -->
    <br>
    <!-- {{ displayTable }} -->
    <button class="btn btn-primary" @click="searchNonMonitored(1)">Get Monitored Data</button>
    <button class="btn btn-primary" @click="searchNonMonitored(0)">Get Non Monitored Data Data</button>
    <!-- cp:{{ current_page }}
    <br>
    {{ nextUrl }}
    <br>-->
    <!-- {{ fromNumbers }} -->
    <!-- cc:{{ currentUrl }} -->
    <br>
    <!-- {{ previousUrl }} -->
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

        <div v-if="displayTable == 1">
          <div
            id="error_message"
            class="alert alert-danger"
            v-if="searchError == 1"
          >Project Not Found</div>
          <!-- SEARCH BUTTON -->
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <form action class="search-form">
                <div class="form-group col-md-10">
                  <label for="search" class="sr-only">Search</label>
                  <input
                    type="text"
                    class="form-control"
                    name="search"
                    id="search"
                    @blur="$v.searchQuery.$touch()"
                    v-model="searchQuery"
                    placeholder="search"
                  >
                </div>
              </form>
              <button
                class="btn btn-primary"
                :disabled="$v.searchQuery.$invalid"
                @click="searchNonMonitored(1)"
              >
                <!-- <i class="fa fa-search"></i> -->
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
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
              <tr
                v-for="item,key in projectData"
                :key="item.id"
                v-if="displayTable == 1"
                class="brdr"
              >
                <!-- <td>{{ inc(fromNumbers) }}</td> -->
                <!-- inc() -->
                <td>{{ fromNumbers+key }}</td>
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
                    class="btn btn-danger btn-xs marg"
                    @click="doNotMonitor(item.id)"
                  >Stop Monitoring</button>
                </td>
                <td>
                  <button class="btn btn-primary btn-xs marg" @click="showPopup(item.id)">Delay</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div v-if="displayTable == 2">
          <div
            id="error_message"
            class="alert alert-danger"
            v-if="searchError == 1"
          >Project Not Found</div>
          <!-- SEARCH BUTTON -->
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <form action class="search-form">
                <div class="form-group col-md-10">
                  <label for="search" class="sr-only">Search</label>
                  <input
                    type="text"
                    class="form-control"
                    name="search"
                    id="search"
                    @blur="$v.searchQuery.$touch()"
                    v-model="searchQuery"
                    placeholder="search"
                  >
                </div>
              </form>
              <button
                class="btn btn-primary"
                :disabled="$v.searchQuery.$invalid"
                @click="searchNonMonitored(0)"
              >
                <!-- <i class="fa fa-search"></i> -->
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
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
              <tr
                v-for="item,key in projectData"
                :key="item.id"
                v-if="displayTable == 2"
                class="brdr"
              >
                <td>{{ fromNumbers+key }}</td>
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
                    class="btn btn-success btn-xs marg"
                    @click="doMonitor(item.id)"
                  >Start Monitoring</button>
                </td>
                <td>
                  <button class="btn btn-primary btn-xs marg" @click="showPopup(item.id)">Delay</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- PAGINATION -->
      <div>
        <div class="col-md-1">
          <button
            class="btn btn-default someclass"
            @click="newUrl(current_page - 1)"
            v-if="!!previousUrl"
          >Previous</button>
        </div>
        <div class="col-md-1">
          <button class="btn btn-default someclass" @click="newUrl(1)">First</button>
        </div>
        <div class="col-md-7 col-md-offset-1">
          <div v-for="pages in lastPage" v-if class="btn-group">
            <!-- <div class="col-md-1"> -->
            <button class="btn btn-default someclass" @click="newUrl(pages)">{{ pages }}</button>
            <!-- </div> -->
          </div>
          <!-- <li v-for="index in 10" :key="index"><button>{{ index }}</button></li> -->
        </div>
        <div class="col-md-1">
          <button class="btn btn-default someclass" @click="newUrl(lastPage)">Last</button>
        </div>
        <div class="col-md-1">
          <button
            class="btn btn-default someclass"
            @click="newUrl(current_page + 1)"
            v-if="!!nextUrl"
          >Next</button>
        </div>
      </div>
    </div>
    <!-- <pagenation
      @nextPage="nextPage()"
      @previousPage="prevPage()"
      :lastPage="lastPage"
      @newUrl="newUrl($event)"
    ></pagenation>-->
    <!-- {{ lastPage }} -->
    <!-- Template Ends -->
  </div>
</template>

<script>
import pagenation from "./Pagenation";
import {
  required,
  minLength,
  between,
  integer,
  email
} from "vuelidate/lib/validators";
// import { EventBus } from "../main";
export default {
  components: {
    pagenation
  },
  data() {
    return {
      projectData: [],
      projectMembers: [],
      delayedUsers: [],
      selectedProjectId: 0,
      isSubmitted: false,
      displayNumber: 0,
      addNumber: 0,
      selectedClient: null,
      DeselectedClient: null,
      displayTable: 0,
      searchQuery: null,
      previousSearchQuery: null,
      monitorAlert: 0,
      fromNumbers: null,
      monitoring: null,
      searchError: 0,
      nextUrl: null,
      lastPage: null,
      url: null,
      currentUrl: null,
      current_page: null,
      previousUrl: null,
      addToDelayTable: 0,
      total: 2,
      pageUrl: null,
      userInDelayTable: 0,
      removeFromDelayTable: 0
    };
  },
  // Get data on the page while loading
  created: function() {
    this.searchNonMonitored(1);
  },
  validations: {
    selectedClient: {
      required
    },
    searchQuery: {
      required
    }
  },
  methods: {
    firstPage() {},
    finalPage() {},
    newUrl(index) {
      if (!!this.nextUrl) {
        this.url = this.nextUrl;
      } else {
        this.url = this.previousUrl;
      }
      if (this.url) {
        // alert(typeof this.url);
        if (this.current_page == 9) {
          this.pageUrl = this.url.slice(0, -2) + index;
        } else {
          this.pageUrl = this.url.slice(0, -1) + index;
        }
        var x = this;
        axios
          .post(this.pageUrl, {
            title: this.searchQuery,
            monitor: this.monitoring
          })
          .then(function(response) {
            if (response.status == 206) {
              console.log(response.data);
              x.searchQuery = null;
              //   x.current_page = response.data["pageData"].current_page;
              x.searchError = 1;
              setTimeout(function() {
                x.searchError = 0;
              }, 3000);
            } else if (response.status == 200) {
              console.log(response);
              x.searchQuery = null;
              // console.log(response);
              x.projectData = response.data["data"];
              x.nextUrl = response.data["pageData"].next_page_url;
              x.current_page = response.data["pageData"].current_page;
              if (!!x.nextUrl) {
                x.currentUrl =
                  response.data["pageData"].next_page_url.slice(0, -1) +
                  x.current_page;
              } else {
                x.currentUrl =
                  response.data["pageData"].prev_page_url.slice(0, -1) +
                  x.current_page;
              }
              x.previousUrl = response.data["pageData"].prev_page_url;
              x.fromNumbers = response.data["pageData"].from;
            } else {
              alert("Error");
            }
            // console.log(response);
          })
          .catch(function(error) {
            console.log(error);
          });
      }
    },
    searchNonMonitored(index) {
      // this.id = 0;
      this.previousSearchQuery = this.searchQuery;
      this.monitoring = index;
      if (this.monitoring == 1) {
        this.displayTable = 1;
      } else {
        this.displayTable = 2;
      }
      var x = this;
      axios
        .post(`${x.$Url}projectSearchNonMonitor`, {
          title: this.searchQuery,
          monitor: this.monitoring
        })
        .then(function(response) {
          if (response.status == 206) {
            console.log(response.data);
            x.searchQuery = null;
            x.searchError = 1;
            setTimeout(function() {
              x.searchError = 0;
            }, 3000);
          } else if (response.status == 200) {
            console.log(response);
            x.searchQuery = null;
            // console.log(response);
            x.projectData = response.data["data"];
            x.nextUrl = response.data["pageData"].next_page_url;
            x.lastPage = response.data["pageData"].last_page;
            x.current_page = response.data["pageData"].current_page;
            if (response.data["pageData"].total == 1) {
              x.total = 1;
            } else {
              // x.Pages = response.data["pageData"].total;
              x.currentUrl =
                response.data["pageData"].next_page_url.slice(0, -1) +
                x.current_page;
            }
            // str = str.slice(0, -1);
            x.previousUrl = response.data["pageData"].prev_page_url;
            x.fromNumbers = response.data["pageData"].from;
          } else {
            alert("Error");
          }
          // console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    reloadPage() {
      if (this.total == 1) {
        var x = this;
        axios
          .post(`${x.$Url}projectSearchNonMonitor`, {
            title: this.previousSearchQuery,
            monitor: this.monitoring
          })
          .then(function(response) {
            if (response.status == 206) {
              console.log(response.data);
              x.searchQuery = null;
              x.searchError = 1;
              setTimeout(function() {
                x.searchError = 0;
              }, 3000);
            } else if (response.status == 200) {
              console.log(response);
              x.searchQuery = null;
              x.projectData = response.data["data"];
            } else {
              alert("Error");
            }
          })
          .catch(function(error) {
            console.log(error);
          });
      } else {
        var x = this;
        axios
          .post(this.currentUrl, {
            title: this.searchQuery,
            monitor: this.monitoring
          })
          .then(function(response) {
            if (response.status == 206) {
              console.log(response.data);
              x.searchQuery = null;
              x.searchError = 1;
              setTimeout(function() {
                x.searchError = 0;
              }, 3000);
            } else if (response.status == 200) {
              console.log(response);
              x.searchQuery = null;
              // console.log(response);
              x.projectData = response.data["data"];
              x.nextUrl = response.data["pageData"].next_page_url;
              x.current_page = response.data["pageData"].current_page;
              if (!!x.nextUrl) {
                x.currentUrl =
                  response.data["pageData"].next_page_url.slice(0, -1) +
                  x.current_page;
              } else {
                x.currentUrl =
                  response.data["pageData"].prev_page_url.slice(0, -1) +
                  x.current_page;
              }
              x.previousUrl = response.data["pageData"].prev_page_url;
              x.fromNumbers = response.data["pageData"].from;
            } else {
              alert("Error");
            }
            // console.log(response);
          })
          .catch(function(error) {
            console.log(error);
          });
      }
    },
    nextPage() {},
    prevPage() {},
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
    removeUserFromDelayTable(index) {},
    //  Add Users into the delayresponsible table
    addUserToDelayTable() {},
    //Shows Popup
    showPopup(index) {},
    //Hide Popup
    hidePopup() {},
    //Stop monitoring a project
    doNotMonitor(index) {},
    //Start monitoring specific project
    doMonitor(index) {}
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
.someclass {
  color: #337ab7;
}
.someclass:hover {
  color: #23527c;
}
</style>