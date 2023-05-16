<template>
    <div class="content-card bg-white rounded-2xl p-4 shadow-main relative">
        <h6 v-if="cardTitle && cardTitle != 'Vendor Information'" class="font-opensans-600 text-base text-dark mb-2.5">{{ cardTitle }}</h6>
        <h6 v-if="cardTitle == 'Vendor Information'" class="text-blue-grey font-exo-600 text-xl">{{ cardTitle }}</h6>
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
