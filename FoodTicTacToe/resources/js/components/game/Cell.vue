<template>
    <div
        class="flex border-2 border-black p-12 justify-items-center rounded-xl"
        @click="$emit('cellClickedOn')"
    >
        {{ data.value }}
    </div>
</template>

<script>
export default {
    props: ['data'],
    name: "Cell.vue",
    emits: ['cellClickedOn']
}
</script>

<style scoped>
</style>
