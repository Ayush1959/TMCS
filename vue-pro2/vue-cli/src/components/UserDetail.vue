<template>
    <div class="component">
        <h3>User  Details Here</h3>
        <p>Many Details</p>
        <p>User Name: {{ myName }}</p>
        <p>User age : {{ userAge }}</p>
        <button @click="resetName">Reset Name</button>
    </div>
</template>


<script>
export default {
    props: {
        myName: {
            type: String
        },
        userAge: Number
    },
    methods: {
        resetName() {
            this.myName = 'Max';
            this.$emit('nameWasReset', this.myName)
        }
    }
}
</script>

<style scoped>
 div {
     background-color: red;
 }
</style>
