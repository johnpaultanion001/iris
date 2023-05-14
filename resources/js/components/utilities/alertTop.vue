<template>
    <Transition>
        <div class="absolute top-11 inset-x-4 max-w-full overflow-hidden">
            <div class="alert-top-card bg-white flex w-full xs:w-fit min-w-0 xs:min-w-412 py-5 px-7 mx-auto rounded">
                <img :src="alertIcon" alt="icon" class="mr-7">
                <p v-click-out-side="closeAlert" class="font-inter-700 text-sm text-dark2">{{ content }}</p>
                <img src="/img/icon/close.png" alt="close" class="cursor-pointer m-auto mr-0" @click="closeAlert">
            </div>
        </div>
    </Transition>
</template>

<script>
import clickOutSide from "@mahdikhashan/vue3-click-outside"

export default {
    setup: () => ({
        title: 'Alert Top'
    }),
    directives: {
        clickOutSide,
    },
    props: ['alertIcon', 'active', 'content'],
    methods: {
        async closeAlert() {
            this.$emit('close')
        }
    }
}
</script>
