<template>
    <Transition>
        <div class="outer-modal">
            <div class="backdrop" @click="closeModal"></div>
            <div class="modal rounded-2xl bg-white shadow-secondary max-w-500">
                <div v-if="modalTitle" class="modal-head border-b border-b-light py-5 px-6 flex items-center justify-between">
                    <h5 class="font-exo-600 text-blue-grey text-xl">{{ modalTitle }}</h5>
                    <svg @click="closeModal" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                        <path d="M1 13.5L13 1.5M1 1.5L13 13.5" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="modal-body p-6 overflow-y-auto scroll-style" style="max-height: 584px;">
                    <slot name="body"></slot>
                </div>
                <div class="modal-footer border-t border-t-light pt-4 pb-6 px-6 flex items-center justify-between">
                    <slot name="footer"></slot>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script>
export default {
    setup: () => ({
        title: 'Modal'
    }),
    data () {
        return{
        };
    },
    props: ['modalTitle'],
    emits: ["close"],
    methods: {
        closeModal() {
            this.$emit("close", true);
        },
    },
}
</script>