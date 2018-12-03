<template>
  <div>
    <div class="buttons">
        <button
          @click="goHome"
          class="btn-outlined"
        >Home
        </button>
        <button
          @click="goView"
          class="btn-outlined"
        >User Data
        </button>
        <button
          @click="goCreate"
          class="btn-outlined"
        >Create User</button>
    </div>
    <Picker @FormSubmit="processStep" 
    :name="form.name"
    :lname="form.lname" 
    :email="form.email"  
    :age="form.age" 
    :address="form.address" 
    :gender="form.gender" 
    :status="form.status" 
    :testVal="form.testVal" 
    v-if="currentStepNumber === 3"/>
    <Home v-if="currentStepNumber === 1" />
    <Data v-if="currentStepNumber === 2" @FormNewData="processStepData"/>
    <!-- <Picker/> -->
    <h1>Data:</h1>
    <h4>{{ form }}</h4>
    <!-- {{ testVal }} -->
  </div>   
</template>

<script>
import Picker from "./Picker";
import Data from "./Data";
import Home from "./Home";

export default {
  name: "Wizard",
  components: {
    Picker,
    Data,
    Home
  },
  data() {
    return {
      currentStepNumber: 1,
      form: {
        name: null,
        lname: null,
        email: null,
        age: null,
        address: null,
        gender: null,
        status: null,
        testVal: 0
      },
      Number: 0
    };
  },
  methods: {
    processStep(stepData) {
      Object.assign(this.form, stepData);
    },
    processStepData(stepData) {
      Object.assign(this.form, stepData);
      this.currentStepNumber = 3;
    },
    goView() {
      this.currentStepNumber = 2;
    },
    goCreate() {
      this.currentStepNumber = 3;
      // alert(this.Number);
    },
    goHome() {
      this.currentStepNumber = 1;
    }
  }
};
</script>

<style>
</style>
