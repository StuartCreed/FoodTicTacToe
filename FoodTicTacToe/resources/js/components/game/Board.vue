<template>
    <div class="w-full flex justify-center items-center">
        <div class="board grid grid-cols-3 gap-6 w-96">
            <cell v-for="data in cells" :data="data" @cellClickedOn="updateBoard"></cell>
        </div>
    </div>
</template>

<script>
import Cell from './Cell.vue';
export default {
    components: {Cell},
    name: "Board.vue",
    data: function () {
        return {
            cells: [0, 1, 2, 3, 4, 5, 6, 7, 8].map(number => {
                return {
                    id: number,
                    value: 'empty'
                }
            }),
            winningConditions: [
                {1: [0, 1, 2]},
                {2: [3, 4, 5]},
                {3: [6, 7, 8]},
                {4: [0, 3, 6]},
                {5: [1, 4, 7]},
                {6: [2, 5, 8]},
                {7: [0, 4, 8]},
                {8: [2, 4, 6]}
            ]
        }
    },
    methods: {
        updateBoard: function(cell, value) {
            this.cells[cell].value = value;
            this.checkBoard();
        },
        checkBoard: function() {
            console.log(this.cells)
        }
    }
}
</script>
