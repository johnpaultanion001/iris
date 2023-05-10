<template>
    <Transition>
        <div class="outer-modal">
            <div class="backdrop" @click="closeModal"></div>
            <div class="modal rounded-2xl bg-white shadow-secondary">
                <div v-if="modalTitle" class="modal-head border-b border-b-light py-5 px-6 flex items-center justify-between">
                    <h5 class="font-exo-600 text-blue-grey text-xl">{{ modalTitle }}</h5>
                    <img @click="closeModal" src="/img/icon/close.png" class="cursor-pointer">
                </div>
                <div class="modal-body p-6">
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