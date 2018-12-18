<template>
  <nav>
    <ul class="pagination justify-content-center wid">
      <div class="col-md-2">
        <li class="page-item" v-if="current_page !== 1">
          <a class="page-link" @click="newUrl(current_page -1)">Previous</a>
        </li>
      </div>
      <div class="col-md-1">
        <li class="page-item">
          <a class="page-link" @click="newUrl(1)">First</a>
        </li>
      </div>
      <div class="col-md-3">
        <li class="page-item" v-for="pages in displaylist">
          <a class="page-link" @click="newUrl(pages)">{{ pages }}</a>
        </li>
      </div>
      <div class="col-md-1">
        <li class="page-item">
          <a class="page-link" @click="newUrl(lastPage)">Last</a>
        </li>
      </div>
      <div class="col-md-1 col-md-offset-1">
        <li class="page-item" v-if="current_page !== lastPage">
          <a class="page-link" @click="newUrl(current_page +1)">Next</a>
        </li>
      </div>
    </ul>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      displayPageNo: null,
      displayCheckValue: null,
      lastpageValue: null,
      current_pageValue: null
      // displaylist: [],
    };
  },
  props: {
    lastPage: {
      type: Number
    },
    current_page: {
      type: Number
    },
    total: {
      type: Number
    },
    displaylist: {
      required: true
    }
  },
  mounted: function() {
    console.log(this.lastPage);
    // this.displayPage(1);
    // this.displayPage(2);
  },
  methods: {
    newUrl(index) {
      // this.displayPage(index);
      this.$emit("newUrl", index);
    },
    // displayPage(index) {
    //   this.displaylist = [];
    //   if (!this.current_page) {
    //     this.displaylist = [1];
    //   } else if (this.current_page === 1) {
    //     this.displaylist.push(index);
    //     this.displaylist.push(index + 1);
    //     this.displaylist.push(index + 2);
    //   } else if (this.current_page < this.lastPage - 1) {
    //     this.displaylist.push(index - 1);
    //     this.displaylist.push(index);
    //     this.displaylist.push(index + 1);
    //   } else if (this.current_page == this.lastPage) {
    //     this.displaylist.push(index - 2);
    //     this.displaylist.push(index - 1);
    //     this.displaylist.push(index);
    //   } else {
    //     this.displaylist.push(index - 2);
    //     this.displaylist.push(index - 1);
    //     this.displaylist.push(index);
    //   }
    //   console.log(this.lastPage);
    //   console.log(this.current_page);
    // },
    displayPageNew(index) {
      console.log(this.total);
      console.log(this.lastPage);
      console.log(this.current_page);
      //   this.displaylist = [];
      //   if (this.lastPage == 1) {
      //     this.displaylist.push(1);
      //   } else if (index < this.lastpage - 2) {
      //     this.displaylist.push(index);
      //     this.displaylist.push(index + 1);
      //     this.displaylist.push(index + 2);
      //   } else {
      //     this.displaylist.push(this.lastPage);
      //     this.displaylist.push(this.lastPage - 1);
      //     // this.displaylist.push(index + 2);
      //   }
    }
  }
};
</script>

<style scoped>
.wid {
  width: 100%;
}
.pagination {
  display: inline-block;
}
.pagination li {
  display: inline-block;
}
.pagination div {
  display: inline-block;
}
.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color 0.3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a.active {
  background-color: #4caf50;
  color: white;
  border: 1px solid #4caf50;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
}
</style>
