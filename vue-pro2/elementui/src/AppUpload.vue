<template>
  <div>
    <el-upload
      action="http://localhost/ayush/vue-pro2/api/formupload"
      :http-request="addAttachment"
      :on-remove="deleteAttachment"
      :file-list="attachments"
    >
      <el-button size="mini" type="primary">Add file</el-button>
    </el-upload>
    {{ attachments }}
  </div>
</template>

<script>
export default {
  data() {
    return {
      attachments: []
    };
  },

  methods: {
    addAttachment(file, fileList) {
      this.attachments.push(file);
    },

    deleteAttachment() {
      // removes from array
    }
  }
};
</script>