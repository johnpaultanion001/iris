<template>
    <PageLayout :pageName="title">
        <h1 class="p-4">{{ title }}</h1>
    </PageLayout>
</template>

<script>

import PageLayout from '../../pageLayout.vue'

export default {
    setup: () => ({
        title: 'Settings'
    }),
    components: { PageLayout },
}
</script>