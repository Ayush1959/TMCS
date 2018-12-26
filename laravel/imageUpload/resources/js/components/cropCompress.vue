<template>
  <s-upload
    :init-src="ruleForm.photo"
    @uploadImg="changeImg"
    field="localFile"
    url="/wcsphp/uploadfile.php"
    textShow="true"
  ></s-upload>
</template>
<script>
import SUpload from "vue-image-crop-compress-upload/stager-image-crop-compress-upload.vue";

export default {
  components: {
    SUpload
  },
  methods: {
    changeImg(imageData) {
      console.log(imageData);
    }
  }
};
</script> 
 
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.user-info-edit-form-wrapper {
  width: 30rem;
  margin: 0 auto;
}
.vue-image-crop-upload
  .vicp-wrap
  .vicp-step2
  .vicp-crop
  .vicp-crop-left
  .vicp-img-container
  .vicp-img-shade {
  background: none;
}
</style> 