<template>
    <div>
        <div class="title">
            <slot name="title"></slot>
            <span class="sp"><slot name='subtitle'>The Subs</slot></span>
        </div>
        <hr>
        <div>
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
    div {
        border: 1px solid #ccc;
        box-shadow: 1px 1px 2px black;
        padding: 30px;
        margin: 30px auto;
        text-align: center;
    }
    h2 {
        color: #ff0000;
    }
    .title {
        font-style: italic;
    }
    .sp{
        color: #ccc;
    }
</style>
