<template>
  <div>
    <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <ul class="nav navbar-nav">
                        <li><a href="/home">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/serve">serve</a></li>
                        <li><a href="/posts">Blog</a></li>
                        <li><a href="/contacts">Contact</a></li>
                    </ul>


                </div>
            </div>
        </nav>
        <app-header :userAge='age'></app-header>
      <router-view></router-view>
    <Picker @FormSubmit="processStep"/>
    <!-- <Picker/> -->
    <h1>Data:</h1>
    <h4>{{ form }}</h4>
  </div>   
</template>

<script>
import Picker from "./Picker";
import Header from "./Header";

export default {
  name: "Wizard",
  components: {
    Picker
  },
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
      }
    };
  },
  methods: {
    processStep(stepData) {
      Object.assign(this.form, stepData);
    }
  }
};
</script>

<style>
</style>
