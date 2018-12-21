<template>
  <div>
    <el-upload
      class="upload-demo"
      drag
      action="http://localhost/ayush/vue-pro2/api/formupload"
      :on-success="handleSuccess"
      :file-list="fileList"
      multiple
    >
      <i class="el-icon-upload"></i>
      <div class="el-upload__text">
        Drop file here or
        <em>click to upload</em>
      </div>
      <div class="el-upload__tip" slot="tip">jpg/png files with a size less than 500kb</div>
    </el-upload>
    <!-- <el-color-picker v-model="color5" show-alpha :predefine="predefineColors"></el-color-picker> -->
    <!-- {{ color5 }} -->
    <!-- <el-transfer v-model="value1" :data="data"></el-transfer>
    <el-button class="btn btn-default" type="primary" size="mini">Create</el-button>-->
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
    handleSuccess(response, file, fileList) {
      var vm = this;
      _.map(response, function(data) {
        file["uid"] = data;
      });
      vm.fileList = fileList;
    },
    upload() {
      axios
        .post("http://localhost/ayush/vue-pro2/api/formUserEmail", {
          email: this.form.email
        })
        .then(function(response) {
          if (response.data.Sucsess == 200) {
          } else {
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }

  // const generateData = _ => {
  //   const data = [];
  //   for (let i = 1; i <= 15; i++) {
  //     data.push({
  //       key: i,
  //       label: `Option ${i}`,
  //       disabled: i % 4 === 0
  //     });
  //   }
  //   return data;
  // };
  // return {
  //   data: generateData(),
  //   value1: [1, 4]
  // };
  // return {
  //   color5: "rgba(255, 69, 0, 0.68)",
  //   predefineColors: [
  //     "#ff4500",
  //     "#ff8c00",
  //     "#ffd700",
  //     "#90ee90",
  //     "#00ced1",
  //     "#1e90ff",
  //     "#c71585",
  //     "rgba(255, 69, 0, 0.68)",
  //     "rgb(255, 120, 0)",
  //     "hsv(51, 100, 98)",
  //     "hsva(120, 40, 94, 0.5)",
  //     "hsl(181, 100%, 37%)",
  //     "hsla(209, 100%, 56%, 0.73)",
  //     "#c7158577"
  //   ]
  // };
  // }
};
</script>

<style>
.bttn {
  background-color: chocolate;
}
</style>
