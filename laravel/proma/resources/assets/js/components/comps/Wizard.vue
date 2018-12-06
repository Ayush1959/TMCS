<template>
  <div>
    <!-- <h1>Hey!!</h1> -->
    <aside class="sidebar">
      <!-- <h3>Contents</h3> -->
      <nav class="bgb">
        <ul>
          <!-- <li>
            <p class="nav_title">DASHBOARD</p>
          </li>-->
          <li>
            <router-link :to="{name: 'dataCreate'}" class="btn btn-success">Project</router-link>
          </li>
          <li>
            <p class="nav_title">User</p>
          </li>
          <!-- <li>Chapter 9</li>
          <li>Chapter 10</li>-->
        </ul>
      </nav>
    </aside>
  </div>
</template>

<script>
export default {};
</script>

<style>
.sidebar {
  width: 11%;
  /* width: 150px; */
  background-color: #00000050;
  left: 0;
}
.nav_title {
  /* text-align: center; */
  font-weight: 500;
}
.bgb {
  background-color: black;
}
</style>
