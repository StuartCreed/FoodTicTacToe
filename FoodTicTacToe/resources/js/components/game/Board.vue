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
            })
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
