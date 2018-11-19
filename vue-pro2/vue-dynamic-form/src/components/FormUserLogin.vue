<template>
  <div>
    <h1 class="title">Login to Account</h1>

    <h2 class="subtitle">
      Log in to order your liquid gold subscription
    </h2>

    <form class="form">
      <div class="form-group">
        <label class="form-label" for="email">Email</label>
        <input @input="submit" type="text" v-model="$v.form.email.$model" placeholder="email" class="form-control" id="email" disabled>
        <div v-if="$v.form.email.$error && !$v.form.email.required" class="error">email is required</div>
        <div v-if="$v.form.email.$error && !$v.form.email.email" class="error">email is invalid</div>
      </div>


      <div class="form-group">
        <label class="form-label" for="password">Password</label>
        <input @input="submit" v-model="$v.form.password.$model" type="password" placeholder="Super Secret Password" class="form-control" id="password">
        <div v-if="$v.form.password.$error && !$v.form.password.required" class="error">password is required</div>
      </div>
    </form>
  </div>
</template>

<script>
import { required, email } from "vuelidate/lib/validators";
export default {
  data() {
    return {
      form: {
        email: this.email,
        password: null
      }
    };
  },
  props: {
    email: {
      type: String
    }
  },
  validations: {
    form: {
      email: {
        required,
        email
      },
      password: {
        required
      }
    }
  },
  methods: {
    submit() {
      this.$emit("LoginFormChange", {
        email: this.form.email,
        password: this.form.password
      });
    }
  }
};
</script>

<style scoped>
</style>