<template>
    <div class="flex justify-center items-center">
        <div class="p-4">
            {{ score }}
        </div>
        <div>
            <div>

            </div>
            <div :class="userClass">
                {{ userName }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components: {},
    name: "ScorePanel.vue",
    props: ['score', 'userName', 'currentGo'],
    computed: {
        userClass: function() {
            return this.userName === this.currentGo ? 'usersGo' : 'notUsersGo'
        }
    }
}
</script>

<style scoped>
    .usersGo {
        color: green;
    }
    .notUsersGo {
        color: black;
    }
</style>
