<template>
  <div class="container newFont">
    <div class="container-fluid">
      <div class="col-md-9 col-md-offset-1">
        <div id="app">
          <graph-bar
            :width="1000"
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
      <div class="col-md-9 col-md-offset-3">
        <select v-model="selectedTaskYearC" class="form-control popsell" id="tsk">
          <option v-for="option in years" :value="option">{{ option }}</option>
        </select>
        <select v-model="selectedTaskMonthC" class="form-control popsell" id="tsk">
          <option v-for="option in month" :value="option">{{ option }}</option>
        </select>
      </div>
      <!-- <br> -->
      <br>
      <div class="col-md-5 nopad">
        <div>
          <div class="col-md-11 nopad">
            <h4>Tasks</h4>
          </div>
        </div>
        <br>
        <!-- <br> -->
        <div class="col-md-5 nopad">
          <button type="button" class="btn btn-primary">
            Completed Tasks
            <span class="badge">{{ completedTask }}</span>
          </button>
        </div>
        <div class="col-md-5">
          <button type="button" class="btn btn-primary">
            Ready To View
            <span class="badge">{{ readytoview }}</span>
          </button>
        </div>
      </div>
      <div class="col-md-6 nopad">
        <div>
          <div class="col-md-2 nopad">
            <h4>Bugs</h4>
          </div>
        </div>
        <br>
        <br>
        <div class="col-md-4 nopad">
          <button type="button" class="btn btn-primary">
            Functionality Bug
            <span class="badge">{{ functionalityBug }}</span>
          </button>
          <!-- <h4>+</h4> -->
        </div>
        <div class="col-md-4">
          <button type="button" class="btn btn-primary">
            Other Bug
            <span class="badge">{{ otherBug }}</span>
          </button>
        </div>
        <div class="col-md-4">
          <button type="button" class="btn btn-primary">
            Total Bug
            <span class="badge">{{ totalBug }}</span>
          </button>
        </div>
      </div>
      <br>

      <br>
      <br>
      <div>
        <div class="col-md-11 nopad">
          <h4 class="fonts">Hours Tracked : {{ trackedHours }}</h4>
        </div>
      </div>
    </div>
    <div>
      <br>
      <!-- {{ projectData }} -->
      <div>
        <table v-for="item,key in projectData" :key="item.id" class="newFont">
          <thead>
            <tr>
              <th>
                <b>{{ item.name }}</b>
              </th>
            </tr>
            <!-- <br> -->
          </thead>
          <tbody>
            <tr>
              <td class="col-md-1">
                <h5>Total Bug</h5>
                <span class="badge badge-pill badge-info">{{ item.Bug }}</span>
              </td>
              <td class="col-md-1">
                <h5>Completed Tasks</h5>
                <span class="badge badge-pill badge-info">{{ item.done }}</span>
              </td>
              <td class="col-md-1">
                <h5>Ready To view</h5>
                <span class="badge badge-pill badge-info">{{ item.ready }}</span>
              </td>
              <td class="col-md-1">
                <h5>Re-opened</h5>
                <span class="badge badge-pill badge-info">{{ item.reopen }}</span>
              </td>
              <td class="col-md-1">
                <h5>Total Hours</h5>
                <span class="badge badge-pill badge-info">{{ item.shours }}</span>
              </td>
            </tr>
            <br>
          </tbody>
        </table>
      </div>
    </div>
    <div class="fltr">
      <button class="btn btn-success" @click="close">Ok</button>
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
.xcncl {
  margin-top: 10px;
  float: right;
}
.popsell {
  display: inline-block;
  width: 27%;
}
.newFont {
  font-family: auto;
}
.nopad {
  padding: 0;
}
.fonts {
  /* font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif; */
  font-family: "Times New Roman", Times, serif;
}
.fltr {
  float: right;
}
td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
</style>
