<template>
    <div class="grid gap-x-4 grid-cols-4 xl:grid-cols-6 px-4">
        <div class="bg-header absolute top-0 inset-x-0 m-auto max-w-full overflow-hidden" ></div>
        <Transition name="slide-fade">
            <div v-if="show" class="col-span-1">
                <Sidebar :pageName="pageName" :show="show" />
            </div>
        </Transition>
        <div class="py-4 px-4" :class="show ? 'page-content col-span-3 xl:col-span-5' : 'col-span-4 xl:col-span-6'">
            <Navigation @menu="show = !show" />
            <div  class="content-body">
                    <slot></slot>
            </div>            
            <Footer />
        </div>
    </div>
</template>

<script>
import Sidebar from './utilities/sidebar.vue'
import Navigation from './utilities/navigation.vue'
import Footer from './utilities/footer.vue'

export default {
    setup: () => ({
        title: 'Page Layout'
    }),
    data() {
        return {
            show: true
        };
    },
    props: ['pageName'],
    components: { Sidebar, Navigation, Footer },
}
</script>

<style>
.bg-header{
    background-image: url('/img/background-page.png');
    z-index: -1;
    height: 440px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    max-height: 302px;
}
.content-body{
    min-height: calc(100vh - 132px);
}
/* Column 1 transition */
.slide-fade-enter-active {
  transition: all 0.2s ease-out;
}
.slide-fade-leave-active {
  transition: all 0.2s ease-out;
}
.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateX(-40px);
  opacity: 0;
}
</style>