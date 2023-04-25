<template>
    <div class="absolute top-11 inset-x-4 max-w-full overflow-hidden">
        <div class="alert-top-card bg-white flex w-full xs:w-fit min-w-0 xs:min-w-412 py-5 px-7 mx-auto rounded">
            <img :src="alertIcon" alt="icon" class="mr-7">
            <slot></slot>
            <img src="/img/icon/close.png" alt="close" class="cursor-pointer m-auto mr-0" @click="closeAlert">
        </div>
    </div>
</template>

<script>
export default {
    title: 'Alert Top',
    props: ['alertIcon', 'active'],
    methods: {
        async closeAlert() {
            this.$emit('close')
        }
    }
}
</script>
