<template>
    <score-panel :computerScore="score.computer" userName="computer" :currentGo="currentGo"></score-panel>
    <app-button></app-button>
    <winner-pop-up></winner-pop-up>
    <board @gameWon="updateWinner" :currentGo="currentGo" @updateGo="updateGo"></board>
    <winner-pop-up></winner-pop-up>
    <app-button></app-button>
    <score-panel :computerScore="score.computer" userName="player" :currentGo="currentGo"></score-panel>
    <score-panel></score-panel>
</template>

<script>
import Board from './Board.vue';
import ScorePanel from './ScorePanel.vue';
import WinnerPopUp from './WinnerPopUp.vue';
import AppButton from '../AppButton.vue';

export default {
    components: {
        Board, ScorePanel, AppButton, WinnerPopUp
    },
    name: "Game.vue",
    data: function() {
        return {
            whoIsWinning: null,
            currentGo: 'computer',
            score: {
                computer: 0,
                player: 0
            }
        }
    },
    methods: {
        updateWinner: function(user) {
            this.updateScore(user)
        },
        updateScore: function(user) {
            this.score[user] = this.score[user] + 1;
        },
        updateGo: function(user) {
            user === 'computer' ? this.currentGo = 'player' : this.currentGo = 'computer'
        }
    }
}
</script>

<style scoped>
</style>
