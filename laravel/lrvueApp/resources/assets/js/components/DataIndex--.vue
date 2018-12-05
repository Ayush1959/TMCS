<template>
  <div>
    <div class="form-group">
      <router-link :to="{name: 'dataCreate'}" class="btn btn-success">Create new company</router-link>
    </div>
    <form>
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <div class="form-group">
            <label for="name">FirstName</label>
            <input type="text" id="name" v-model="form.name" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="lname">LastName</label>
            <input
              type="lname"
              v-model="form.lastname"
              id="lname"
              name="lname"
              class="form-control"
            >
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" v-model="form.email" id="email" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="number" v-model="form.age" id="age" name="age" class="form-control">
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
            name="message"
            rows="5"
            class="form-control"
          ></textarea>
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
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <div class="form-group">
            <label for="no">Phone Number</label>
            <input type="text" v-model="form.number" id="no" name="no" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <button class="btn btn-primary" @click="axiis" @click.prevent="submitted">Submit!</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
// import { EventBus } from "../main";
export default {
  data() {
    return {
      form: {
        name: null,
        lastname: null,
        email: null,
        age: null,
        address: null,
        gender: null,
        number: null,
        testVal: null
      },
      // form: this.form,
      isSubmitted: false
    };
  },
  mounted() {
    console.log('Component mounted.')
  },
  methods: {
    submitted() {
      this.isSubmitted = true;
    },
    axiis(){
      axios
          .post("http://127.0.0.1:8000/datas", {
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


