<template>
    <div class="w-full">
        <div class="board grid grid-cols-3 gap-6 w-96 m-auto">
            <div data-cell-index="0" class="cell rounded-xl">0</div>
            <div data-cell-index="1" class="cell rounded-xl">1</div>
            <div data-cell-index="2" class="cell rounded-xl">2</div>
            <div data-cell-index="3" class="cell rounded-xl">3</div>
            <div data-cell-index="4" class="cell rounded-xl">4</div>
            <div data-cell-index="5" class="cell rounded-xl">5</div>
            <div data-cell-index="6" class="cell rounded-xl">6</div>
            <div data-cell-index="7" class="cell rounded-xl">7</div>
            <div data-cell-index="8" class="cell rounded-xl">8</div>
        </div>
    </div>
</template>

<script>
export default {
    components: {},
    name: "Board.vue"
}
</script>

<style scoped>
    .cell {
        display: flex;
        border: 1px solid black;
        padding: 40px;
        justify-content: center;
        align-items: center;
    }
</style>
