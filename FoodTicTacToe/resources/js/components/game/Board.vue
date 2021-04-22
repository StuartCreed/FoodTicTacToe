<template>
    <div class="w-full flex justify-center items-center">
        <div class="board grid grid-cols-3 gap-6 w-96">
            <cell
                v-for="cell in cells"
                :cell="cell"
                :currentGo="currentGo"
                :clickedOn="cell.clickedOn"
                @cellClickedOn="cellClickedOn">
            </cell>
        </div>
    </div>
</template>

<script>
import Cell from './Cell.vue';
export default {
    components: {Cell},
    name: "Board.vue",
    props: ['currentGo', 'cells', 'users', 'cellSelectedByComp', 'allGoesTaken', 'gameWon'],
    data: function () {
        return {
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
        }
    },
    methods: {
        cellClickedOn: function(cell, user) {
            this.updateCellsUserHasClicked(user, cell)
            this.cells[cell].value = user;
            this.checkBoard();
            this.$emit('cellClickedOn', cell)
            if (this.currentGo === 'Player' && !this.gameFinished) {
                // Take computers go
                setTimeout(() => {
                    this.$emit('takeComputerTurn')
                }, 300)
            }
        },
        checkBoard: function() {
            let status = []
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
                status.push(won)
                if (won) {
                    this.$emit('gameWon', user.name);
                    return
                }
            })
            if (this.allCellsClickedOn && !this.gameWon) {
                this.$emit('allGoesTaken')
                this.$swal("Gameover. Let's start a new game shall we!");
            }
        },
        updateCellsUserHasClicked: function(changedUser, cell) {
            this.users.forEach(user => {
                if (user.name === changedUser) {
                    user.cellsClicked.push(cell)
                }
            });
        }
    },
    computed: {
        totalCellsClicked: function() {
            let cellsAccumulator = []
            this.users.forEach(user => {
                cellsAccumulator = [...cellsAccumulator, ...user.cellsClicked]
            })
            return cellsAccumulator
        },
        isUsersGo: function() {
            return this.currentGo === 'Player'
        },
        allCellsClickedOn: function() {
            return this.totalCellsClicked.length === 9
        },
        gameFinished: function() {
            return this.gameWon || this.allGoesTaken
        }
    },

}
</script>
