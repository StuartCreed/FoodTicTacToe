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
    props: ['currentGo'],
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
            users:
                [{
                    name: 'computer',
                    cellsClicked: []
                },
                {
                    name: 'player',
                    cellsClicked: []
                }]
        }
    },
    methods: {
        updateBoard: function(cell, user) {
            this.cells[cell].value = user;
            this.updateCellsUserHasClicked(user, cell)
            this.checkBoard();
            if (this.totalCellsClicked.length === 9) {
                alert('All goes taken')
            }
            this.changePlayer(user);
        },
        checkBoard: function() {
            // Check if winning condition has been met by either user
            this.users.forEach(user => {
                const won = this.winningConditions.some(cond => {
                    let checkCondAccumulator = []
                    user.cellsClicked.some(cell => {
                        if (cond.some(cellTest => cellTest === cell)) {
                            checkCondAccumulator.push(cell)
                        }
                    })
                    return checkCondAccumulator.length === 3
                })

                if (won) {
                    this.gameWon(user.name);
                }
            })
            //TODO check if all cells have been changed
        },
        updateCellsUserHasClicked: function(changedUser, cell) {
            this.users.forEach(user => {
                if (user.name === changedUser) {
                    user.cellsClicked.push(cell)
                }
            });
        },
        changePlayer: function(user) {
            this.$emit('updateGo', user)
        },
        gameWon: function(user) {
            this.$emit('gameWon', user)
        }
    },
    computed: {
        totalCellsClicked: function() {
            let cellsAccumulator = []
            this.users.forEach(user => {
                cellsAccumulator = [...cellsAccumulator, ...user.cellsClicked]
            })
            return cellsAccumulator
        }
    }
}
</script>
