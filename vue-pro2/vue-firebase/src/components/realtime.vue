<template>
  <div>
    <div id="chat" class="container">
      <!-- <h1>Vue School Chat Room</h1> -->
      <!-- Messages -->
      <div v-for="message in messages" class="card">
        <div class="card-body">
          <!-- nickname -->
          <h6 class="card-subtitle mb-2 text-muted">{{ message.nickname }}</h6>
          <!-- content -->
          <p class="card-text">{{ message.text }}</p>
          <a href="#" @click.prevent="deleteMessage(message)" class="card-link">Delete</a>
        </div>
      </div>
      <hr>
      <!-- New Message -->
      <form @submit.prevent="storeMessage">
        <div class="form-group">
          <label>Message:</label>
          <textarea v-model="messageText" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Nickname:</label>
          <input v-model="nickname" class="form-control">
        </div>
        <button class="btn btn-primary">Send</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
    name: "Wizard",
  data() {
    return {
        messages: [],
      messageText: '',
      nickname: ''
    };
  },
  methods: {
      storeMessage () {
        var x = this    
        const database = firebase.database()
        database.ref('messages').push({text: x.messageText, nickname: x.nickname})
        x.messageText = ''
      },
      deleteMessage(message) {
          const database = firebase.database()
          const messagesRef = database.ref('messages')
          messagesRef.child(message.id).remove()
      }
  },
  created() {
      var x = this
    const database = firebase.database()
    const messagesRef = database.ref('messages')
    database.ref('messages').on('child_added', snapshot => x.messages.push({...snapshot.val(), id: snapshot.key}))
    database.ref('messages').on('child_removed', snapshot => {
     const deletedMessage = x.messages.find(message => message.id === snapshot.key)
     const index = x.messages.indexOf(deletedMessage)
     x.messages.splice(index, 1)
    })
  }
};


</script>

<style>

</style>
