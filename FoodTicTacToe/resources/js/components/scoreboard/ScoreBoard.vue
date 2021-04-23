<template>
    <table id="scoreboard-table" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>You</th>
                <th>Computer</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="row in rows">
                <td>{{ row.id }}</td>
                <td>{{ row.created_at }}</td>
                <td>{{ row.player_score }}</td>
                <td>{{ row.computer_score }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "ScoreBoard.vue",
        mounted() {
            $('#scoreboard-table').DataTable();
        },
        data: function() {
            return {
                rows: window.games
            }
        }
    }
</script>

