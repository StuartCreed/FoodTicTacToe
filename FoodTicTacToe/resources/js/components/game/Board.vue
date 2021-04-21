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
            currentGo: 'computer',
            users: ['computer', 'player']
        }
    },
    methods: {
        updateBoard: function(cell, value) {
            this.cells[cell].value = value;
            this.checkBoard();
            this.changePlayer()
        },
        checkBoard: function() {
            // Check if winning condition has been met by either user
            this.users.forEach(user => {
                const cellsUserHasClicked = [];
                this.cells.forEach(cell => {
                    if (cell.value === user) {
                        cellsUserHasClicked.push(cell.id)
                    }
                })

                const won = this.winningConditions.some(cond => {
                    let checkCondAccumulator = []
                    cellsUserHasClicked.some(cell => {
                        if (cond.some(cellTest => cellTest === cell)) {
                            checkCondAccumulator.push(cell)
                        }
                    })
                    return checkCondAccumulator.length === 3
                })

                if (won) {
                    alert(`User: ${user} has won`)
                }
            })
            //TODO check if all cells have been changed
        },
        changePlayer: function() {
            this.currentGo === 'computer' ? this.currentGo = 'player' : this.currentGo = 'computer'
        },
    }
}
</script>
