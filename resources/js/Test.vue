<template>
    <div id="ddddd">
        <p>{{ message }}</p>
    </div>
</template>

<script>
export default {
    name: 'zd',
    props: {
        message: {
            tpye: String,
            default: 'hi!',
        }
    }
}
</script>