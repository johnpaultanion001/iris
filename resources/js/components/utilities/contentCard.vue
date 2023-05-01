<template>
    <div class="content-card bg-white rounded-2xl p-3.5 shadow-main">
        <p class="font-opensans-600 text-base text-dark">{{ cardTitle }}</p>
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
