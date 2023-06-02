<template>
    <Transition>
        <div class="fixed top-11 inset-x-4 max-w-full overflow-hidden z-9 pb-6">
            <div class="shadow-main alert-top-card bg-white flex w-full xs:w-fit min-w-0 xs:min-w-412 py-5 px-7 mx-auto rounded">
                <img :src="alertIcon" alt="icon" class="mr-7">
                <p v-click-out-side="closeAlert" class="font-inter-700 text-sm text-dark2 mr-2">{{ content }}</p>
                <svg @click="closeAlert" class="cursor-pointer m-auto mr-0" xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M10.114 0.298584L5.99982 4.41274L1.88567 0.298584L0.898438 1.28581L5.01259 5.39997L0.898438 9.51412L1.88567 10.5013L5.99982 6.3872L10.114 10.5013L11.1012 9.51412L6.98705 5.39997L11.1012 1.28581L10.114 0.298584Z" fill="#8390A3"/>
                </svg>
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
