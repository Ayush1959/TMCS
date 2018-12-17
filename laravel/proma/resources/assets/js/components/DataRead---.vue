<template>
  <div>
    <!-- Displays Users name and Score from DB -->
    <div class="container">
      <span class="glyphicon glyphicon-plus"></span>
      <router-link :to="{name: 'dataScore'}">Add Score</router-link>
      <div class="row">
        <form name="myForm" class="form-group">
          <div class="col-md-5 col-md-offset-3">
            <select
              v-model="selectedDate"
              @blur="$v.selectedDate.$touch()"
              class="form-control sell"
              id="empl"
            >
              <option v-for="option in dateFromDb" :value="option">{{ option }}</option>
            </select>
            <p
              v-if="$v.selectedDate.$dirty &&  !$v.selectedDate.required"
              class="error-message"
            >Select a user</p>
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
                <td>{{ item.user_name }}</td>
                <td>{{ item.score }}</td>
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
</template>

<script>
import {
  required,
  minLength,
  between,
  integer,
  email
} from "vuelidate/lib/validators";
export default {
  data() {
    return {
      userData: [],
      dateFromDb: [],
      selectedDate: null,
      isSubmitted: false,
      pageSize: 3,
      nextUrl: null,
      previousUrl: null,
      currentPage: 1
    };
  },
  // LOADS DATA WHILE LOADING PAGE
  created: function() {
    // window.location.origin+/
    var x = this;
    axios
      .get(`${x.$Url}projectuserdata`, {})
      .then(function(response) {
        if (response.status == 200) {
          console.log(response.data.data);
          x.userData = response.data.data;
          x.nextUrl = response.data.next_page_url;
          x.previousUrl = response.data.prev_page_url;
          x.dateFromDb = response.data.data["dates"];
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
    selectedDate: {
      required
    }
  },
  methods: {
    nextPage() {
      var x = this;
      axios
        .get(this.nextUrl)
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data.data);
            x.userData = response.data.data;
            x.nextUrl = response.data.next_page_url;
            x.previousUrl = response.data.prev_page_url;
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
        .get(this.previousUrl)
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data.data);
            x.userData = response.data.data;
            x.nextUrl = response.data.next_page_url;
            x.previousUrl = response.data.prev_page_url;
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
    // New data according to date
    dataChange() {
      var x = this;
      axios
        .get(`${x.$Url}projectuserdatedata/${x.selectedDate}`, {})
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data.data);
            x.nextUrl = response.data.next_page_url;
            x.previousUrl = response.data.prev_page_url;
            x.userData = response.data.data;
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
