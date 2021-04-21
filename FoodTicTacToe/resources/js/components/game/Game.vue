<template>
    <app-button text="Start New Game" @click="startNewGame"></app-button>
    <score-panel :score="score.Computer" userName="Computer" :currentGo="currentGo"></score-panel>
    <board
        :currentGo="currentGo"
        :users="users"
        :cells="cells"
        :gameEnded="gameEnded"
        @cellClickedOn="updateGameState"
        @gameWon="updateWinner"
        @gameEnded="resetBoard"
        @takeComputerTurn="takeComputerTurn"
    >
    </board>
    <score-panel :score="score.Player" userName="Player" :currentGo="currentGo"></score-panel>
</template>

<script>
import Board from './Board.vue';
import ScorePanel from './ScorePanel.vue';
import AppButton from '../AppButton.vue';

export default {
    components: {
        Board, ScorePanel, AppButton
    },
    name: "Game.vue",
    data: function() {
        return {
            currentGo: 'Player',
            score: this.freshScores(),
            cells: this.freshCells(),
            users:
                [{
                    name: 'Computer',
                    cellsClicked: []
                },
                {
                    name: 'Player',
                    cellsClicked: []
                }],
            gameEnded: false
        }
    },
    methods: {
        updateWinner: async function(user) {
            this.updateScore(user);
            await this.$swal(`${user} wins!`);
            this.resetBoard();
        },
        updateScore: function(user) {
            this.score[user]++
        },
        updateGo: function() {
            this.currentGo === 'Computer' ? this.currentGo = 'Player' : this.currentGo = 'Computer'
        },
        startNewGame: function() {
            this.resetGame();
            this.showStartingPopup();
        },
        resetGame: function() {
            this.resetBoard()
            this.score = this.freshScores();
            gameEnded = false
        },
        resetBoard: function() {
            this.cells = this.freshCells();
            this.resetCellsClicked();
            gameEnded = false
        },
        showStartingPopup: function() {
            this.$swal('Lets start a new game');
        },
        freshCells: function() {
            return [0, 1, 2, 3, 4, 5, 6, 7, 8].map(number => {
                return {
                    id: number,
                    value: 'empty', // Can be 'empty', 'Computer', 'Player'
                    clickedOn: false
                }
            })
        },
        freshScores: function() {
            return {
                Computer: 0,
                Player: 0
            }
        },
        resetCellsClicked: function() {
            this.users.forEach(user => {
                user.cellsClicked = []
            })
        },
        updateGameState: function(cell) {
            this.updateGo()
            this.cells[cell].clickedOn = true;
        },
        takeComputerTurn: function() {
            setTimeout(() => {
                const cellToSelect = this.cells.find(cell => cell.value === 'empty');
                this.cells[cellToSelect.id] = {
                    id: cellToSelect.id,
                    value: 'Computer',
                    clickedOn: true
                }
                this.updateGo()
            }, 600)
        }
    }
}
</script>
