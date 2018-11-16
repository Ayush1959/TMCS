<template>
  <div>
    <FormPlanPicker @SelectedPlanChange="form.plan = $event" v-if="currentStepNumber === 0"/>
    <FormUserData v-if="currentStepNumber === 2"/>
    <FormUserDetails v-if="currentStepNumber === 1"/>
    <FormAddress v-if="currentStepNumber === 3"/>
    <FormReviewOrder v-if="currentStepNumber === 4"/>

    <div class="progress-bar">
      <div :style="`width: ${progress}%;`"></div>
    </div>

    <!-- Actions -->
    <div class="buttons">
      <button
        @click="goBack"
        v-if="currentStepNumber > 1"
        class="btn-outlined"
      >Back
      </button>
      <button
        @click="goNext"
        class="btn"
      >Next</button>
    </div>

    <pre><code>{{form}}</code></pre>
  </div>
</template>

<script>
import FormPlanPicker from "./FormPlanPicker";
import FormUserDetails from "./FormUserDetails";
import FormUserData from "./FormUserData";
import FormUserLogin from "./FormUserLogin";
import FormAddress from "./FormAddress";
import FormReviewOrder from "./FormReviewOrder";
// import formphp from "./form.php";
export default {
  name: "FormWizard",
  components: {
    FormPlanPicker,
    FormUserDetails,
    FormUserData,
    FormUserLogin,
    FormAddress,
    FormReviewOrder
  },
  data() {
    return {
      currentStepNumber: 1,
      length: 4,
      form: {
        plan: null,
        email: null,
        name: null,
        password: null,
        address: null,
        recipient: null,
        chocolate: false,
        otherTreat: false
      }
    };
  },
  computed: {
    progress() {
      return (this.currentStepNumber / this.length) * 100;
    }
  },
  methods: {
    goBack() {
      this.currentStepNumber--;
    },
    goNext() {
      // alert(this.currentStepNumber);
      switch (this.currentStepNumber) {
        case 0:
          // alert("case1");
          alert(this.form.plan);
          if (!!this.form.plan) {
            this.currentStepNumber++;
          }
          break;
        case 1:
          alert("case2");
          // this.$emit("KeyPres", this);
          // alert(this.FormUserDetails.form.email);
          // axios
          //   .post("http://localhost/ayush/vue-pro2/api/form", {
          //     email: "ayu@gmail.com",
          //     name: "Ayu",
          //     password: "pass"
          //   })
          //   .then(function(response) {
          //     console.log(response);
          //   })
          //   .catch(function(error) {
          //     console.log(error);
          //   });
          break;
        default:
          alert("break");
      }
    }
    // goNext() {
    //   alert(this.form.plan);
    //   if (!!this.form.plan) {
    //     this.currentStepNumber++;
    //   }
    // }
  }
};
</script>
