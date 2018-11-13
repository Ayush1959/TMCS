<template>
  <div id="app">
  <h1>Form Validation</h1>
  <form @submit.prevent="submitForm" autocomplete="off">
    <div class="form-group">
      <label for="name">Name:</label>
      <input v-model.number="$v.form.name.$model"
       @blur="$v.form.name.$touch()"
       id="name">
      <p v-if="$v.form.name.$dirty &&  !$v.form.name.required" class="error-message">The name field is required</p>
      <p>Invalid: {{$v.form.$invalid }} | Dirty: {{$v.form.name.$dirty}}</p>
    </div>

    <div class="form-group">
      <label for="age">Age:</label>
      <input v-model.number="form.age" 
      @blur="$v.form.age.$touch()"
      id="age"
      >
      <div v-if="$v.form.age.$error">        
        <p v-if="$v.form.age.$required" class="error-message">The age field is required</p>
        <p v-else-if="!$v.form.age.integer" class="error-message">The age field is invalid</p>
        <p v-else-if="!$v.form.age.between" class="error-message">The age Should be between 12 and 120</p>
      </div>
    </div>

    <div class="form-group">
      <label for="github-username">Git UserName: </label>
      <input v-model.lazy="$v.form.githubUsername.$model"
       type="text"
       id="github-username">
       <span v-show="$v.form.githubUsername.$pending" class="fa fa-spinner fa-spin">Loading</span>
       <p v-if="!$v.form.githubUsername.exists && $v.form.githubUsername.$error">Wrong Username!</p>
    </div>

    <div class="form-group">
      <label for="newsletter">Subscribe here: </label>
      <input v-model="form.newsletter" type="checkbox" id="newsletter">      
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input v-model="form.email" @blur="$v.form.email.$touch()" id="email">    
      <p v-if="!$v.form.email.email &&  $v.form.email.$error" class="error-message">Invalid Email ID</p>
      <p v-if="!$v.form.email.required && $v.form.email.$error" class="error-message">Email is required for sending newsletter</p>      
    </div>

    <div class="form-group">
      <label for="food">Pizza or Burger: </label>
      <input v-model.number="form.food"
      @blur="$v.form.food.$touch()"
       type="text"
       id="food">
    <p v-if="$v.form.food.$error && !$v.form.food.pizzaOrBurger">Sorry!</p>
    </div>

    <div>
      <button :disabled="$v.form.$invalid">Submit</button>
    </div>
  </form>
</div>
</template>

<script>
Vue.use(window.vuelidate.default);

export default {
  name: "app",
  data() {
    return {
      form: {
        name: null,
        age: null,
        email: null,
        newsletter: null,
        githubUsername: null,
        food: null
      }
    };
  },
  validations: {
    form: {
      name: {
        required: validators.required
      },
      age: {
        required: validators.required,
        integer: validators.integer,
        between: validators.between(12, 120)
      },
      email: {
        email: validators.email,
        required: validators.requiredIf(function() {
          return !!this.form.newsletter;
        })
      },
      githubUsername: {
        exists(value) {
          if (!validators.helpers.req(value)) {
            return true;
          }
          return axios.get(`//api.github.com/users/${value}`);
          // return new Promise((resolve, reject) => {
          // setTimeout(() => resolve(value.length > 3), 1000);
          // resolve(value.length > 3);
          // });
        }
      },
      food: {
        pizzaOrBurger: value => value === "pizza" || value === "burger"
      }
    }
  },
  // computed: {
  //   nameIsValid() {
  //     return !!this.form.name;
  //   },
  //   ageIsValid() {
  //     return (
  //       typeof this.form.age === "number" &&
  //       this.form.age > 12 &&
  //       this.form.age < 120
  //     );
  //   },
  //   formIsValid() {
  //     return this.nameIsValid && this.ageIsValid;
  //   }
  // },
  methods: {
    submitForm() {
      // if (this.formIsValid) {
      if (!this.$v.form.$invalid) {
        console.log("📝 Form Submitted", this.form);
      } else {
        console.log("❌ Invalid form");
      }
    }
  }
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

h1,
h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
