<template>
  <div>
    <h1 class="title">Delivery details</h1>

    <h2 class="subtitle">
      Where should we send your freshly roasted coffee beans?
    </h2>

    <form class="form">
      <div class="form-group">
        <label class="form-label" for="delivery_name">Name</label>
        <input @input="submit" v-model="$v.form.name.$model" type="text" placeholder="Recipients Name" class="form-control" id="delivery_name">
        <div v-if="$v.form.name.$error" class="error">field is required</div>
      </div>

      <div class="form-group">
        <label class="form-label" for="address">Address</label>
        <textarea @input="submit" v-model="$v.form.address.$model" placeholder="London Street 470978 New England" rows="3" class="form-control" id="address"></textarea>
        <div v-if="$v.form.address.$error" class="error">field is required</div>
      </div>
    </form>
  </div>
</template>

<script>
import { required } from "vuelidate/lib/validators";
export default {
  data() {
    return {
      form: {
        name: this.name,
        address: null
      }
    };
  },
  props: {
    name: {
      type: String
    }
  },
  validations: {
    form: {
      address: {
        required
      },
      name: {
        required
      }
    }
  },
  methods: {
    submit() {
      this.$emit("AdressFormChange", {
        address: this.form.address,
        name: this.form.name
      });
    }
  }
};
</script>

<style scoped>
</style>