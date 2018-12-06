<template>
  <div>
    <br>
    <br>
    <br>
    <!-- <button class="btn btn-primary" @click="getData">Get first Data</button> -->
    <button class="btn btn-primary" @click="getAllData">Get Monitored Data</button>
    <button class="btn btn-primary" @click="getAllNonData">Get Non Monitored Data Data</button>
    <br>
    <br>
    <!-- <h1>{{ testVal }}</h1> -->
    <br>
    <div class="col-xs-offset-1">
      <div>
        <div id="success_message" class="alert alert-success" v-if="xx == 1">Status Changed</div>
        <table class="table table-dark">
          <thead>
            <tr>
              <th>Id</th>
              <th>Project</th>
              <th>Start Date</th>
              <th>Expected Date</th>
              <th>Actual Close</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tr v-for="item in items" :key="item.id" v-if="mrdata == 1">
            <td v-for="(ite, value) in item" :key="value">{{ ite }}</td>
            <td>
              <button
                class="btn btn-danger btn-xs mrg"
                @click="doNotMonitor(item.id)"
              >Stop Monitoring</button>
            </td>
          </tr>
          <!-- <div id="error_message" class="alert alert-danger"> </> -->
          <tr v-for="item in items" :key="item.id" v-if="mrdata == 2">
            <td v-for="(ite, value) in item" :key="value">{{ ite }}</td>
            <td>
              <button class="btn btn-danger btn-xs mrg" @click="doMonitor(item.id)">Start Monitoring</button>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
// import { EventBus } from "../main";
export default {
  data() {
    return {
      items: [],
      testVal: 0,
      bttn: true,
      mrdata: 0,
      xx: 0
    };
  },
  methods: {
    getAllData() {
      this.bttn = false;
      this.mrdata = 1;
      var x = this;
      x.Newdata = true;
      axios
        .get("http://127.0.0.1:8000/project", {})
        .then(function(response) {
          if (response.status == 200) {
            x.items = response.data;
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    doNotMonitor(index) {
      this.bttn = false;
      this.mrdata = 1;
      //   alert(index);
      this.testVal = index;
      var x = this;
      axios
        .put(`http://127.0.0.1:8000/project/${x.testVal}`, {
          monitoring: 0
        })
        .then(function(response) {
          if (response.status == 200) {
            // alert("Success");
            x.getAllData();
            x.xx = 1;
            setTimeout(function() {
              x.xx = 0;
            }, 3000);
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    getAllNonData() {
      // this.bttn = false;
      this.mrdata = 2;
      var x = this;
      x.Newdata = true;
      axios
        .get("http://127.0.0.1:8000/projects", {})
        .then(function(response) {
          if (response.status == 200) {
            x.items = response.data;
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    doMonitor(index) {
      this.bttn = false;
      this.mrdata = 2;
      //   alert(index);
      this.testVal = index;
      var x = this;
      axios
        .put(`http://127.0.0.1:8000/project/${x.testVal}`, {
          monitoring: 1
        })
        .then(function(response) {
          if (response.status == 200) {
            // alert("Success");
            x.getAllNonData();
            x.xx = 1;
            setTimeout(function() {
              x.xx = 0;
            }, 3000);
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>

<style>
.mrg {
  margin-left: 20px;
}
table {
  border: 2px solid #42b983;
  border-radius: 3px;
  background-color: #fff;
}

th {
  background-color: #42b983;
  color: rgba(255, 255, 255, 0.66);
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

td {
  background-color: #f9f9f9;
}

th,
td {
  min-width: 120px;
  padding: 10px 20px;
}

th.active {
  color: #fff;
}

th.active .arrow {
  opacity: 1;
}

.arrow {
  display: inline-block;
  vertical-align: middle;
  width: 0;
  height: 0;
  margin-left: 5px;
  opacity: 0.66;
}

.arrow.asc {
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
  border-bottom: 4px solid #fff;
}
</style>
