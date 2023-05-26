<template>
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-12 col-start-1 md:col-span-6 col md:col-start-2">
                <h1>{{ title }}</h1>
            </div>
            <div class="col-span-12 md:col-span-4 flex items-center justify-end flex-col md:flex-row">
                <button @click="read = false" class="mt-1 md:mt-0 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-2 py-2.5 px-5 border border-white text-white rounded-full flex items-center justify-center">
                    Mark all as read
                </button>
            </div>
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard>
                    <div class="notifications py-2 rounded-2xl bg-white overflow-hidden">
                        <router-link to="/" class="notification flex items-center justify-between border-b border-light py-4 pl-3.5 pr-3.5 md:pr-8 bg-white hover:bg-lighter-grey">
                            <div class="notification flex items-center justify-between">
                                <div class="p-3">
                                    <p :class="read ? 'font-inter-700 ' : 'font-inter-400'" class="text-base text-black">Report title</p>
                                    <p class="font-inter-400 text-xs" style="color: #757575">For more context, the report description will be placed here.</p>
                                </div>
                            </div>
                            <div class="notification flex items-center hidden sm:block justify-between">
                                <img src="/img/icon/download.png">
                            </div>
                        </router-link>
                        <div class="py-4 px-8 bg-white">
                            <button class="text-blue font-inter-700 text-xs">LOAD MORE</button>
                        </div>
                    </div>
                </ContentCard>
            </div>
        </div>
    </PageLayout>
</template>

<script>

import PageLayout from '../../pageLayout.vue'

export default {
    setup: () => ({
        title: 'Reports'
    }),
    data () {
        return{
            read: true
        };
    },
    components: { PageLayout },
}
</script>