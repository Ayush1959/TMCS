<template>
    <div class="component">
        <h3>You may edit</h3>
        <p>Edit Me</p>
        <p>User age : {{ userAge }}</p>
        <button @click="editAge">Edit age</button>
    </div>
</template>

<script>
export default {
    props: ['userAge'],
    methods: {
        editAge() {
            this.userAge = 30;
            this.$emit('ageWasEdited', this.userAge);
        }
    }
    
}
</script>

<style scoped>
    div {
        background-color: lightgreen;
    }
</style>
