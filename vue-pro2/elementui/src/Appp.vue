<template>
  <div>
    <el-upload
      class="upload-demo"
      action="http://localhost/ayush/vue-pro2/api/formupload"
      name="file[]"
      :on-success="handleSuccess"
      :on-remove="handleRemove"
      :before-remove="beforeRemove"
      multiple
      :limit="3"
      :on-exceed="handleExceed"
      :file-list="fileList"
    >
      <el-button size="small" type="primary">Click to upload</el-button>
      <div slot="tip" class="el-upload__tip">jpg/png files with a size less than 500kb</div>
    </el-upload>
  </div>
</template>
<script>
export default {
  data() {
    return {
      fileList: []
    };
  },
  methods: {
    handleRemove(file, fileList) {
      let vm = this;
      axios
        .delete("/api/upload/" + file.uid)
        .then(function() {
          let index = _.findIndex(vm.fileList, ["uid", file.uid]);
          vm.$delete(vm.fileList, index);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    handleSuccess(response, file, fileList) {
      var vm = this;
      _.map(response, function(data) {
        file["uid"] = data;
      });
      vm.fileList = fileList;
    },
    handleExceed(files, fileList) {
      this.$message.warning(
        `The limit is 3, you selected ${
          files.length
        } files this time, add up to ${files.length + fileList.length} totally`
      );
    },
    beforeRemove(file, fileList) {
      return this.$confirm(`do you really want to delete ${file.name}？`);
    }
  }
};
</script>