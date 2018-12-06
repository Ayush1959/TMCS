<template>
  <div id="app">
    <!-- BUTTONS -->
    <div>
      <el-button type="primary" @click="show1 =!show1">SHOW<i class="el-icon-upload el-icon-right"></i></el-button>
      <el-button type="primary" :loading="true">Loading</el-button>
      <br><br>
      <el-radio v-model="radio1" label="11">Option A</el-radio>
      <el-radio v-model="radio1" label="21">Option B</el-radio>
      <!-- {{ radio1 }} -->
      <el-switch v-model="value1"></el-switch>
      <!-- {{ value1 }} -->
      <br>
      </div>
      <!-- ROWS -->
    <div v-if="show1">
          <el-row>
            <el-col :span="12">
              <div
              class="grid-content bg-purple-dark"
            >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
            <!-- column span like bs col -->
            <el-col :span="12">Hey</el-col>
          </el-row>
          <!-- OFFSET -->
          <el-row>
            <el-col :span="18" :offset="6">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
          </el-row>
          <!-- GUTTER -->
          <!-- ROW -->
          <el-row :gutter="20">
            <el-col :span="6">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
            <el-col :span="6">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
            <el-col :span="6">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
            <el-col :span="6">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
          </el-row>
          <!-- Flex -->
          <!-- Justify -->
          <el-row :gutter="10" type="flex" justify="center">
            <el-col :span="4">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
            <el-col :span="4">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
            <el-col :span="4">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
            <el-col :span="4">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
          </el-row>
          <el-row :gutter="10" type="flex" justify="end">
            <el-col :span="4">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
            <el-col :span="4">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
            <el-col :span="4">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
            <el-col :span="4">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
          </el-row>
          <!-- RESPONSIVE -->
          <el-row :gutter="10">
            <el-col :xs="8" :sm="6" :md="6" :lg="6" :xl="1">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
            <el-col :xs="8" :sm="6" :md="4" :lg="6" :xl="10">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
            <el-col :xs="4" :sm="6" :md="12" :lg="6" :xl="10">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
            <el-col :xs="4" :sm="6" :md="2" :lg="6" :xl="1">
              <div
                class="grid-content bg-purple-dark"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
            </el-col>
          </el-row>
          <!-- CONTAINERS -->
          <el-button type="primary" @click="show =!show">Container</el-button>
            <!-- ALSO HAS CSS PROPS -->
          <el-container class="container" v-if="show">
            <el-header>
              <h1>container for headers- Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
            </el-header>
            <el-aside>
              container for side sections (usually a side nav). Lorem ipsum dolor, sit 
              amet consectetur adipisicing elit. Quia reiciendis, ipsum in, similique 
              mollitia inventore recusandae iure quibusdam dolore temporibus distinctio
              molestias. Odit deserunt ab doloremque repellendus ullam nam a!</h2>
            </el-aside>
            <el-main>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Id sint 
              dolore nihil, eum iste possimus rerum!</h4>
            </el-main>
            <el-footer>
              <h1>container for footers. Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
            </el-footer>
          </el-container>
        </div>
      
    <div v-if="value1">
          <!-- SLIDER -->
          <el-slider
            v-model="value9"
            range
            show-stops
            :max="10">
          </el-slider>
          <!-- {{ value9 }} -->
          <!-- SELECT BOX WITH PARAMS -->
          <el-select v-model="value7" placeholder="Select">
          <el-option-group
            v-for="group in options3"
            :key="group.label"
            :label="group.label">
            <el-option
              v-for="item in group.options"
              :key="item.value"
              :label="item.label"
              :value="item.value">
            </el-option>
          </el-option-group>
        </el-select>
        <!-- SELCET WITH SEARCH  -->
        <el-select
          v-model="value8"
          multiple
          filterable
          remote
          reserve-keyword
          placeholder="Please enter a keyword"
          :remote-method="remoteMethod"
          :loading="loading">
          <el-option
            v-for="item in options4"
            :key="item.value"
            :label="item.label"
            :value="item.value">
          </el-option>
        </el-select>
        <!-- Time Field -->
        <el-time-picker
          v-model="valueTime"
          :picker-options="{
            selectableRange: '00:30:00 - 23:30:00'
          }"
          placeholder="Arbitrary time">
        </el-time-picker>
        {{ valueTime }}

        <!-- DATE PICKER -->
        <el-date-picker
            v-model="valueDate"
            type="date"
            placeholder="Pick a day">
          </el-date-picker>
          {{ valueDate }}
          <br><br><br>
          <!-- DATE AND TIME PICKER -->
          <el-date-picker
            v-model="valueDateTime"
            type="datetime"
            placeholder="Select date and time">
          </el-date-picker>

          <!-- RATING -->
          <el-rate
          v-model="valueRate"
          :texts="['oops', 'disappointed', 'normal', 'good', 'great']"
          show-text>
          </el-rate>
          {{ valueRate }}
                                          <!-- F
                                          O

                                          FORM

                                          R
                                          M -->
            


            <el-form ref="form" :model="form" label-width="120px">
        <el-form-item label="Activity name">
          <el-input v-model="form.name"></el-input>
        </el-form-item>
        <el-form-item label="Activity zone">
          <el-select v-model="form.region" placeholder="please select your zone">
            <el-option label="Zone one" value="shanghai"></el-option>
            <el-option label="Zone two" value="beijing"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="Activity time">
          <el-col :span="11">
            <el-date-picker type="date" placeholder="Pick a date" v-model="form.date1" style="width: 100%;"></el-date-picker>
          </el-col>
          <el-col class="line" :span="2">-</el-col>
          <el-col :span="11">
            <el-time-picker type="fixed-time" placeholder="Pick a time" v-model="form.date2" style="width: 100%;"></el-time-picker>
          </el-col>
        </el-form-item>
        <el-form-item label="Instant delivery">
          <el-switch v-model="form.delivery"></el-switch>
        </el-form-item>
        <el-form-item label="Activity type">
          <el-checkbox-group v-model="form.type">
            <el-checkbox label="Online activities" name="type"></el-checkbox>
            <el-checkbox label="Promotion activities" name="type"></el-checkbox>
            <el-checkbox label="Offline activities" name="type"></el-checkbox>
            <el-checkbox label="Simple brand exposure" name="type"></el-checkbox>
          </el-checkbox-group>
        </el-form-item>
        <el-form-item label="Resources">
          <el-radio-group v-model="form.resource">
            <el-radio label="Sponsor"></el-radio>
            <el-radio label="Venue"></el-radio>
          </el-radio-group>
        </el-form-item>
        <el-form-item label="Activity form">
          <el-input type="textarea" v-model="form.desc"></el-input>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="onSubmit">Create</el-button>
          <el-button>Cancel</el-button>
        </el-form-item>

        <!-- TABLE -->

        <el-table
          :data="tableData"
          border
          style="width: 100%">
          <el-table-column
            prop="date"
            label="Date"
            width="180">
          </el-table-column>
          <el-table-column
            prop="name"
            label="Name"
            width="180">
          </el-table-column>
          <el-table-column
            prop="address"
            label="Address">
          </el-table-column>
        </el-table>
      </el-form>
          <!-- Tags -->

        <el-tag
          v-for="tag in tags"
          :key="tag.name"
          closable
          :type="tag.type">
          {{tag.name}}
        </el-tag>
      </div>
    <div v-if="radio1 == 21">
      <el-progress :percentage="0"></el-progress>
      <el-progress :percentage="70"></el-progress>
      <el-progress :percentage="80" color="#8e71c7"></el-progress>
      <el-progress :percentage="100" status="success"></el-progress>
      <el-progress :percentage="50" status="exception"></el-progress>
      <!-- PAGENATION -->

      <el-pagination
        layout="prev, pager, next"
        :total="100">
      </el-pagination>

      <!-- BADGES AND DROPDOWN -->
      <el-dropdown trigger="click">
        <span class="el-dropdown-link">
          Click Me<i class="el-icon-caret-bottom el-icon--right"></i>
        </span>
        <el-dropdown-menu slot="dropdown">
          <el-dropdown-item class="clearfix">
            comments
            <el-badge class="mark" :value="12" />
          </el-dropdown-item>
          <el-dropdown-item class="clearfix">
            replies
            <el-badge class="mark" :value="3" />
          </el-dropdown-item>
        </el-dropdown-menu>
      </el-dropdown>
      <el-alert
        title="success alert"
        type="success"
        show-icon>
      </el-alert>
      <el-alert
        title="info alert"
        type="info"
        show-icon>
      </el-alert>
      <el-alert
        title="warning alert"
        type="warning"
        show-icon>
      </el-alert>
      <el-alert
        title="error alert"
        type="error"
        show-icon>
      </el-alert>
      </div>
    </div>
