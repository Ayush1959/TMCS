<template>
  <div class="container">
    <h1>{{ projectName }}</h1>
    <h4>Start Date : {{ projectStart }}</h4>
    <h4>Total Days worked : {{ projectDays }}</h4>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Designation</th>
          <th>Hours Worked</th>
          <th>Tasks in progress</th>
          <th>Ready to Review</th>
          <th>Tasks Completed</th>
          <th>Total story points</th>
          <th>Bugs Assigned</th>
          <th>Bugs Reported</th>
          <th>Total Cost</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="data in projectdata">
          <td>{{ data.name }}</td>
          <td>{{ data.designation }}</td>
          <td>{{ data.totalhours }}</td>
          <td>{{ data.scheduled }}</td>
          <td>{{ data.readytoreview }}</td>
          <td>{{ data.done }}</td>
          <td>{{ data.storyPoints }}</td>
          <td>{{ data.bugsAssigned }}</td>
          <td>{{ data.bugsReported }}</td>
          <td>{{ data.projectCost }}</td>
          <!-- <td>{{ data.salaryPerHour }}</td> -->
        </tr>
        <tr v-for="data in totaldata">
          <td>Total</td>
          <td></td>
          <!-- <td>{{ data.name }}</td> -->
          <!-- <td>{{ data.designation }}</td> -->
          <td>{{ data.totalhours }}</td>
          <td>{{ data.scheduled }}</td>
          <td>{{ data.readytoreview }}</td>
          <td>{{ data.done }}</td>
          <td>{{ data.storyPoints }}</td>
          <td>{{ data.bugsAssigned }}</td>
          <td>{{ data.bugsReported }}</td>
          <td>{{ counter }}</td>
        </tr>
      </tbody>
    </table>
    <!-- <h1>hi</h1> -->
    <button @click="close">Close</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      projectdata: null,
      projectIds: null,
      totaldata: null,
      counter: null,
      projectName: null,
      projectStart: null,
      projectDays: null
    };
  },
  computed: {
    // counters: function(index) {
    //   //   var counter += index;
    //   return index;
    // }
  },
  watch: {
    projectId: function() {
      console.log(this.projectid);

      this.getProjectDetail(this.projectid);
    }
  },
  created() {
    this.getProjectDetail(this.projectid);
  },
  props: {
    projectId: {
      required: true
    }
  },
  methods: {
    total(index) {
      this.counter += index;
      return index;
    },
    close() {
      this.$emit("closeCmp");
    },
    getProjectDetail(index) {
      var x = this;
      //   this.counter = 0;
      this.projectIds = index;
      axios
        .post(`${x.$Url}singleProjectdata`, {
          projectid: this.projectId
        })
        .then(function(response) {
          if (response.status == 200) {
            console.log(response.data);
            x.projectdata = response.data["data"];
            x.totaldata = response.data["datatotal"];
            x.projectName = response.data["name"];
            x.projectDays = response.data["totaldays"];
            x.projectStart = response.data["start"];
            x.counter = response.data["totalcost"];
          } else {
            alert("Error");
          }
        })
        .catch(function(error) {
          //console.log(error);
        });
    }
  }
};
</script>

<style>
</style>
