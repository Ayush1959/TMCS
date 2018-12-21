<template>
  <div>
    <input type="file" name="image" @change="getImage" accept="image/*">
    <img :src="avatar" alt="aa">
    <a href class="btn btn-primary" @click.prevent="upload">Upload</a>
    <!-- {{ file }}
    {{ avatar }}-->
  </div>
</template>

<script>
export default {
  data() {
    return {
      avatar: `storage/${this.user.image}`,
      file: null
    };
  },
  props: ["user"],
  methods: {
    getImage(e) {
      let image = e.target.files[0];
      console.log(e.target.files);
      this.read(image);
      console.log(image);
      let form = new FormData();
      form.append("image", image);
      this.file = form;
    },
    upload() {
      axios.post("/saveImage", this.file);
    },
    read(image) {
      let reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = e => {
        console.log(e);
        this.avatar = e.target.result;
      };
    }
  }
};
</script>

<style>
</style>
