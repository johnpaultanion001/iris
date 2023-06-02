<template>
    <div class="grid gap-x-4 grid-cols-4 :grid-cols-6 xl:grid-cols-6 pl-4">
        <div class="bg-header absolute top-0 inset-x-0 m-auto max-w-full overflow-hidden" ></div>
        <Transition name="slide-fade">
            <div v-if="show && !sidebarMobile" class="col-span-1">
                <Sidebar :pageName="pageName" :show="show" />
            </div>
        </Transition>
        <div class="py-4 px-4 scroll-active scroll-style" :class="show ? 'page-content col-span-4 sm:col-span-3 xl:col-span-5' : 'col-span-4 xl:col-span-6'">
            <Navigation @menu="show = !show" />
            <div v-if="show && sidebarMobile" class="w-full">
                <Sidebar :pageName="pageName" :show="show" />
            </div>
            <div class="content-body pr-4">
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
            show: true,
            sidebarMobile: false,
        };
    },
    props: ['pageName'],
    components: { Sidebar, Navigation, Footer },
    async mounted() {
        this.isMobile();
        window.addEventListener("resize", this.isMobile);
    },
    methods: {
        //Format Mobile Display Settings
        isMobile() {
            if( screen.width <= 768 ) {
                this.show = false;
                this.sidebarMobile = true;
            }
            else {
                this.show = true;
                this.sidebarMobile = false;
            }
        },
    }
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
    min-height: calc(100vh - 166px);
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