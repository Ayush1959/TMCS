<template>
  <nav class="cnnt">
    <div class="col-md-10">
      <ul class="pagination justify-content-center wid">
        <li class="page-item" v-if="arrayLn()">
          <a class="page-link" @click="newUrl(1)">First</a>
        </li>
        <li class="page-item" :class="{'disabled':(current_page == 1)}">
          <a class="page-link" @click="newUrl(current_page -1)">Previous</a>
        </li>
        <li class="page-item" v-for="pages in displaylist">
          <a
            class="page-link"
            @click="newUrl(pages)"
            :class="{'active':(pages == current_page)}"
          >{{ pages }}</a>
        </li>
        <li class="page-item" :class="{'disabled':(current_page == lastPage)}">
          <a class="page-link" @click="newUrl(current_page +1)">Next</a>
        </li>
        <li class="page-item" v-if="arrayLn()">
          <a class="page-link" @click="newUrl(lastPage)">Last</a>
        </li>
      </ul>
    </div>
    <div class="col-md-2">
      <form>
        <select v-model="selectPageNo" class="form-control" id="noPage" v-on:change="onChange()">
          <option>10</option>
          <option v-for="option in totalEl()" :value="option">{{ option }}</option>
        </select>
      </form>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      displayPageNo: null,
      displayCheckValue: null,
      lastpageValue: null,
      selectPageNo: 10,
      current_pageValue: null,
      totalPage: null
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
    },
    totalElements: {
      type: Number
    }
  },
  mounted: function() {
    // console.log(this.lastPage);
  },
  methods: {
    totalEl() {
      var a = [];
      this.totalPage = Math.ceil(this.totalElements / 100);
      var j = 0;
      // b = this.totalElements;
      for (var i = 1; i <= this.totalPage; i++) {
        a.push(j + 100);
        j += 100;
      }
      // while (b--) a[b] = b + 5;
      return a;
    },
    newUrl(index) {
      this.$emit("newUrl", index);
    },
    onChange() {
      this.$emit("PageNo", this.selectPageNo);
    },
    arrayLn() {
      if (this.displaylist.length == 1) {
        return false;
      } else {
        return true;
      }
    },
    displayPageNew(index) {
      // console.log(this.total);
      // console.log(this.lastPage);
      // console.log(this.current_page);
    }
  }
};
</script>

<style scoped>
.wid {
  width: 100%;
}
.cnnt {
  margin: inherit;
}
.disabled {
  color: currentColor;
  cursor: not-allowed;
  opacity: 0.5;
  text-decoration: none;
  pointer-events: none;
}
.pdd {
  padding-right: 0px;
  padding-left: 10px;
}
.pagination {
  display: inline-block;
}
.pagination li {
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
  cursor: pointer;
}
</style>