</template>

<script>
export default {
  name: "app",
  data() {
    return {
      msg: "Welcome to Your Vue.js App",
      show: false,
      show1: false,
      radio1: null,
      value1: false,
      form: {
          name: '',
          region: '',
          date1: '',
          date2: '',
          delivery: false,
          type: [],
          resource: '',
          desc: ''
        },
      value9: [4, 6],
      tags: [
          { name: 'Tag 1', type: '' },
          { name: 'Tag 2', type: 'success' },
          { name: 'Tag 3', type: 'info' },
          { name: 'Tag 4', type: 'warning' },
          { name: 'Tag 5', type: 'danger' }
        ],
      value7: null,
      tableData: [{
          date: '2016-05-03',
          name: 'Tom',
          address: 'No. 189, Grove St, Los Angeles'
        }, {
          date: '2016-05-02',
          name: 'Tom',
          address: 'No. 189, Grove St, Los Angeles'
        }, {
          date: '2016-05-04',
          name: 'Tom',
          address: 'No. 189, Grove St, Los Angeles'
        }, {
          date: '2016-05-01',
          name: 'Tom',
          address: 'No. 189, Grove St, Los Angeles'
        }, {
          date: '2018-12-09',
          name: 'akm',
          address: 'No. 189, Grove St, Clatita'
        }],
      options3: [{
          label: 'Popular cities',
          options: [{
            value: 'Shanghai',
            label: 'Shanghai'
          }, {
            value: 'Beijing',
            label: 'Beijing'
          }]
        }, {
          label: 'City name',
          options: [{
            value: 'Chengdu',
            label: 'Chengdu'
          }, {
            value: 'Shenzhen',
            label: 'Shenzhen'
          }, {
            value: 'Guangzhou',
            label: 'Guangzhou'
          }, {
            value: 'Dalian',
            label: 'Dalian'
          }]
        }],
        value8: null,
        options4: [],
        list: [],
        valueDate: null,
        valueDateTime: null,
        loading: false,
        valueRate: null,
        states: ["Alabama", "Alaska", "Arizona",
        "Arkansas", "California", "Colorado",
        "Connecticut", "Delaware", "Florida",
        "Georgia", "Hawaii", "Idaho", "Illinois",
        "Indiana", "Iowa", "Kansas", "Kentucky",
        "Louisiana", "Maine", "Maryland",
        "Massachusetts", "Michigan", "Minnesota",
        "Mississippi", "Missouri", "Montana",
        "Nebraska", "Nevada", "New Hampshire",
        "New Jersey", "New Mexico", "New York",
        "North Carolina", "North Dakota", "Ohio",
        "Oklahoma", "Oregon", "Pennsylvania",
        "Rhode Island", "South Carolina",
        "South Dakota", "Tennessee", "Texas",
        "Utah", "Vermont", "Virginia",
        "Washington", "West Virginia", "Wisconsin",
        "Wyoming"],
        valueTime: new Date(2018, 9, 10, 18, 40)
    };
  },
  mounted() {
      this.list = this.states.map(item => {
        return { value: item, label: item };
      });
    },
  methods: {
    onSubmit() {
        console.log('submit!');
      },
      remoteMethod(query) {
        if (query !== '') {
          this.loading = true;
          setTimeout(() => {
            this.loading = false;
            this.options4 = this.list.filter(item => {
              return item.label.toLowerCase()
                .indexOf(query.toLowerCase()) > -1;
            });
          }, 200);
        } else {
          this.options4 = [];
        }
      }
    }
};
</script>

<style>
.el-row {
  margin-bottom: 20px;
}
.container {
  max-width: 1200px;
  margin: auto;
}
</style>
