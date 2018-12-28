<template>
  <div>
    <!-- <div class="container-fluid">
      <br>
      <div class="col-md-5" style="display:inline;">
        <vue-avatar
          :width="200"
          :height="200"
          ref="vueavatar"
          @vue-avatar-editor:image-ready="onImageReady"
        ></vue-avatar>
      </div>
      <div class="col-md-5" style="display:inline;">
        <img :src="avatar" alt="image">
      </div>
    </div>
    <br>
    <br>-->
    <img :src="avatar" alt="image">
    <br>
    <br>
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
    <!-- </div> -->
    <!-- <div class="col-md-6"> -->
    <!-- </div> -->
    <!-- </div> -->
    <br>
    <div class="progress">
      <div
        class="progress-bar progress-bar-striped progress-bar-animated"
        :style="{ width: progressBar + '%' }"
        v-if="progressBar !== 100"
      ></div>
      <div class="progress-bar" :style="{ width: progressBar + '%' }" v-else>Uploaded</div>
      <!-- <div v-else>Uploaded</div> -->
    </div>
    <!-- <img src id="img-1"> -->
    <br>
    <button v-on:click="saveClicked" v-if="progressBar !== 100">Upload</button>
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
      avatar: `profile_pics/${this.user.image}`,
      croppedImage: null,
      progressBar: 0,
      imageData: null
    };
  },
  props: ["user"],
  watch: {
    imageData: function() {
      this.avatar = `profile_pics/${this.imageData}`;
    }
  },
  methods: {
    onChangeScale(scale) {
      this.$refs.vueavatar.changeScale(scale);
    },
    saveClicked() {
      var img = this.$refs.vueavatar.getImageScaled();
      // use img
      this.croppedImage = img.toDataURL();
      this.image = this.croppedImage;
      var x = this;
      axios
        .post(
          "http://127.0.0.1:8000/uploadProfilePic",
          { img: this.image },
          {
            onUploadProgress: progressEvent => {
              const totalLength = progressEvent.lengthComputable
                ? progressEvent.total
                : progressEvent.target.getResponseHeader("content-length") ||
                  progressEvent.target.getResponseHeader(
                    "x-decompressed-content-length"
                  );
              //   console.log("onUploadProgress", totalLength);
              if (totalLength !== null) {
                this.updateProgressBarValue(
                  Math.round((progressEvent.loaded * 100) / totalLength)
                );
              }
            }
          }
        )
        .then(response => {
          //   console.log(response.data);
          x.imageData = response.data.data;
        });
      //   console.log(this.croppedImage);
    },
    updateProgressBarValue(e) {
      //   console.log(e);
      this.progressBar = e;
    },
    onImageReady(scale) {
      //   console.log("eee");
      this.progressBar = 0;

      this.$refs.vueavatarscale.setScale(scale);
    }
  }
};
</script>

<style>
</style>
