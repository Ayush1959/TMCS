<template>
  <div>
    <img :src="croppedImage" alt="image">
    <vue-avatar
      :width="200"
      :height="200"
      ref="vueavatar"
      @vue-avatar-editor:image-ready="onImageReady"
    ></vue-avatar>
    <br>
    <vue-avatar-scale
      ref="vueavatarscale"
      @vue-avatar-editor-scale:change-scale="onChangeScale"
      :width="250"
      :min="1"
      :max="3"
      :step="0.02"
    ></vue-avatar-scale>
    <br>
    <img src id="img-1">
    <button v-on:click="saveClicked">Click</button>
  </div>
</template>

<script>
import Vue from "vue";
import VueAvatar from "../vue-avatar-editor/src/components/VueAvatar.vue";
import VueAvatarScale from "../vue-avatar-editor/src/components/VueAvatarScale.vue";
export default {
  components: {
    VueAvatar,
    VueAvatarScale
  },
  data() {
    return {
      croppedImage: null,
      cropImage: null,
      file: null
    };
  },
  methods: {
    onChangeScale(scale) {
      this.$refs.vueavatar.changeScale(scale);
    },
    saveClicked() {
      var img = this.$refs.vueavatar.getImageScaled();
      var img1 = img.getContext("2d");
      // var img1 = img.toBlob(function(blob) {
      //   var newImg = document.createElement("img"),
      //     url = URL.createObjectURL(blob);

      //   newImg.onload = function() {
      //     // no longer need to read the blob so it's revoked
      //     URL.revokeObjectURL(url);
      //   };

      //   newImg.src = url;
      //   document.body.appendChild(newImg);
      // });
      console.log(img1);
      //   var img1 = img.getImageData();
      // use img
      //   console.log(img); //canvas
      //   console.log(img1);

      this.croppedImage = img.toDataURL();
      //   this.cropImage = img.toDataURL("image/jpeg");
      console.log(this.croppedImage); //base64 url
      //   console.log(this.cropImage); //base64 url
      //   this.read(img);
      let form = new FormData();
      form.append("image", img);
      this.file = form;
      // console.log(this.file);

      axios.post("/saveImage", this.file);
      //   axios.post("/upload", { image: this.croppedImage });
    },
    onImageReady(scale) {
      this.$refs.vueavatarscale.setScale(scale);
    },
    read(image) {
      let reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = e => {
        console.log(e);
        this.avatar = e.target.result;
      };
    },
    blobb(blob) {
      var newImg = document.createElement("img"),
        url = URL.createObjectURL(blob);

      newImg.onload = function() {
        // no longer need to read the blob so it's revoked
        URL.revokeObjectURL(url);
      };

      newImg.src = url;
      document.body.appendChild(newImg);
    }
  }
};
</script>

<style>
</style>
