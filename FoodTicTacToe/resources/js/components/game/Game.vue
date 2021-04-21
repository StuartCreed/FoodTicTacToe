<template>
    <app-button text="Start New Game" @click="startNewGame"></app-button>
    <score-panel :score="score.computer" userName="computer" :currentGo="currentGo"></score-panel>
    <board :currentGo="currentGo" :cells="cells" @gameWon="updateWinner" @updateGo="updateGo"></board>
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
        }
    },
    methods: {
        updateWinner: async function(user) {
            this.updateScore(user);
            await this.$swal(`${user} wins!`);
            this.resetGame();
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
            this.cells = this.freshCells()
            this.score = this.freshScores();
        },
        showStartingPopup: function() {
            this.$swal('Lets start a new game');
        },
        freshCells: function() {
            return [0, 1, 2, 3, 4, 5, 6, 7, 8].map(number => {
                return {
                    id: number,
                    value: 'empty', // Can be 'empty', 'computer', 'player'
                }
            })
        },
        freshScores: function() {
            return {
                computer: 0,
                player: 0
            }
        }
    },
}
</script>
