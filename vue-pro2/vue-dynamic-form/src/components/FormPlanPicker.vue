<template>
  <div>
    <!-- {{form.plan.id}} -->
    <h1 class="title">Coffee Plans</h1>
    {{ idd }}
    <h2 class="subtitle">
      We travel the world to source the very best single origin coffee for you
    </h2>

    <div class="plans">
      <div
        v-for="plan in plans"
        :key="plan.price"
        @click="pickPlan(plan)"
        :class="{'active-plan': plan.id == idd}"
        class="plan"
      >
        <div class="weight">
          {{plan.weight}}
        </div>
        <div class="description">
          <span class="title">
              {{plan.name}}
          </span>
          <span class="description">
              {{plan.description}}
          </span>
        </div>
        <div class="price">
          <span class="dollar-sign">$</span>
          <span class="number">{{plan.price}}</span>
        </div>
      </div>
    </div>
    <div v-if="$v.selectedPlan.$error" class="error">you should pick a plan to continue</div>
  </div>
</template>

<script>
import { required } from "vuelidate/lib/validators";

export default {
  data() {
    return {
      plans: [
        {
          price: 19,
          id: 1,
          weight: "250g",
          name: "The Single",
          description:
            "One bag of freshly roasted coffee beans delivered to your house every month"
        },
        {
          price: 29,
          id: 2,
          weight: "500g",
          name: "The Curious",
          description:
            "Two different types of freshly roasted coffee every month"
        },
        {
          price: 49,
          id: 3,
          weight: "1kg",
          name: "The Addict",
          description:
            "Two bags of two different types of freshly roasted coffee every month."
        }
      ],
      selectedPlan: null
      // selectedPlan1: this.plan,
      // plan1: this.form
    };
  },
  props: {
    form: {
      required: true
    },
    idd: {
      required: true
    }
  },
  validations: {
    selectedPlan: {
      required
    }
  },
  methods: {
    pickPlan(plan) {
      this.selectedPlan = plan;
      this.$emit("SelectedPlanChange", { plan: this.selectedPlan });
      this.$emit("idChange", this.selectedPlan.id);
      // console.log(this.plan1);
      // alert(this.plan1);
      // this.$emit("SelectedPlanChange", this.selectedPlan);
      // alert(plan);
    }
  }
};
</script>