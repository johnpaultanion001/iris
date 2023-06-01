<template>
  <div class="py-3.5 px-4">
    <div class="bg-header absolute top-3.5 inset-x-2 xs:inset-x-4 m-auto max-w-full overflow-hidden rounded-2xl"
         :style="{'background-image': 'url(' + headerBg + ')'}"></div>
    <div class="auth-page flex flex-col justify-between">
      <div class="auth-body">
        <img src="/img/iris-logo.svg" class="h-[29.81px] mt-23 w-[280px] mb-9 mx-auto">
        <div
          class="auth-card shadow-secondary bg-white w-full xs:w-fit min-w-0 xs:min-w-412 px-6 py-8 mx-auto rounded-2xl">
          <div class="header pb-4">
            <h1 class="text-2xl mb-2 font-exo-600 text-black">{{ headerTitle }}</h1>
            <p class="text-base text-blue-grey font-inter-400">{{ headerText }}</p>
          </div>
          <slot></slot>
        </div>
      </div>
      <div class="auth-footer mb-4 mt-9">
        <!-- Agency logos -->
        <div v-if="page === 'login' || page === 'reset_password'"
             class="mx-auto flex justify-center items-center gap-4">
          <img v-for="logo in logos" :src="`/img/agency_logos/${logo}`" :alt="logo + ' logo'" class="w-10 h-10">
        </div>
        <p class="pt-6 text-blue-grey text-center text-sm font-inter-400">Copyright © 2022 IRIS by DTI Philippines</p>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  setup: () => ({
    title: 'Auth'
  }),

  props: ['headerBg', 'headerTitle', 'headerText', 'page'],

  data() {
    return {
      logos: [
        'DTI.png',
        'FDA.png',
        'IPOPHL.png',
        'NPC.png',
        'DA.png',
        'FPA.png',
        'DENR.png',
        'NTC.png',
        'BSP.png',
        'SEC.png',
        'PNP.png',
        'NBI.png',
        'FMB.png',
      ]
    }
  }
}
</script>

<style scoped>
.auth-page {
  min-height: calc(100vh - 28px);
}

.bg-header {
  z-index: -1;
  height: 440px;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  max-height: 640px;
}
</style>
