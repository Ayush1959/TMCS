import Vue from 'vue'
import App from './App.vue'

// Initialize Firebase
var config = {
  apy: "Ac",
  amain: "vfirebasom",
  daeURL: "https://vuejs-htio.com",
  prectId: "vuejs-ht0",
  stBucket: "vuot.com",
  megSenderId: "15592"
};
firebase.initializeApp(config);



new Vue({
  el: '#app',
  render: h => h(App)
})
export default {
  createUser({
    state,
    commit
  }, {
    email,
    name,
    username,
    avatar = null
  }) {
    return new Promise((resolve, reject) => {
      const registeredAt = Math.floor(Date.now() / 1000)
      const usernameLower = username.toLowerCase()
      email = email.toLowerCase()
      const user = {
        avatar,
        email,
        name,
        username,
        usernameLower,
        registeredAt
      }
      const userId = firebase.database().ref('users').push().key
      firebase.database().ref('users').child(userId).set(user)
        .then(() => {
          commit('setItem', {
            resource: 'users',
            id: userId,
            item: user
          })
          resolve(state.users[userId])
        })
    })
  }
}
