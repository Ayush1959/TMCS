<template>
  <div class="container">
    <br>
    <!-- <br> -->
    <!-- Template Starts -->
    <div>
      <div>
        <transition name="fade">
          <div>
            <div>
              <div class="col-md-3">
                <Dropdown
                  :options="usernameData"
                  :disabled="false"
                  :value="selectedUsername"
                  v-on:selected="validateSelection"
                  v-on:filter="getDropdownValues"
                  placeholder="UserName"
                ></Dropdown>
              </div>
              <div class="col-md-3">
                <datepicker v-model="startDate" name="startDate" placeholder="Start Date"></datepicker>
              </div>
              <div class="col-md-3">
                <datepicker v-model="endDate" name="endDate" placeholder="End Date"></datepicker>
              </div>
              <div class="col-md-2">
                <button class="btn btn-primary" @click="clearAll()">
                  <i class="glyphicon glyphicon-remove"></i>
                </button>
                <button class="btn btn-primary" @click="getlogs()">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
            <div>
              <br>
              <br>
              <table class="table table-bordered table-responsive">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>UserName</th>
                    <th>Date</th>
                    <th>comments</th>
                    <th>Commented By</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item,key in logData" :key="item.id" class="brdr">
                    <td>{{ fromNumbers+key }}</td>
                    <!-- <td>{{ item.id }}</td> -->
                    <td>{{ item.user_name }}</td>
                    <td>{{ item.start_date }}</td>
                    <td v-html="item.comments"></td>
                    <td>{{ item.comment_by }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
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
        @PageNo="selectPageNo = $event , getlogs()"
      ></pagenation>
      <!-- Template Ends -->
    </div>
  </div>
</template>

<script>
import pagenation from "./logPagenation";
import Dropdown from "./Dropdwn";
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
    pagenation,
    Dropdown
  },
  data() {
    return {
      username: null,
      dateStart: null,
      dateEnd: null,
      logData: [],
      displaylist: [],
      usernameData: [],
      lastPage: null,
      total: null,
      totalElements: null,
      current_page: null,
      startDate: null,
      endDate: null,
      startDateF: null,
      endDateF: null,
      nextUrl: null,
      selectedUsername: null,
      currentUrl: null,
      previousUrl: null,
      fromNumbers: null,
      selectPageNo: 10,
      url: null
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
    this.getlogs();
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
    validateSelection(selection) {
      this.selectedUsername = selection.name;
    },
    getDropdownValues(keyword) {
      console.log(keyword);
      this.selectedUsername = keyword;
    },
    clearAll() {
      this.startDateF = null;
      this.startDate = null;
      this.endDate = null;
      this.endDateF = null;
      this.selected = null;
      this.selectedUsername = null;
    },
    getlogs() {
      if (!!this.startDate) {
        var date = new Date(this.startDate);
        this.startDateF = date.toLocaleDateString("zh-Hans-CN");
      }
      if (!!this.endDate) {
        var date = new Date(this.endDate);
        date.setDate(date.getDate() + 1);
        // console.log(date.setDate(date.getDate() + 1));
        this.endDateF = date.toLocaleDateString("zh-Hans-CN");
        console.log(this.endDateF);
      }
      var x = this;
      axios
        .post(`${x.$Url}getLogData`, {
          username: this.selectedUsername,
          dateStart: this.startDateF,
          dateEnd: this.endDateF,
          pagenate: this.selectPageNo
        })
        .then(function(response) {
          console.log(response);
          if (response.status == 206) {
            console.log(response.data);
            x.logData = [];
            // x.displayTable = 0;
            x.displaylist = [];
            // x.searchQuery = null;
            // x.searchError = 1;
          } else if (response.status == 200) {
            x.logData = response.data["data"];
            x.usernameData = response.data["userData"];
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
            x.displayPage();
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    newUrl(index) {
      // this.show = false;
      this.displayPage();
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
            username: this.selectedUsername,
            dateStart: this.startDateF,
            dateEnd: this.endDateF,
            pagenate: this.selectPageNo
          })
          .then(function(response) {
            x.show = true;
            if (response.status == 206) {
              console.log(response.data);
              // x.searchQuery = null;
              // x.searchError = 1;
              // setTimeout(function() {
              //   x.searchError = 0;
              // }, 3000);
            } else if (response.status == 200) {
              //console.log(response);
              // x.searchQuery = null;
              x.logData = response.data["data"];
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
    displayPage() {
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
          // this.displaylist.push("e");
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