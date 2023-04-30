<template>
    <div class="grid grid-cols-5 gap-4">
        <div class="col-span-1">
            <Sidebar :pageName="pageName"/>
        </div>
        <div class="col-span-4">
            <slot></slot>
        </div>
    </div>
</template>

<script>
import Sidebar from './utilities/sidebar.vue'

export default {
    setup: () => ({
        title: 'Layout'
    }),
    props: ['pageName'],
    components: { Sidebar },
}
</script>

<style>
body{
    background: #E9E9E9;
}
</style>