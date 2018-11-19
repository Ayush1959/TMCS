<template>
  <div>
    <FormPlanPicker @SelectedPlanChange="processStep" v-if="currentStepNumber === 1"/>
    <FormUserData @CheckUserEmail="processStep" v-if="currentStepNumber === 2"/>
    <FormUserLogin @LoginFormChange="processStep" :email="form.email" v-if="currentStepNumber === 3"/>
    <FormUserDetails @CreateFormChange="processStep" :email="form.email" v-if="currentStepNumber === 4"/>
    <FormAddress @AdressFormChange="processStep" :name="form.name" v-if="currentStepNumber === 5"/>
    <FormReviewOrder :cFormData="form" v-if="currentStepNumber === 6"/>
    <FormUserEnd v-if="currentStepNumber === 7"/>

    <div class="progress-bar" v-if="currentStepNumber < 7">
      <div :style="`width: ${progress}%;`"></div>
    </div>

    <!-- Actions -->
    <transition name="fade"
      <div class="buttons">
        <button
          @click="goBack"
          v-if="currentStepNumber > 1 && currentStepNumber < 7"
          class="btn-outlined"
        >Back
        </button>
        <button
          @click="goNext"
          v-if="currentStepNumber < 7"
          class="btn"
        >Next</button>
      </div>
    </transition>

    <pre v-if="currentStepNumber < 7"><code>{{form}}</code></pre>
  </div>
</template>

<script>
import FormPlanPicker from "./FormPlanPicker";
import FormUserDetails from "./FormUserDetails";
import FormUserData from "./FormUserData";
import FormUserLogin from "./FormUserLogin";
import FormAddress from "./FormAddress";
import FormReviewOrder from "./FormReviewOrder";
import FormUserEnd from "./FormEnd";
// import formphp from "./form.php";
export default {
  name: "FormWizard",
  components: {
    FormPlanPicker,
    FormUserDetails,
    FormUserData,
    FormUserLogin,
    FormAddress,
    FormUserEnd,
    FormReviewOrder
  },
  data() {
    return {
      currentStepNumber: 1,
      length: 7,
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
    processStep(stepData) {
      Object.assign(this.form, stepData);
    },
    goBack() {
      // this.currentStepNumber--;
      switch (this.currentStepNumber) {
        case 1:
          this.currentStepNumber = 1;
          break;
        case 2:
          this.currentStepNumber = 1;
          break;
        case 3:
          this.currentStepNumber = 2;
          break;
        case 4:
          this.currentStepNumber = 2;
          break;
        case 5:
          this.currentStepNumber = 1;
          break;
        case 6:
          this.currentStepNumber = 5;
          break;
        default:
          break;
      }
    },
    goNext() {
      var x = this;
      switch (this.currentStepNumber) {
        case 1:
          if (!!this.form.email && !!this.form.password && !!this.form.plan) {
            this.currentStepNumber = 5;
          } else if (!!this.form.plan) {
            this.currentStepNumber++;
          }
          break;
        case 2:
          if (!!this.form.email) {
            axios
              .post("http://localhost/ayush/vue-pro2/api/formUserEmail", {
                email: this.form.email
              })
              .then(function(response) {
                if (response.data.Sucsess == 200) {
                  x.currentStepNumber = 3;
                  x.form.name = response.data.Name;
                } else {
                  x.currentStepNumber = 4;
                }
              })
              .catch(function(error) {
                console.log(error);
              });
          } else {
            break;
          }
          break;
        case 3:
          // alert("case3");
          // this.$emit("KeyPres", this);
          // alert(this.form.email);
          axios
            .post("http://localhost/ayush/vue-pro2/api/formLoginCheck", {
              email: this.form.email,
              password: this.form.password
            })
            .then(function(response) {
              if (response.data.Sucsess == 200) {
                // alert("suscess");
                // alert(currentStepNumber);
                // x.form.name = response.data.Name;
                x.currentStepNumber = 5;
                // alert(x.currentStepNumber);
              } else {
                alert("Password Error");
                // x.currentStepNumber = 4;
              }
              console.log(response);
            })
            .catch(function(error) {
              console.log(error);
            });
          break;
        case 4:
          // alert("case4");
          // this.$emit("KeyPres", this);
          // alert(this.form.email);
          axios
            .post("http://localhost/ayush/vue-pro2/api/form", {
              email: this.form.email,
              name: this.form.name,
              password: this.form.password
            })
            .then(function(response) {
              if (response.data.Sucsess == 200) {
                // alert("suscess");
                // alert(currentStepNumber);
                // x.form.name = response.data.Name;
                x.currentStepNumber = 5;
                // alert(x.currentStepNumber);
              } else {
                alert("Error");
                // x.currentStepNumber = 4;
              }
              console.log(response);
            })
            .catch(function(error) {
              console.log(error);
            });
          break;
        case 5:
          // alert("case1");
          // alert(this.form.plan);
          if (!!this.form.plan && !!this.form.address) {
            this.currentStepNumber++;
          }
          break;
        case 6:
          if (!!this.form.plan && !!this.form.address) {
            this.currentStepNumber++;
          }
        default:
        // alert("break");
      }
    }
  }
};
</script>
