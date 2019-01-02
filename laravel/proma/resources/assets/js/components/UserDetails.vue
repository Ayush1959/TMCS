<template>
  <div class="container">
    <div class="container-fluid">
      <div class="col-md-10">
        <div id="app">
          <graph-bar
            :width="500"
            :height="300"
            :axis-min="0"
            :axis-max="150"
            :labels="labels"
            :values="values"
          >
            <note :text="chartName"></note>
            <!-- <tooltip :names="names" :position="'left'"></tooltip>
            <legends :names="names" :filter="true"></legends>-->
          </graph-bar>
        </div>
      </div>
    </div>
    <!-- <br> -->
    <div class="container">
      <div>
        <select v-model="selectedTaskYearC" class="form-control popsell" id="tsk">
          <option v-for="option in years" :value="option">{{ option }}</option>
        </select>
        <select v-model="selectedTaskMonthC" class="form-control popsell" id="tsk">
          <option v-for="option in month" :value="option">{{ option }}</option>
        </select>
      </div>
      <!-- <br> -->
      <div>
        <div class="col-md-2 nopad">
          <h4>Bugs</h4>
        </div>
      </div>
      <br>
      <br>
      <div class="col-md-2 nopad">
        <button type="button" class="btn btn-primary">
          Functionality Bug
          <span class="badge">{{ functionalityBug }}</span>
        </button>
        <!-- <h4>+</h4> -->
      </div>
      <div class="col-md-2">
        <button type="button" class="btn btn-primary">
          Other Bug
          <span class="badge">{{ otherBug }}</span>
        </button>
      </div>
      <div class="col-md-2">
        <button type="button" class="btn btn-primary">
          Total Bug
          <span class="badge">{{ totalBug }}</span>
        </button>
      </div>
      <br>
      <div>
        <div class="col-md-11 nopad">
          <h4>Tasks</h4>
        </div>
      </div>
      <br>
      <!-- <br> -->
      <div class="col-md-3 nopad">
        <button type="button" class="btn btn-primary">
          Completed Tasks
          <span class="badge">{{ completedTask }}</span>
        </button>
      </div>
      <div class="col-md-3">
        <button type="button" class="btn btn-primary">
          Ready To View
          <span class="badge">{{ readytoview }}</span>
        </button>
      </div>
      <br>
      <br>
      <div>
        <div class="col-md-11 nopad">
          <h4 class="fonts">Hours Tracked : {{ trackedHours }}</h4>
        </div>
      </div>
    </div>
    <div>
      <!-- {{ projectData }} -->
      <table>
        <thead>
          <!-- <tr>
            <th>Id</th>
          </tr>-->
        </thead>
        <tbody>
          <tr v-for="item,key in projectData" :key="item.id">
            <!-- <td>{{ fromNumbers+key }}</td> -->
            <td>{{ item.name }}</td>
            <td>
              <button type="button" class="btn btn-primary">
                Total Bug
                <span class="badge">{{ item.Bug }}</span>
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-primary">
                Completed Tasks
                <span class="badge">{{ item.done }}</span>
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-primary">
                Ready To view
                <span class="badge">{{ item.ready }}</span>
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-primary">
                Re-opened
                <span class="badge">{{ item.reopen }}</span>
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-primary">
                Total Hours
                <span class="badge">{{ item.shours }}</span>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div>
      <button @click="close">Ok</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      selectedTaskYearC: this.selectedTaskYear,
      selectedTaskMonthC: this.selectedTaskMonth
    };
  },
  watch: {
    // selectedTaskYear: function() {
    //   this.selectedTaskYearC = this.selectedTaskYear;
    //   this.$emit("yearChange", this.selectedTaskYear);
    // },
    // selectedTaskMonth: function() {
    //   this.selectedTaskMonthC = this.selectedTaskMonth;
    //   this.$emit("monthChange", this.selectedTaskMonth);
    // },
    selectedTaskYearC: function() {
      // this.selectedTaskYearC = this.selectedTaskYear;
      this.$emit("yearChange", this.selectedTaskYearC);
    },
    selectedTaskMonthC: function() {
      // this.selectedTaskMonthC = this.selectedTaskMonth;
      this.$emit("monthChange", this.selectedTaskMonthC);
    }
  },
  props: {
    labels: {
      required: true
    },
    values: {
      required: true
    },
    years: {
      required: true
    },
    month: {
      required: true
    },
    functionalityBug: {
      required: true
    },
    otherBug: {
      required: true
    },
    totalBug: {
      required: true
    },
    completedTask: {
      required: true
    },
    readytoview: {
      required: true
    },
    trackedHours: {
      required: true
    },
    chartName: {
      required: true
    },
    selectedTaskMonth: {
      required: true
    },
    selectedTaskYear: {
      required: true
    },
    projectData: {
      required: true
    }
  },
  methods: {
    close() {
      this.$emit("close");
    }
  }
};
</script>

<style scoped>
.cncl {
  margin-top: 210px;
}
.xcncl {
  margin-top: 10px;
  float: right;
}
.popsell {
  display: inline-block;
  width: 20%;
}
.nopad {
  padding: 0;
}
.fonts {
  font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
}
</style>
