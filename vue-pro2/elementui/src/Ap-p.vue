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
      <el-table
        v-loading="loading2"
        element-loading-text="Loading..."
        element-loading-spinner="el-icon-loading"
        element-loading-background="rgba(0, 0, 0, 0.8)"
        :data="tableData"
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
      <el-button :plain="true" @click="open">Show message</el-button>
      <el-button :plain="true" @click="openVn">VNode</el-button>
      <el-button type="text" @click="openAl">Click to open the Message Box</el-button>
      <el-button type="text" @click="open3">Click to open Message Box</el-button>
      <el-button
        plain
        @click="openAu">
        Closes automatically
      </el-button>
      <el-button
        plain
        @click="open2NAu">
        Won't close automatically
        </el-button>
      </div>
    <div v-if="radio1 == 11">
        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
          <el-menu-item index="1">Processing Center</el-menu-item>
          <el-submenu index="2">
          <template slot="title">Workspace</template>
          <el-menu-item index="2-1">item one</el-menu-item>
          <el-menu-item index="2-2">item two</el-menu-item>
          <el-menu-item index="2-3">item three</el-menu-item>
          <el-submenu index="2-4">
            <template slot="title">item four</template>
            <el-menu-item index="2-4-1">item one</el-menu-item>
            <el-menu-item index="2-4-2">item two</el-menu-item>
            <el-menu-item index="2-4-3">item three</el-menu-item>
          </el-submenu>
          </el-submenu>
          <el-menu-item index="3" disabled>Info</el-menu-item>
          <el-menu-item index="4"><a href="https://www.ele.me" target="_blank">Orders</a></el-menu-item>
          </el-menu>

        <div class="line"></div>
        <el-menu
          :default-active="activeIndex2"
          class="el-menu-demo"
          mode="horizontal"
          @select="handleSelect"
          background-color="#545c64"
          text-color="#fff"
          active-text-color="#ffd04b">
          <el-menu-item index="1">Processing Center</el-menu-item>
          <el-submenu index="2">
            <template slot="title">Workspace</template>
            <el-menu-item index="2-1">item one</el-menu-item>
            <el-menu-item index="2-2">item two</el-menu-item>
            <el-menu-item index="2-3">item three</el-menu-item>
            <el-submenu index="2-4">
              <template slot="title">item four</template>
              <el-menu-item index="2-4-1">item one</el-menu-item>
              <el-menu-item index="2-4-2">item two</el-menu-item>
              <el-menu-item index="2-4-3">item three</el-menu-item>
            </el-submenu>
          </el-submenu>
          <el-menu-item index="3" disabled>Info</el-menu-item>
          <el-menu-item index="4"><a href="https://www.ele.me" target="_blank">Orders</a></el-menu-item>
          </el-menu>

        <el-row class="tac">
            <el-col :span="12">
              <h5>Default colors</h5>
              <el-menu
                default-active="2"
                class="el-menu-vertical-demo"
                @open="handleOpen"
                @close="handleClose">
                <el-submenu index="1">
                  <template slot="title">
                    <i class="el-icon-location"></i>
                    <span>Navigator One</span>
                  </template>
                  <el-menu-item-group title="Group One">
                    <el-menu-item index="1-1">item one</el-menu-item>
                    <el-menu-item index="1-2">item one</el-menu-item>
                  </el-menu-item-group>
                  <el-menu-item-group title="Group Two">
                    <el-menu-item index="1-3">item three</el-menu-item>
                  </el-menu-item-group>
                  <el-submenu index="1-4">
                    <template slot="title">item four</template>
                    <el-menu-item index="1-4-1">item one</el-menu-item>
                  </el-submenu>
                </el-submenu>
                <el-menu-item index="2">
                  <i class="el-icon-menu"></i>
                  <span>Navigator Two</span>
                </el-menu-item>
                <el-menu-item index="3" disabled>
                  <i class="el-icon-document"></i>
                  <span>Navigator Three</span>
                </el-menu-item>
                <el-menu-item index="4">
                  <i class="el-icon-setting"></i>
                  <span>Navigator Four</span>
                </el-menu-item>
              </el-menu>
            </el-col>
            <el-col :span="12">
              <h5>Custom colors</h5>
              <el-menu
                default-active="2"
                class="el-menu-vertical-demo"
                @open="handleOpen"
                @close="handleClose"
                background-color="#545c64"
                text-color="#fff"
                active-text-color="#ffd04b">
                <el-submenu index="1">
                  <template slot="title">
                    <i class="el-icon-location"></i>
                    <span>Navigator One</span>
                  </template>
                  <el-menu-item-group title="Group One">
                    <el-menu-item index="1-1">item one</el-menu-item>
                    <el-menu-item index="1-2">item one</el-menu-item>
                  </el-menu-item-group>
                  <el-menu-item-group title="Group Two">
                    <el-menu-item index="1-3">item three</el-menu-item>
                  </el-menu-item-group>
                  <el-submenu index="1-4">
                    <template slot="title">item four</template>
                    <el-menu-item index="1-4-1">item one</el-menu-item>
                  </el-submenu>
                </el-submenu>
                <el-menu-item index="2">
                  <i class="el-icon-menu"></i>
                  <span>Navigator Two</span>
                </el-menu-item>
                <el-menu-item index="3" disabled>
                  <i class="el-icon-document"></i>
                  <span>Navigator Three</span>
                </el-menu-item>
                <el-menu-item index="4">
                  <i class="el-icon-setting"></i>
                  <span>Navigator Four</span>
                </el-menu-item>
              </el-menu>
            </el-col>
            </el-row>
        <el-tabs v-model="activeName" @tab-click="handlerClick">
            <el-tab-pane label="User" name="first">User</el-tab-pane>
            <el-tab-pane label="Config" name="second">Config</el-tab-pane>
            <el-tab-pane label="Role" name="third">Role</el-tab-pane>
            <el-tab-pane label="Task" name="fourth">Task</el-tab-pane>
          </el-tabs>
        <el-breadcrumb separator="/">
          <el-breadcrumb-item :to="{ path: '/' }">homepage</el-breadcrumb-item>
          <el-breadcrumb-item><a href="/">promotion management</a></el-breadcrumb-item>
          <el-breadcrumb-item>promotion list</el-breadcrumb-item>
          <el-breadcrumb-item>promotion detail</el-breadcrumb-item>
          </el-breadcrumb>
        <el-dropdown>
          <span class="el-dropdown-link">
            Dropdown List<i class="el-icon-arrow-down el-icon--right"></i>
          </span>
          <el-dropdown-menu slot="dropdown">
            <el-dropdown-item>Action 1</el-dropdown-item>
            <el-dropdown-item>Action 2</el-dropdown-item>
            <el-dropdown-item>Action 3</el-dropdown-item>
            <el-dropdown-item>Action 4</el-dropdown-item>
            <el-dropdown-item>Action 5</el-dropdown-item>
            </el-dropdown-menu>
          </el-dropdown>
        <el-dropdown trigger="click">
          <el-button type="primary">
            Dropdown List<i class="el-icon-arrow-down el-icon--right"></i>
          </el-button>
          <el-dropdown-menu slot="dropdown">
            <el-dropdown-item>Action 1</el-dropdown-item>
            <el-dropdown-item>Action 2</el-dropdown-item>
            <el-dropdown-item>Action 3</el-dropdown-item>
            <el-dropdown-item>Action 4</el-dropdown-item>
            <el-dropdown-item>Action 5</el-dropdown-item>
            </el-dropdown-menu>
          </el-dropdown>
        <el-steps :active="1">
          <el-step title="Step 1" description="Some description"></el-step>
          <el-step title="Step 2" description="Some description"></el-step>
          <el-step title="Step 3" description="Some description"></el-step>
          </el-steps>
        <div class="box">
            <div class="top">
              <el-tooltip class="item" effect="dark" content="Top Left prompts info" placement="top-start">
                <el-button>top-start</el-button>
              </el-tooltip>
              <el-tooltip class="item" effect="dark" content="Top Center prompts info" placement="top">
                <el-button>top</el-button>
              </el-tooltip>
              <el-tooltip class="item" effect="dark" content="Top Right prompts info" placement="top-end">
                <el-button>top-end</el-button>
              </el-tooltip>
            </div>
            <div class="left">
              <el-tooltip class="item" effect="dark" content="Left Top prompts info" placement="left-start">
                <el-button>left-start</el-button>
              </el-tooltip>
              <el-tooltip class="item" effect="dark" content="Left Center prompts info" placement="left">
                <el-button>left</el-button>
              </el-tooltip>
              <el-tooltip class="item" effect="dark" content="Left Bottom prompts info" placement="left-end">
                <el-button>left-end</el-button>
              </el-tooltip>
            </div>

            <div class="right">
              <el-tooltip class="item" effect="dark" content="Right Top prompts info" placement="right-start">
                <el-button>right-start</el-button>
              </el-tooltip>
              <el-tooltip class="item" effect="dark" content="Right Center prompts info" placement="right">
                <el-button>right</el-button>
              </el-tooltip>
              <el-tooltip class="item" effect="dark" content="Right Bottom prompts info" placement="right-end">
                <el-button>right-end</el-button>
              </el-tooltip>
            </div>
            <div class="bottom">
              <el-tooltip class="item" effect="dark" content="Bottom Left prompts info" placement="bottom-start">
                <el-button>bottom-start</el-button>
              </el-tooltip>
              <el-tooltip class="item" effect="dark" content="Bottom Center prompts info" placement="bottom">
                <el-button>bottom</el-button>
              </el-tooltip>
              <el-tooltip class="item" effect="dark" content="Bottom Right prompts info" placement="bottom-end">
                <el-button>bottom-end</el-button>
              </el-tooltip>
            </div>
          </div>
        <el-popover
          placement="top-start"
          title="Title"
          width="200"
          trigger="hover"
          content="this is content, this is content, this is content">
          <el-button slot="reference">Hover to activate</el-button>
        </el-popover>

        <el-popover
          placement="bottom"
          title="Title"
          width="200"
          trigger="click"
          content="this is content, this is content, this is content">
          <el-button slot="reference">Click to activate</el-button>
        </el-popover>

        <el-popover
          ref="popover"
          placement="right"
          title="Title"
          width="200"
          trigger="focus"
          content="this is content, this is content, this is content">
        </el-popover>
        <el-button v-popover:popover>Focus to activate</el-button>

        <el-popover
          placement="bottom"
          title="Title"
          width="200"
          trigger="manual"
          content="this is content, this is content, this is content"
          v-model="visible">
          <el-button slot="reference" @click="visible = !visible">Manual to activate</el-button>
        </el-popover>
      <el-carousel :interval="4000" type="card" height="200px">
        <el-carousel-item v-for="item in 6" :key="item">
          <h3>{{ item }}</h3>
        </el-carousel-item>
        </el-carousel>
      <el-collapse v-model="activeNames" @change="handleChange">
        <el-collapse-item title="Consistency" name="1">
          <div>Consistent with real life: in line with the process and logic of real life, and comply with languages and habits that the users are used to;</div>
          <div>Consistent within interface: all elements should be consistent, such as: design style, icons and texts, position of elements, etc.</div>
        </el-collapse-item>
        <el-collapse-item title="Feedback" name="2">
          <div>Operation feedback: enable the users to clearly perceive their operations by style updates and interactive effects;</div>
          <div>Visual feedback: reflect current state by updating or rearranging elements of the page.</div>
        </el-collapse-item>
        <el-collapse-item title="Efficiency" name="3">
          <div>Simplify the process: keep operating process simple and intuitive;</div>
          <div>Definite and clear: enunciate your intentions clearly so that the users can quickly understand and make decisions;</div>
          <div>Easy to identify: the interface should be straightforward, which helps the users to identify and frees them from memorizing and recalling.</div>
        </el-collapse-item>
        <el-collapse-item title="Controllability" name="4">
          <div>Decision making: giving advices about operations is acceptable, but do not make decisions for the users;</div>
          <div>Controlled consequences: users should be granted the freedom to operate, including canceling, aborting or terminating current operation.</div>
        </el-collapse-item>
        </el-collapse>
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
      loading2: true,
      activeName: 'first',
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
        valueTime: new Date(2018, 9, 10, 18, 40),
        activeIndex: '1',
        activeIndex2: '1',
        visible: false,
        activeNames: ['1']
    };
  },
  mounted() {
      this.list = this.states.map(item => {
        return { value: item, label: item };
      });
    },
  methods: {
    handleChange(val) {
        console.log(val);
    },
    open() {
        this.$message('This is a message.');
    },      
    openVn() {
        const h = this.$createElement;
        this.$message({
          message: h('p', null, [
            h('span', null, 'Message can be '),
            h('i', { style: 'color: teal' }, 'VNode')
          ])
        });
    },
    onSubmit() {
        console.log('submit!');
    },
    handlerClick(tab, event) {
      console.log(tab, event);
    },
    openAl() {
        this.$alert('This is a message', 'Title', {
          confirmButtonText: 'OK',
          callback: action => {
            this.$message({
              type: 'info',
              message: `action: ${ action }`
            });
          }
        });
    },
    handleOpen(key, keyPath) {
      console.log(key, keyPath);
    },
    handleClose(key, keyPath) {
      console.log(key, keyPath);
    },
    handleSelect(key, keyPath) {
        console.log(key, keyPath);
    },
    open3() {
        this.$prompt('Please input your e-mail', 'Tip', {
          confirmButtonText: 'OK',
          cancelButtonText: 'Cancel',
          inputPattern: /[\w!#$%&'*+/=?^_`{|}~-]+(?:\.[\w!#$%&'*+/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?/,
          inputErrorMessage: 'Invalid Email'
        }).then(({ value }) => {
          this.$message({
            type: 'success',
            message: 'Your email is:' + value
          });
        }).catch(() => {
          this.$message({
            type: 'info',
            message: 'Input canceled'
          });       
        });
    },
    openAu() {
        const h = this.$createElement;
        this.$notify({
          title: 'Title',
          message: h('i', { style: 'color: teal' }, 'This is a reminder')
        });
    },
    open2NAu() {
        this.$notify({
          title: 'Prompt',
          message: 'This is a message that does not automatically close',
          duration: 0
        });
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
.el-carousel__item h3 {
    color: #475669;
    font-size: 14px;
    opacity: 0.75;
    line-height: 200px;
    margin: 0;
  }

  .el-carousel__item:nth-child(2n) {
    background-color: #99a9bf;
  }

  .el-carousel__item:nth-child(2n+1) {
    background-color: #d3dce6;
  }
.box {
    width: 400px;

    .top {
      text-align: center;
    }

    .left {
      float: left;
      width: 110px;
    }

    .right {
      float: right;
      width: 110px;
    }

    .bottom {
      clear: both;
      text-align: center;
    }

    .item {
      margin: 4px;
    }

    .left .el-tooltip__popper,
    .right .el-tooltip__popper {
      padding: 8px 10px;
    }

    .el-button {
      width: 110px;
    }
  }
</style>
