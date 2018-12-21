<template>
  <div>
    <input type="file" name="image" @change="getImage" accept="image/*">
    <img :src="avatar" alt="aa">
    <a href class="btn btn-primary" @click.prevent="upload">Upload</a>
  </div>
</template>

<script>
export default {
  data() {
    return {
      avatar: this.user.avatar
    };
  },
  props: ["user"],
  methods: {
    getImage(e) {
      console.log(e.target.files);
      let image = e.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = e => {
        console.log(e);
        this.avatar = e.target.result;
        console.log(this.avatar);
      };
    },
    upload() {
      axios.post("/upload", { image: this.avatar });
    }
  }
};
</script>

<style>
</style>
