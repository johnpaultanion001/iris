<template>
    <div class="content-card bg-white rounded-xl p-3 shadow-main flex items-center justify-between">
        <div>
            <h6 class="font-opensans-600 text-13 text-darker flex items-center">{{ cardTitle }} 
                <img src="/img/icon/right-active.png" class="ml-2.5">
            </h6>
            <p class="font-exo-600 text-darker text-2xl">
                {{ value }}
            </p>
        </div>
        <div class="p-3 rounded bg-light-blue">
            <img :src="icon">
        </div>
    </div>
</template>

<script>
export default  {
    setup: () => ({
        title: 'Content Card'
    }),
    props: ['cardTitle', 'value', 'icon'],
}
</script>
