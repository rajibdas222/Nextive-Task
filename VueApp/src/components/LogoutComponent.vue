<template>
    
</template>

<script>

    import store from '../store'
    export default {
        name: "LogoutComponent",
        mounted () {
            localStorage.removeItem('token')
            store.commit('logoutUser')
            this.$router.push({ name: 'login' })
        }
    }
</script>

<style scoped>

</style>