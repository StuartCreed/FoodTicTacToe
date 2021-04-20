<template>
    <div
        class="flex border-2 border-black p-12 justify-items-center rounded-xl"
        @click="cellClickedOn"
    >
        {{ data.value }}
    </div>
</template>

<script>
export default {
    props: ['data', 'currentGo'],
    name: "Cell.vue",
    emits: ['cellClickedOn'],
    methods: {
        cellClickedOn: function() {
            this.$emit('cellClickedOn', this.data.id, this.currentGo)
        }
    }
}
</script>

<style scoped>
</style>
