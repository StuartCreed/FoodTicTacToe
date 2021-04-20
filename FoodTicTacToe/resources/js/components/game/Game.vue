<template>
    <score-panel></score-panel>
    <app-button></app-button>
    <winner-pop-up></winner-pop-up>
    <board></board>
    <winner-pop-up></winner-pop-up>
    <app-button></app-button>
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
    name: "Game.vue"
}
</script>

<style scoped>
</style>
