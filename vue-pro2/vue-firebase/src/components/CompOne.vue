<template>
  <div>
    <div v-if="authUser">
      <h2>Signed in as {{ authUser.email }}</h2>
      <img src="authUser.photoURL" height="150">
      <p>Hey {{ authUser.displayName || 'Friend' }}</p>
      <button @click="signOut">Sign Out</button>
    </div>
    <form @submit.prevent="register" v-else>
      <h2>Register</h2>
      <input type="email" name="email" id="email" v-model="email">
      <input type="password" name="password" id="password" v-model="password">
      <button>Register</button>
    </form>
    <form @submit.prevent="signIn" v-if="!authUser">
      <h2>signIn</h2>
      <input type="email" name="email" id="email" v-model="email">
      <input type="password" name="password" id="password" v-model="password">
      <button>Sign In</button>
    </form>
    <div v-if="!authUser">
      <h1>Sign in with google</h1>
      <button @click="signInWithGoogle">G-SignIn</button>
    </div>
  </div>
</template>

<script>
export default {
    name: "Wizard",
  data() {
    return {
      email: "",
      password: "",
      authUser: null
    };
  },
  methods: {
    register() {
        firebase.auth().createUserWithEmailAndPassword(this.email,this.password)
            .then(() => console.log('all Good'))
            .catch(error => alert(error.message))
    },
    signOut() {
        firebase.auth().signOut()
    },
    signIn() {
        firebase.auth().signInWithEmailAndPassword(this.email,this.password)
           .then(() => console.log('all Good'))
            .catch(error => alert(error.message))
    },
    signInWithGoogle() {
        const provider = new firebase.auth.GoogleAuthProvider()
        firebase.auth().signInWithPopup(provider)
            .then(data => console.log(data.user, data.credential.accessToken))
            .catch(error => alert(error.message))
    },
    linkWithGoogle() {
        const provider = new firebase.auth.GoogleAuthProvider()
        this.authUser.linkWithPopup(provider)
            .then(data => console.log(data.user, data.credential.accessToken))
            .catch(error => alert(error.message))
    },
    updateProfile() {
        this.authUser.updateProfile({
            displayName: this.displayName,
            photoURL: this.photoURL
        })
    },
    updateEmail(){
        this.authUser.updateEmail(this.email)
    },
    updatePassword(){
        this.authUser.updatePassword(this.newPassword)
    }
  },
  created() {
      firebase.auth().onAuthStateChanged(user => { this.authUser = user })
  }
};
</script>

<style>

</style>
