<template>
  <div>
    <img
      width="400"
      :src="cropped"
      alt
      class="rounded mx-auto d-block img-thumbnail"
      style="min-height: 400px;"
      @change="setUpFileUploader"
    >
    <!-- Note that 'ref' is important here (value can be anything). read the description about `ref` below. -->
    <vue-croppie ref="croppieRef" :enableOrientation="true" @result="result" @update="update"></vue-croppie>

    <!-- the result -->
    <!-- <img v-bind:src="cropped"> -->
    <button @click="bind()">Bind</button>
    <!-- Rotate angle is Number -->
    <button @click="rotate(-90)">Rotate Left</button>
    <button @click="rotate(90)">Rotate Right</button>
    <button @click="crop()">Crop Via Callback</button>
    <!-- <button @click="cropViaEvent()">Crop Via Event</button> -->
  </div>
</template>
 
<script>
export default {
  mounted() {
    // Upon mounting of the component, we accessed the .bind({...})
    // function to put an initial image on the canvas.
    this.$refs.croppieRef.bind({
      url: "storage/719623.png"
    });
    this.cropViaEvent();
    // this.cropped = this.url;
  },
  data() {
    return {
      cropped: null,
      images: [
        "storage/57.jpg",
        "storage/67.png",
        "storage/photo.jpg",
        "storage/action.jpg"
      ],
      modalVisible: null,
      button: null,
      canUpload: null
    };
  },
  methods: {
    setUpFileUploader(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) {
        return;
      }
      this.createImage(files[0]);
    },
    createImage(file) {
      var image = new Image();
      var reader = new FileReader();
      var vm = this;
      reader.onload = e => {
        vm.image = e.target.result;
        vm.$emit("imgUploaded", e.target.result);
      };
      reader.readAsDataURL(file);
    },
    uploadFile() {
      this.canUpload = false;
      this.button = {
        name: "Uploading...",
        class: "fa-refresh fa-spin"
      };
      this.croppie
        .result({
          type: "canvas",
          size: "viewport"
        })
        .then(response => {
          this.image = response;
          this.axios
            .post(uploadProfilePic, { img: this.image })
            .then(response => {
              this.canUpload = true;
              this.modalVisible = false;
              this.button = {
                name: "Upload",
                class: "fa-upload"
              };
            });
        });
    },
    bind() {
      // Randomize cat photos, nothing special here.
      let url = this.images[Math.floor(Math.random() * 4)];

      // Just like what we did with .bind({...}) on
      // the mounted() function above.
      this.$refs.croppieRef.bind({
        url: url
      });
      this.cropViaEvent();
    },
    // CALBACK USAGE
    crop() {
      // Here we are getting the result via callback function
      // and set the result to this.cropped which is being
      // used to display the result above.
      let options = {
        format: "jpeg",
        circle: true
      };
      this.$refs.croppieRef.result(options, output => {
        this.cropped = output;
      });
      this.uploadFile();
      // alert(this.cropped);
    },
    // EVENT USAGE
    cropViaEvent() {
      this.$refs.croppieRef.result();
    },
    result(output) {
      this.cropped = output;
    },
    update(val) {
      console.log(val);
      this.cropViaEvent();
    },
    rotate(rotationAngle) {
      // Rotates the image
      this.$refs.croppieRef.rotate(rotationAngle);
      this.cropViaEvent();
    }
  }
};
</script>