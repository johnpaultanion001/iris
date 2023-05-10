<template>
    <div class="content-card bg-white rounded-2xl p-4 shadow-main relative">
        <h6 v-if="cardTitle" class="font-opensans-600 text-base text-dark mb-2.5">{{ cardTitle }}</h6>
        <slot></slot>
    </div>
</template>

<script>
export default  {
    setup: () => ({
        title: 'Content Card'
    }),
    props: ['cardTitle'],
}
</script>
