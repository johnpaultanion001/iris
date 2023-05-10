<template>
    <PageLayout :pageName="title">
        <h1>{{ title }}</h1>
    </PageLayout>
</template>

<script>

import PageLayout from '../../pageLayout.vue'

export default {
    setup: () => ({
        title: 'Create User'
    }),
    components: { PageLayout },
}
</script>