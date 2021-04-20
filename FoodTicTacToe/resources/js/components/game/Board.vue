<template>
    <div class="board grid grid-cols-3">
        <div data-cell-index="0" class="cell rounded-tl-xl">0</div>
        <div data-cell-index="1" class="cell">1</div>
        <div data-cell-index="2" class="cell rounded-tr-xl">2</div>
        <div data-cell-index="3" class="cell">3</div>
        <div data-cell-index="4" class="cell">4</div>
        <div data-cell-index="5" class="cell">5</div>
        <div data-cell-index="6" class="cell rounded-bl-xl">6</div>
        <div data-cell-index="7" class="cell">7</div>
        <div data-cell-index="8" class="cell rounded-br-xl">8</div>
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
        padding: 50px;
        justify-content: center;
        align-items: center;
    }
</style>
