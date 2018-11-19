<template>
  <div>
    <div v-if="nxt !== 'pending'">

    <FormPlanPicker @SelectedPlanChange="processStep" v-if="currentStepNumber === 1"/>
    <FormUserData @CheckUserEmail="processStep" v-if="currentStepNumber === 2"/>
    <FormUserLogin @LoginFormChange="processStep" :email="form.email" v-if="currentStepNumber === 3"/>
    <FormUserDetails @CreateFormChange="processStep" :email="form.email" v-if="currentStepNumber === 4"/>
    <FormAddress @AdressFormChange="processStep" :name="form.name" v-if="currentStepNumber === 5"/>
    <FormReviewOrder @TreatChange="processStep" @ChocolateChange="processStep" :cFormData="form" v-if="currentStepNumber === 6"/>
    <FormLoading v-if="currentStepNumber === 9"/>
    <FormUserEnd v-if="currentStepNumber === 7"/>

    <div class="progress-bar" v-if="currentStepNumber < 7">
      <div :style="`width: ${progress}%;`"></div>
    </div>

    <transition>
        <div v-if="nxt1 === 'pending'" class="loadr"></div>
    </transition>
    <!-- Actions -->
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

    <pre v-if="currentStepNumber < 7"><code>{{form}}</code></pre>

    </div>

    <div class="loading-wrapper" v-if="nxt === 'pending'">
      <div class="loader">
        <img src="../assets/spinner.svg" alt="spinner">
        <!-- <img src="../assets/spinner1.svg" alt="s11111r"> -->
        <!-- <img src="../assets/spinner1.gif" alt="s22222r"> -->
        <p>Please Wait we are hitting our servers</p>
      </div>
    </div>

  </div>
</template>

<script>
import FormPlanPicker from "./FormPlanPicker";
import FormUserDetails from "./FormUserDetails";
import FormUserData from "./FormUserData";
import FormUserLogin from "./FormUserLogin";
import FormAddress from "./FormAddress";
import FormReviewOrder from "./FormReviewOrder";
import FormLoading from "./FormLoading";
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
    FormLoading,
    FormReviewOrder
  },
  data() {
    return {
      currentStepNumber: 1,
      nxt: null,
      nxt1: null,
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
            // this.nxt = true;
            this.currentStepNumber = 5;
            // this.nxt = false;
          } else if (!!this.form.plan) {
            this.currentStepNumber++;
            // this.nxt = false;
          }
          break;
        case 2:
          if (!!this.form.email) {
            // this.nxt = "pending";
            this.nxt1 = "pending";
            axios
              .post("http://localhost/ayush/vue-pro2/api/formUserEmail", {
                email: this.form.email
              })
              .then(function(response) {
                if (response.data.Sucsess == 200) {
                  // x.nxt = "success";
                  x.nxt1 = "success";
                  x.currentStepNumber = 3;
                  x.form.name = response.data.Name;
                } else {
                  // x.nxt = "success";
                  x.nxt1 = "success";
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
          if (!!this.form.email && !!this.form.password) {
            this.nxt1 = "pending";
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
                  x.nxt1 = "success";
                  x.currentStepNumber = 5;
                  // alert(x.currentStepNumber);
                } else {
                  x.nxt1 = "success";
                  // setTimeout(function() {
                  //   alert("Pswd Error");
                  // }, 1000);
                  alert("Password Error");
                  // x.currentStepNumber = 4;
                }
                console.log(response);
              })
              .catch(function(error) {
                console.log(error);
              });
            break;
          } else {
            break;
          }
        case 4:
          if (!!this.form.email && !!this.form.password && !!this.form.name) {
            this.nxt = "pending";
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
                  x.nxt = "success";
                  x.currentStepNumber = 5;
                  // alert(x.currentStepNumber);
                } else {
                  x.nxt = "success";
                  alert("Error");
                  // x.currentStepNumber = 4;
                }
                console.log(response);
              })
              .catch(function(error) {
                console.log(error);
              });
            break;
          } else {
            break;
          }
        case 5:
          // alert("case1");
          // alert(this.form.plan);
          if (!!this.form.plan && !!this.form.address) {
            this.currentStepNumber++;
          }
          break;
        case 6:
          if (
            !!this.form.email &&
            !!this.form.password &&
            !!this.form.name &&
            !!this.form.plan &&
            !!this.form.address
          ) {
            this.nxt = "pending";
            // this.nxt = true;
            axios
              .post("http://localhost/ayush/vue-pro2/api/formData", {
                email: this.form.email,
                name: this.form.name,
                address: this.form.address,
                chocolate: this.form.chocolate,
                otherTreat: this.form.otherTreat,
                plan: this.form.plan.name
                // password: this.form.password
              })
              .then(function(response) {
                if (response.data.Sucsess == 200) {
                  // alert("suscess");
                  // alert(currentStepNumber);
                  // x.form.name = response.data.Name;
                  // x.nxt = false;
                  x.nxt = "success";
                  x.currentStepNumber = 7;
                  // alert(x.currentStepNumber);
                } else {
                  // x.nxt = false;
                  x.nxt = "success";
                  alert("Error");
                  // x.currentStepNumber = 4;
                }
                console.log(response);
              })
              .catch(function(error) {
                console.log(error);
              });
            break;
          } else {
            break;
          }
        // case 7:
        // if (!!this.form.plan && !!this.form.address) {
        //   setTimeout(function() {
        //     return (this.currentStepNumber = 8);
        //   }, 1000);
        // }
        default:
        // alert("break");
      }
    }
  }
};
</script>

<style>
.loadr {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 20px;
  height: 20px;
  margin: 10px;
  float: right;
  animation: spin 0.1s infinite;
}

/* .slide-enter {
  opacity: 0;
}

.slide-enter-active {
  animation: slide-in 1s ease-out forwards;
  transition: opacity 0.5s;
}

.slide-leave {
}

.slide-leave-active {
  animation: slide-out 1s ease-out forwards;
  transition: opacity 3s;
  opacity: 0;
  position: absolute;
}

.slide-move {
  transition: transform 1s;
} */

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes slide-in {
  from {
    transform: translateY(20px);
  }
  to {
    transform: translateY(0);
  }
}

@keyframes slide-out {
  from {
    transform: translateY(0);
  }
  to {
    transform: translateY(20px);
  }
}
</style>
