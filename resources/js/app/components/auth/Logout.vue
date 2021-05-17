<template>

</template>

<script>
export default {
    created () {
        axios.post('/api/logout', {token : this.$store.state.token})
            .then((res) => {
                this.$store.commit('clearToken', res.data.user)
                this.$router.push('/login')
            })
            .catch((error) => {
                localStorage.removeItem("token")
                return this.$router.push({ name: 'login'})
                console.log(error)
        })
    }
}
</script>

<style>

</style>
