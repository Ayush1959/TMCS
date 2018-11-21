<template>
  <div>
    <div>
    <Picker/>
    <editor-content :editor="editor" />  
    </div>   
    <!-- Actions -->
      <div class="buttons">        
        <button
          @click="goNext"
          class="btn"
        >submit</button>
      </div>
      <div class="loading-wrapper" v-if="nxt === 'pending'">
      <div class="loader">
        <!-- <img src="../assets/spinner.svg" alt="spinner"> -->
        <p>Please Wait we are hitting our servers</p>
      </div>
    </div>
  </div>
</template>

<script>
import Picker from "./Picker";
import Editor from "../../node_modules/tiptap/src/Editor";
import EditorContent from "../../node_modules/tiptap/src/Components/EditorContent";

export default {
  name: "Wizard",
  components: {
    Picker,
    EditorContent
  },
  data() {
    return {
      editor: null
    };
  },
  methods: {
    goNext() {
      var x = this;
    }
  },
  mounted() {
    this.editor = new Editor({
      content: "<p>This is just a boring paragraph</p>"
    });
  },
  beforeDestroy() {
    this.editor.destroy();
  }
};
</script>

<style>
</style>
