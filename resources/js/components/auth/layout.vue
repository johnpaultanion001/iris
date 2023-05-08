<template>
    <div class="py-3.5 px-4">
        <div class="bg-header absolute top-3.5 inset-x-2 xs:inset-x-4 m-auto max-w-full overflow-hidden rounded-2xl" :style="{'background-image': 'url(' + headerBg + ')'}"></div>
        <div class="auth-page flex flex-col justify-between">
            <div class="auth-body">
                <img src="/img/iris-logo.png"  class="h-auto h-7.5 mt-23 mb-9 mx-auto">
                <div class="auth-card shadow-secondary bg-white w-full xs:w-fit min-w-0 xs:min-w-412 px-6 py-8 mx-auto rounded-2xl">
                    <div class="header pb-4">
                        <h1 class="text-2xl mb-2 font-exo-600 text-blue-grey">{{ headerTitle }}</h1>
                        <p class="text-base text-blue-grey font-inter-400">{{ headerText }}</p>
                    </div>
                    <slot></slot>
                </div>
            </div>
            <div class="auth-footer flex items-center justify-center mb-4 mt-9">
                <img src="/img/dti-logo.png" class="h-10 w-10 me-2">
                <p class="text-blue-grey text-sm font-inter-400">Copyright © 2022 IRIS by DTI Philippines</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    setup: () => ({
        title: 'Auth'
    }),
    props: ['headerBg', 'headerTitle', 'headerText']
}
</script>

<style>
.auth-page{
    min-height: calc(100vh - 28px);
}
.bg-header {
    z-index: -1;
    height: 440px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
}
</style>