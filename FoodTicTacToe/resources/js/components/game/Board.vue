<template>
    <div class="w-full flex justify-center items-center">
        <div class="board grid grid-cols-3 gap-6 w-96">
            <cell
                v-for="data in cells"
                :data="data"
                :currentGo="currentGo"
                @cellClickedOn="updateBoard">
            </cell>
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
                    value: 'empty', // Can be 'empty', 'computer', 'player'
                }
            }),
            winningConditions: [
                [0, 1, 2],
                [3, 4, 5],
                [6, 7, 8],
                [0, 3, 6],
                [1, 4, 7],
                [2, 5, 8],
                [0, 4, 8],
                [2, 4, 6]
            ],
            currentGo: 'computer'
        }
    },
    methods: {
        updateBoard: function(cell, value) {
            this.cells[cell].value = value;
            this.checkBoard();
            this.changePlayer()
        },
        changePlayer: function() {
            this.currentGo === 'computer' ? this.currentGo = 'player' : this.currentGo = 'computer'
        },
        checkBoard: function() {
            //TODO check if winning condition has been met
            //TODO check if all cells have been changed
            console.log(this.cells)
        }
    }
}
</script>
