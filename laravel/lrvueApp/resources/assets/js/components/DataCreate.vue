<template>
  <div>
    <br>
    <br>
    <br>
    <!-- <button class="btn btn-primary" @click="getData">Get first Data</button> -->
    <button class="btn btn-primary" @click="getAllData">Get All Data</button>
    <!-- {{ form }} -->
    <br>
    <br>
    <!-- {{ items }} -->
    {{ testVal }}
    <br>
    <br>
    <br>
    <div v-if="!edit">
      <div v-if="Newdata">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>LastName</th>
              <th>Email</th>
              <th>Age</th>
              <th>Address</th>
              <th>Gender</th>
              <th>No</th>
              <th>created</th>
              <th>Updated</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tr v-for="item in items" :key="item.id">
            <td v-for="(ite, value) in item" :key="value">{{ ite }}</td>
            <td>
              <button class="btn btn-danger btn-xs" @click="doDelete(item.id)">Delete</button>
              <button class="btn btn-primary btn-xs" @click="doUpdate(item.id)">Edit</button>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="container" v-if="edit">
      <form>
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="form-group">
              <label for="name">FirstName</label>
              <input
                type="text"
                v-model="form.name"
                @blur="$v.form.name.$touch()"
                id="name"
                name="name"
                class="form-control"
              >
              <p
                v-if="$v.form.name.$dirty &&  !$v.form.name.required"
                class="error-message"
              >The name field is required</p>
              <!-- <p>Invalid: {{$v.form.$invalid }} | Dirty: {{  }}$v.form.name.$dirty}}</p> -->
            </div>
            <div class="form-group">
              <label for="lastname">LastName</label>
              <input
                type="lastname"
                v-model="form.lastname"
                id="lastname"
                name="lastname"
                @blur="$v.form.lastname.$touch()"
                class="form-control"
              >
              <p
                v-if="$v.form.lastname.$dirty &&  !$v.form.lastname.required"
                class="error-message"
              >The last name field is required</p>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="text"
                v-model="form.email"
                id="email"
                name="email"
                @blur="$v.form.email.$touch()"
                class="form-control"
              >
              <p
                v-if="!$v.form.email.email &&  $v.form.email.$error"
                class="error-message"
              >Invalid Email ID</p>
              <p
                v-if="!$v.form.email.required && $v.form.email.$error"
                class="error-message"
              >Email is required</p>
            </div>
            <div class="form-group">
              <label for="age">Age</label>
              <input
                type="number"
                v-model="form.age"
                id="age"
                name="age"
                @blur="$v.form.age.$touch()"
                class="form-control"
              >
              <div v-if="$v.form.age.$error">
                <p v-if="$v.form.age.$required" class="error-message">The age field is required</p>
                <p v-else-if="!$v.form.age.integer" class="error-message">The age field is invalid</p>
                <p
                  v-else-if="!$v.form.age.between"
                  class="error-message"
                >The age Should be between 12 and 120</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 form-group">
            <label for="message">Address</label>
            <br>
            <textarea
              id="message"
              v-model="form.address"
              @blur="$v.form.address.$touch()"
              name="message"
              rows="5"
              class="form-control"
            ></textarea>
            <p
              v-if="$v.form.address.$dirty &&  !$v.form.address.required"
              class="error-message"
            >The address field is required</p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 form-group">
            <label for="male">
              <input type="radio" v-model="form.gender" name="gender" id="male" value="Male"> Male
            </label>
            <label for="female">
              <input type="radio" v-model="form.gender" id="female" name="gender" value="Female"> Female
            </label>
            <p
              v-if="$v.form.name.$dirty &&  !$v.form.name.required"
              class="error-message"
            >The gender field is required</p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="form-group">
              <label for="no">Phone Number</label>
              <input
                type="text"
                v-model="form.number"
                @blur="$v.form.number.$touch()"
                id="no"
                name="no"
                class="form-control"
              >
              <!-- <input type="text" v-model="form.testVal" id="no" name="no" class="form-control"> -->
              <p
                v-if="$v.form.number.$dirty &&  !$v.form.number.required"
                class="error-message"
              >The Number field is required</p>
              <p
                v-if="$v.form.number.$dirty &&  !$v.form.number.integer"
                class="error-message"
              >The Number field must be a number</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <button
              class="btn btn-primary"
              @click="axiis"
              @click.prevent="submitted"
              :disabled="$v.form.$invalid"
            >Submit!</button>
          </div>
        </div>
      </form>
    </div>
    <h2>{{ form }}</h2>
    <h1>{{ testVal }}</h1>
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
      form: {
        name: this.name,
        lastname: this.lastname,
        email: this.email,
        age: this.age,
        address: this.address,
        gender: this.gender,
        number: this.number
      },
      testVal: null,
      Newdata: false,
      items: [],
      fff: false,
      edit: false,
      isSubmitted: false
    };
  },
  validations: {
    form: {
      name: {
        required
      },
      lastname: {
        required
      },
      age: {
        required,
        integer
      },
      email: {
        required,
        email
      },
      address: {
        required
      },
      gender: {
        required
      },
      number: {
        required,
        integer
      }
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
    doUpdate(index) {
      this.testVal = index;
      this.edit = true;
      var x = this;
      axios
        .get(`http://127.0.0.1:8000/datas/${x.testVal}`, {})
        .then(function(response) {
          if (response.status == 200) {
            x.form.name = response.data.name;
            x.form.lastname = response.data.lastname;
            x.form.email = response.data.email;
            x.form.age = response.data.age;
            x.form.address = response.data.address;
            x.form.gender = response.data.gender;
            x.form.number = response.data.number;
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    doDelete: function(index) {
      this.testVal = index;
      var x = this;
      axios
        .delete(`http://127.0.0.1:8000/datas/${x.testVal}`, {})
        .then(function(response) {
          if (response.status == 204) {
            alert("Deleted");
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    inLoopData() {
      this.fff = true;
      //   alert(this.testVal);
    },
    submit() {
      if (!this.$v.form.$invalid) {
        this.$emit("FormSubmit", {
          name: this.form.name,
          lastname: this.form.lastname,
          email: this.form.email,
          age: this.form.age,
          address: this.form.address,
          gender: this.form.gender,
          number: this.form.number
        });
      }
    },
    getData() {
      var x = this;
      axios
        .get(`http://127.0.0.1:8000/api/contacts/${x.testVal}`, {})
        .then(function(response) {
          if (response.status == 200) {
            // alert(response.data.name);
            x.form.name = response.data.name;
            x.form.lastname = response.data.lastname;
            x.form.email = response.data.email;
            x.form.age = response.data.age;
            x.form.address = response.data.address;
            x.form.gender = response.data.gender;
            x.form.status = response.data.status;
            // alert("Success");
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    axiis(e) {
      e.preventDefault();
      var x = this;
      axios
        .put(`http://127.0.0.1:8000/datas/${x.testVal}`, {
          name: this.form.name,
          lastname: this.form.lastname,
          email: this.form.email,
          age: this.form.age,
          address: this.form.address,
          gender: this.form.gender,
          number: this.form.number
        })
        .then(function(response) {
          //   if (response.data.Sucsess == 200) {
          if (response.status == 200) {
            alert("Success");
            x.edit = false;
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
      var x = this;
      x.Newdata = true;
      axios
        .get("http://127.0.0.1:8000/datas", {})
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
    }
  }
};
</script>

<style>
</style>
