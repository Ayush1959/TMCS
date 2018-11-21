<template>
    <div class="container">
        <div v-html="dataSel"></div>
        <button @click="boldtxt"> B </button>
        <button @click="italictxt"> I </button>
        <button @click="striketxt"> S </button>
        <!-- <button> U </button> -->
        <form action="">
            <textarea @input="submit" name="mytextarea" id="mytextarea" cols="120" rows="20"></textarea>
        </form>
    </div>
</template>

<script>
export default {
  data() {
    return {
      dataSel: null,
      blt: 1,
      ilt: 1,
      slt: 1
    };
  },
  methods: {
    submit() {
      this.dataSel = document.getElementById("mytextarea").value;
    },
    boldtxt() {
      var txtarea = document.getElementById("mytextarea");
      var txtar = document.getElementById("mytextarea").value;
      var start = txtarea.selectionStart;
      var finish = txtarea.selectionEnd;
      var sel = txtarea.value.substring(start, finish);
      if (sel.length > 0) {
        var rep = txtarea.value.substring(start, finish).bold();
        var xx = document.getElementById("mytextarea").value.replace(sel, rep);
      } else {
        if (this.blt > 0) {
          var rep = "<b>";
          var xx = document.getElementById("mytextarea").value.concat(rep);
          this.blt = 0;
        } else {
          var rep = "</b>";
          var xx = document.getElementById("mytextarea").value.concat(rep);
          this.blt = 1;
        }
      }
      this.dataSel = xx;
      document.getElementById("mytextarea").value = this.dataSel;
    },
    italictxt() {
      var txtarea = document.getElementById("mytextarea");
      var txtar = document.getElementById("mytextarea").value;
      var start = txtarea.selectionStart;
      var finish = txtarea.selectionEnd;
      var sel = txtarea.value.substring(start, finish);
      if (sel.length > 0) {
        var rep = txtarea.value.substring(start, finish).italics();
        var xx = document.getElementById("mytextarea").value.replace(sel, rep);
      } else {
        if (this.ilt > 0) {
          var rep = "<i>";
          var xx = document.getElementById("mytextarea").value.concat(rep);
          this.ilt = 0;
        } else {
          var rep = "</i>";
          var xx = document.getElementById("mytextarea").value.concat(rep);
          this.ilt = 1;
        }
      }
      this.dataSel = xx;
      document.getElementById("mytextarea").value = this.dataSel;
    },
    striketxt() {
      var txtarea = document.getElementById("mytextarea");
      var txtar = document.getElementById("mytextarea").value;
      var start = txtarea.selectionStart;
      var finish = txtarea.selectionEnd;
      var sel = txtarea.value.substring(start, finish);
      if (sel.length > 0) {
        var rep = txtarea.value.substring(start, finish).strike();
        var xx = document.getElementById("mytextarea").value.replace(sel, rep);
      } else {
        if (this.slt > 0) {
          var rep = "<strike>";
          var xx = document.getElementById("mytextarea").value.concat(rep);
          this.slt = 0;
        } else {
          var rep = "</strike>";
          var xx = document.getElementById("mytextarea").value.concat(rep);
          this.slt = 1;
        }
      }
      this.dataSel = xx;
      document.getElementById("mytextarea").value = this.dataSel;
    }
  }
};
</script>

<style>
</style>
