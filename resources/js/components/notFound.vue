<template>
    <h1>{{ title }}</h1>
    <router-link to="/">Go back to home</router-link>
</template>
<script>
export default {
    setup: () => ({
        title: 'Not Found Page'
    })
}
</script>