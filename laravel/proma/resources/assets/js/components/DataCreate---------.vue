<template>
  <div class="container">
    <br>
    <button
      class="btn btn-primary"
      @click="searchNonMonitored(1)"
      :class="{'active':(monitoring == 1)}"
    >Get Monitored Data</button>
    <button
      class="btn btn-primary"
      @click="searchNonMonitored(0)"
      :class="{'active':(monitoring == 0)}"
    >Get Non Monitored Data Data</button>
    <br>
    <!-- <button @click="show = !show">Show</button> -->
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
        <div class="loader" v-if="!show"></div>
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
              @click="searchNonMonitored(monitoring)"
            >
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
        <transition name="fade">
          <div v-if="show">
            <div v-if="displayTable == 1">
              <!-- <div
                id="error_message"
                class="alert alert-danger"
                v-if="searchError == 1"
              >Project Not Found</div>-->
              <!-- SEARCH BUTTON -->
              <!-- <div class="row">
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
                    @click="searchNonMonitored(monitoring)"
                  >
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>-->
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
          </div>
        </transition>
        <div id="error_message" class="alert alert-danger" v-if="searchError == 1">Project Not Found</div>
        <transition name="fade">
          <div v-if="displayTable == 2">
            <!-- <div
              id="error_message"
              class="alert alert-danger"
              v-if="searchError == 1"
            >Project Not Found</div>-->
            <!-- SEARCH BUTTON -->
            <!-- <div class="row">
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
                  @click="searchNonMonitored(monitoring)"
                >
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>-->
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
        </transition>
      </div>
      <!-- PAGINATION -->
    </div>
    <div class="col-md-offset-2">
      <pagenation
        v-if="displaylist.length > 0"
        :lastPage.sync="lastPage"
        :total.sync="total"
        :displaylist.sync="displaylist"
        :totalElements.sync="totalElements"
        :current_page.sync="current_page"
        @newUrl="newUrl($event)"
        @PageNo="selectPageNo = $event , searchNonMonitored(monitoring)"
      ></pagenation>
      <!-- </div>
    <div class="col-md-1">
      <form>
        <select v-model="selectPageNo" class="form-control" id="noPage">
          <option v-for="option in totalElements" :value="option">{{ option }}</option>
        </select>
      </form>-->
    </div>
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
      show: true,
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
      lastPage: 1,
      url: null,
      currentUrl: null,
      current_page: null,
      displaylist: [],
      previousUrl: null,
      addToDelayTable: 0,
      total: 2,
      selectPageNo: 3,
      totalElements: 11,
      pageUrl: null,
      userInDelayTable: 0,
      removeFromDelayTable: 0
    };
  },
  watch: {
    current_page: function() {
      this.displayPage();
    },
    selectPageNo: function() {
      this.displayPage();
    }
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
    displayPage(index) {
      this.displaylist = [];

      if (this.total == 1) {
        this.displaylist.push(this.current_page);
      } else {
        if (this.current_page == this.lastPage && this.lastPage == 1) {
          this.displaylist.push(this.current_page);
        } else if (this.current_page == this.lastPage && this.lastPage == 2) {
          this.displaylist.push(this.current_page - 1);
          this.displaylist.push(this.current_page);
        } else if (this.current_page == this.lastPage && this.lastPage == 3) {
          this.displaylist.push(this.current_page - 2);
          this.displaylist.push(this.current_page - 1);
          this.displaylist.push(this.current_page);
        } else if (
          this.lastPage - this.current_page == 1 &&
          this.current_page == 1
        ) {
          this.displaylist.push(this.current_page);
          this.displaylist.push(this.current_page + 1);
        } else if (this.lastPage - this.current_page == 1) {
          this.displaylist.push(this.current_page - 1);
          this.displaylist.push(this.current_page);
          this.displaylist.push(this.current_page + 1);
        } else if (this.current_page < this.lastPage) {
          if (this.current_page == 1) {
            this.displaylist.push(this.current_page);
            this.displaylist.push(this.current_page + 1);
            this.displaylist.push(this.current_page + 2);
          } else {
            this.displaylist.push(this.current_page - 1);
            this.displaylist.push(this.current_page);
            this.displaylist.push(this.current_page + 1);
          }
        } else {
          this.displaylist.push(this.current_page - 2);
          this.displaylist.push(this.current_page - 1);
          this.displaylist.push(this.current_page);
        }
      }

      // if (this.total == 1) {
      //   this.displaylist.push(this.current_page);
      // } else {
      //   if (this.current_page < this.lastPage) {
      //     if (this.current_page == 1) {
      //       this.displaylist.push(this.current_page);
      //       this.displaylist.push(this.current_page + 1);
      //       this.displaylist.push(this.current_page + 2);
      //     } else {
      //       this.displaylist.push(this.current_page - 1);
      //       this.displaylist.push(this.current_page);
      //       this.displaylist.push(this.current_page + 1);
      //     }
      //   } else {
      //     this.displaylist.push(this.current_page - 2);
      //     this.displaylist.push(this.current_page - 1);
      //     this.displaylist.push(this.current_page);
      //   }
      // }
    },
    newUrl(index) {
      this.show = false;
      this.displayPage(index);
      if (!!this.nextUrl) {
        this.url = this.nextUrl;
      } else {
        this.url = this.previousUrl;
      }
      if (this.url) {
        if (this.current_page >= 9) {
          this.pageUrl = this.url.slice(0, -2) + index;
        } else if (this.current_page >= 99) {
          this.pageUrl = this.url.slice(0, -3) + index;
        } else {
          this.pageUrl = this.url.slice(0, -1) + index;
        }
        var x = this;
        axios
          .post(this.pageUrl, {
            title: this.searchQuery,
            monitor: this.monitoring,
            pagenate: this.selectPageNo
          })
          .then(function(response) {
            x.show = true;
            if (response.status == 206) {
              //console.log(response.data);
              x.searchQuery = null;
              x.searchError = 1;
              setTimeout(function() {
                x.searchError = 0;
              }, 3000);
            } else if (response.status == 200) {
              //console.log(response);
              x.searchQuery = null;
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
          })
          .catch(function(error) {
            //console.log(error);
          });
      }
    },
    searchNonMonitored(index) {
      this.show = false;
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
          monitor: this.monitoring,
          pagenate: this.selectPageNo
        })
        .then(function(response) {
          x.show = true;
          if (response.status == 206) {
            //console.log(response.data);
            x.projectData = [];
            x.displayTable = 0;
            x.displaylist = [];
            x.searchQuery = null;
            x.searchError = 1;
            // x.displayPage(1);
            // setTimeout(function() {
            //   x.searchError = 0;
            // }, 3000);
          } else if (response.status == 200) {
            //console.log(response);
            x.searchError = 0;
            x.searchQuery = null;
            x.projectData = response.data["data"];
            x.nextUrl = response.data["pageData"].next_page_url;
            x.lastPage = response.data["pageData"].last_page;
            x.current_page = response.data["pageData"].current_page;
            if (response.data["pageData"].total < 4) {
              x.totalElements = response.data["pageData"].total;
              x.total = 1;
            } else if (response.data["pageData"].last_page > 1) {
              x.currentUrl =
                response.data["pageData"].next_page_url.slice(0, -1) +
                x.current_page;
              x.totalElements = response.data["pageData"].total;
              x.total = 2;
            }
            x.previousUrl = response.data["pageData"].prev_page_url;
            x.fromNumbers = response.data["pageData"].from;
            x.displayPage(1);
          } else {
            alert("Error");
          }
        })
        .catch(function(error) {
          //console.log(error);
        });
    },
    reloadPage() {
      if (this.total == 1) {
        var x = this;
        axios
          .post(`${x.$Url}projectSearchNonMonitor`, {
            title: this.previousSearchQuery,
            monitor: this.monitoring,
            pagenate: this.selectPageNo
          })
          .then(function(response) {
            if (response.status == 206) {
              //console.log(response.data);
              x.searchQuery = null;
              x.searchError = 1;
              setTimeout(function() {
                x.searchError = 0;
              }, 3000);
            } else if (response.status == 200) {
              //console.log(response);
              x.searchQuery = null;
              x.projectData = response.data["data"];
            } else {
              alert("Error");
            }
          })
          .catch(function(error) {
            //console.log(error);
          });
      } else {
        var x = this;
        axios
          .post(this.currentUrl, {
            title: this.searchQuery,
            monitor: this.monitoring,
            pagenate: this.selectPageNo
          })
          .then(function(response) {
            if (response.status == 206) {
              //console.log(response.data);
              x.searchQuery = null;
              x.searchError = 1;
              setTimeout(function() {
                x.searchError = 0;
              }, 3000);
            } else if (response.status == 200) {
              //console.log(response);
              x.searchQuery = null;
              // //console.log(response);
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
          })
          .catch(function(error) {
            //console.log(error);
          });
      }
    },
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
            //console.log(response.data);
            x.showPopup(x.selectedProjectId);
            x.removeFromDelayTable = 1;
            setTimeout(function() {
              x.removeFromDelayTable = 0;
            }, 3000);
            x.reloadPage();
          } else {
            alert("Error");
          }
          //console.log(response);
        })
        .catch(function(error) {
          //console.log(error);
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
            //console.log(response.data);
            x.showPopup(x.selectedProjectId);
            x.addToDelayTable = 1;
            setTimeout(function() {
              x.addToDelayTable = 0;
            }, 3000);
            x.reloadPage();
            // x.nextPage();
            // x.prevPage();
            // x.searchNonMonitored(x.monitoring);
          } else {
            alert("Error");
          }
          //console.log(response);
        })
        .catch(function(error) {
          //console.log(error);
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
            //console.log(response.data);
            x.projectMembers = response.data[1];
            x.delayedUsers = response.data[2];
          } else {
            alert("Error");
          }
          //console.log(response);
        })
        .catch(function(error) {
          //console.log(error);
        });

      this.$modal.show("delayPopup");
    },
    //Hide Popup
    hidePopup() {
      this.$modal.hide("delayPopup");
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
            // x.searchNonMonitored(1);
            x.reloadPage();
            x.monitorAlert = 1;
            setTimeout(function() {
              x.monitorAlert = 0;
            }, 3000);
          } else {
            alert("Error");
          }
          //console.log(response);
        })
        .catch(function(error) {
          //console.log(error);
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
            // x.searchNonMonitored(0);
            x.reloadPage();
            x.monitorAlert = 1;
            setTimeout(function() {
              x.monitorAlert = 0;
            }, 3000);
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
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.8s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
.sele {
  width: 80%;
}

.mrgt {
  margin-top: 10px;
}

.brdr {
  border-bottom: #dadada 1px solid;
}
.active {
  background-color: forestgreen !important;
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
.loader {
  border: 10px solid #f3f3f3;
  border-radius: 50%;
  border-top: 10px solid #cef375;
  width: 90px;
  position: absolute;
  margin-left: 35%;
  margin-top: 20%;
  height: 90px;
  -webkit-animation: spin 3s linear infinite; /* Safari */
  animation: spin 3s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
  }
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>