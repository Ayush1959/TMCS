<template>
    <div class="component">
        <h3>User  Details Here</h3>
        <p>Many Details</p>
        <!-- <p>User Name: {{ myName }}</p> -->
        <p>User age : {{ userAge }}</p>
        <!-- <button @click="resetName">Reset Name</button> -->
    </div>
</template>


<script>
import { EventBus } from '../main';

export default {
    props: {
        // myName: {
        //     type: String
        // },
        userAge: Number
    },
    // methods: {
    //     resetName() {
    //         this.myName = 'Max';
    //         this.$emit('nameWasReset', this.myName)
    //     }
    // },
    created() {
        EventBus.$on('ageWasEdited', (data) => 
        {this.userAge = data;});
        // EventBus.$on('ageWasEdited', (age) => {
        //     this.userAge = age;
        // });
    }
}
</script>

<style scoped>
 div {
     background-color: red;
 }
</style>
