<template>
    <div class="component">
        <h3>You may edit</h3>
        <p>Edit Me</p>
        <p>User age : {{ userAge }}</p>
        <button @click="editAge">Edit age</button>
    </div>
</template>

<script>
import { EventBus } from '../main';

export default {
    // props: ['userAge'],
    props: {
        userAge: {
            default : 20,
        }
    },
    methods: {
        editAge() {
            this.userAge = 30;
            EventBus.$emit('ageWasEdited', this.userAge);
            // this.$emit('ageWasEdited', this.userAge);
        }
    }
    
}
</script>

<style scoped>
    div {
        background-color: lightgreen;
    }
</style>
