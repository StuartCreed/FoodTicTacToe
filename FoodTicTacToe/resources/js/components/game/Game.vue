<template>
    <app-button text="Start New Game" @click="startNewGame"></app-button>
    <score-panel :score="score.computer" userName="computer" :currentGo="currentGo"></score-panel>
    <board :currentGo="currentGo" :users="users" :cells="cells" @gameWon="updateWinner" @updateGo="updateGo" @cellClickedOn="updateCellsClickedOn"></board>
    <score-panel :score="score.player" userName="player" :currentGo="currentGo"></score-panel>
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
            currentGo: 'computer',
            score: this.freshScores(),
            cells: this.freshCells(),
            users:
                [{
                    name: 'computer',
                    cellsClicked: []
                },
                {
                    name: 'player',
                    cellsClicked: []
                }],
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
        updateGo: function(user) {
            user === 'computer' ? this.currentGo = 'player' : this.currentGo = 'computer'
        },
        startNewGame: function() {
            this.resetGame();
            this.showStartingPopup();
        },
        resetGame: function() {
            this.resetBoard()
            this.score = this.freshScores();
        },
        resetBoard: function() {
            this.cells = this.freshCells();
            this.resetCellsClicked();
        },
        showStartingPopup: function() {
            this.$swal('Lets start a new game');
        },
        freshCells: function() {
            return [0, 1, 2, 3, 4, 5, 6, 7, 8].map(number => {
                return {
                    id: number,
                    value: 'empty', // Can be 'empty', 'computer', 'player'
                    clickedOn: false
                }
            })
        },
        freshScores: function() {
            return {
                computer: 0,
                player: 0
            }
        },
        resetCellsClicked: function() {
            this.users.forEach(user => {
                user.cellsClicked = []
            })
        },
        updateCellsClickedOn: function(cell) {
            this.cells[cell].clickedOn = true;
        }
    },
}
</script>
