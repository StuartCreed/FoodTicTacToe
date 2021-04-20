<template>
    <div class="flex border-2 border-black p-12 justify-items-center rounded-xl">{{ data.id }}</div>
</template>

<script>
export default {
    props: ['data'],
    name: "Cell.vue"
}
</script>

<style scoped>
</style>
