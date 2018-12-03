<template>
  <div>
    <br><br><br>
    <!-- <button class="btn btn-primary" @click="getData">Get first Data</button> -->
    <button class="btn btn-primary" @click="getAllData">Get All Data</button>
    <!-- {{ form }} -->
    <br><br>
    <!-- {{ items }} -->
    {{ testVal }}
    <br><br><br>
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
          <!-- <select v-model="testVal">
        <option :selected="item.id">{{ item.id }}</option>
    </select> -->
        <!-- <tr v-for="item in items">
          <td scope="row">{{ item.id }}</td>
          <td>{{ item.name }}</td>
          <td>{{ item.lname }}</td>
          <td>{{ item.email }}</td>
          <td>{{ item.age }}</td>
          <td>{{ item.address }}</td>
          <td>{{ item.gender }}</td>
          <td>{{ item.status }}</td>
          <td><button class="btn btn-danger btn-xs" @click="inLoopData">Delete</button></td>
          <td><button class="btn btn-primary btn-xs">Edit</button></td>
        </tr> -->
        <tr v-for="item in items" :key="item.id">
                <!-- <span v-if="fff">{{ doMath(item.id) }}</span></td> -->
            <td v-for="(ite, value) in item" :key="value">{{ ite }}
            <td>
                <button class="btn btn-danger btn-xs" @click="doDelete(item.id)">Delete</button>
                <button class="btn btn-primary btn-xs" @click="doUpdate(item.id)">Edit</button>
            </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import { EventBus } from "../main";
export default {
  data() {
    return {
      form: {
        name: null,
        lname: null,
        email: null,
        age: null,
        address: null,
        gender: null,
        status: null
      },
      testVal: null,
      Newdata: false,
      items: [],
      fff: false
    };
  },
  methods: {
    doUpdate(index) {
      this.testVal = index;

      var x = this;
      axios
        .get(`http://127.0.0.1:8000/api/contacts/${x.testVal}`, {})
        .then(function(response) {
          if (response.status == 200) {
            x.form.name = response.data.name;
            x.form.lname = response.data.lname;
            x.form.email = response.data.email;
            x.form.age = response.data.age;
            x.form.address = response.data.address;
            x.form.gender = response.data.gender;
            x.form.status = response.data.status;
            x.$emit("FormNewData", {
              name: x.form.name,
              lname: x.form.lname,
              email: x.form.email,
              age: x.form.age,
              address: x.form.address,
              gender: x.form.gender,
              status: x.form.status,
              testVal: x.testVal
            });
            //   EventBus.$emit("ageWasEdited", {
            //     age: x.form.age
            //   });
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
      //   EventBus.$emit("ageWasEdited", {
      //     age: this.testVal
      //   });

      //   alert(this.testVal);
    },
    doDelete: function(index) {
      this.testVal = index;
      var x = this;
      //   `//api.github.com/users/${value}`
      //   this.$emit("idEdited", this.testVal);
      //   return index + 1;
      axios
        .delete(`http://127.0.0.1:8000/api/contacts/${x.testVal}`, {})
        .then(function(response) {
          if (response.status == 204) {
            alert("Deleted");
            // this.getAllData();
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
    getData() {
      var x = this;
      axios
        .get(`http://127.0.0.1:8000/api/contacts/${x.testVal}`, {})
        .then(function(response) {
          if (response.status == 200) {
            // alert(response.data.name);
            x.form.name = response.data.name;
            x.form.lname = response.data.lname;
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
    getAllData() {
      var x = this;
      x.Newdata = true;
      axios
        .get("http://127.0.0.1:8000/api/contacts", {})
        .then(function(response) {
          if (response.status == 200) {
            x.items = response.data;
            // alert(response.data.name);
            // x.form.name = response.data.name;
            // x.form.lname = response.data.lname;
            // x.form.email = response.data.email;
            // x.form.age = response.data.age;
            // x.form.address = response.data.address;
            // x.form.gender = response.data.gender;
            // x.form.status = response.data.status;
            // alert("Success");
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
