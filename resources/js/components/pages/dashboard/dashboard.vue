<template>
    <h1>{{ title }}</h1>
    <router-link to="/about">About</router-link>
    <router-link to="/login">Login</router-link>
</template>
<script>
export default {
    setup: () => ({
        title: 'Dashboard'
    })
}
</script>