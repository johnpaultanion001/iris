<template>
    <div class="content-card bg-white rounded-xl p-3 shadow-main">
        <p class="font-opensans-600 text-xxs text-darker flex items-center">{{ cardTitle }} <img src="/img/icon/right-active.png" class="ml-2.5"></p>
        <p class="font-exo-600 text-darker text-2xl">{{ value }}</p>
    </div>
</template>

<script>
export default  {
    setup: () => ({
        title: 'Content Card'
    }),
    props: ['cardTitle', 'value'],
}
</script>
