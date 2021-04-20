<template>
    <div class="w-full flex justify-center items-center">
        <div class="board grid grid-cols-3 gap-6 w-96">
            <cell v-for="data in cells" :data="data" @cellClickedOn="data.value = 'clicked'"></cell>
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
            cells: [1, 2, 3, 4, 5, 6, 7, 8, 9].map(number => {
                return {
                    id: number,
                    value: 'empty'
                }
            })
        }
    }
}
</script>
