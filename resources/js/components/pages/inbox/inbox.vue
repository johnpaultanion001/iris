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
                                <div :class="read ? 'bg-green' : 'bg-transparent'" class="circle-notif-green mr-2.5 min-w-2 w-2 h-2 rounded-full"></div>
                                <div class="p-3 bg-light-grey rounded-full w-10 h-10 mr-4.5 hidden sm:block">
                                    <img src="/img/icon/bell-black.png">
                                </div>
                                <div>
                                    <p :class="read ? 'font-inter-700 ' : 'font-inter-400'" class="text-xs text-black">Notification title will be placed here. Marked as unread</p>
                                    <p class="font-inter-400 text-xs text-black">Month DD, YYYY • 8:00AM</p>
                                </div>
                            </div>
                            <div class="notification flex items-center hidden sm:block justify-between">
                                <img src="/img/icon/right-grey.png">
                            </div>
                        </router-link>
                        <router-link to="/" class="notification flex items-center justify-between border-b border-light py-4 pl-3.5 pr-3.5 md:pr-8 bg-white hover:bg-lighter-grey">
                            <div class="notification flex items-center justify-between">
                                <div :class="read ? 'bg-green' : 'bg-transparent'" class="circle-notif-green mr-2.5 min-w-2 w-2 h-2 rounded-full"></div>
                                <div class="p-3 bg-light-grey rounded-full w-10 h-10 mr-4.5 hidden sm:block">
                                    <img src="/img/icon/bell-black.png">
                                </div>
                                <div>
                                    <p :class="read ? 'font-inter-700 ' : 'font-inter-400'" class="text-xs text-black">Notification title will be placed here. Marked as unread</p>
                                    <p class="font-inter-400 text-xs text-black">Month DD, YYYY • 8:00AM</p>
                                </div>
                            </div>
                            <div class="notification flex items-center hidden sm:block justify-between">
                                <img src="/img/icon/right-grey.png">
                            </div>
                        </router-link>
                        <router-link to="/" class="notification flex items-center justify-between border-b border-light py-4 pl-3.5 pr-3.5 md:pr-8 bg-white hover:bg-lighter-grey">
                            <div class="notification flex items-center justify-between">
                                <div :class="read ? 'bg-green' : 'bg-transparent'" class="circle-notif-green mr-2.5 min-w-2 w-2 h-2 rounded-full"></div>
                                <div class="p-3 bg-light-grey rounded-full w-10 h-10 mr-4.5 hidden sm:block">
                                    <img src="/img/icon/bell-black.png">
                                </div>
                                <div>
                                    <p :class="read ? 'font-inter-700 ' : 'font-inter-400'" class="text-xs text-black">Notification title will be placed here. Marked as unread</p>
                                    <p class="font-inter-400 text-xs text-black">Month DD, YYYY • 8:00AM</p>
                                </div>
                            </div>
                            <div class="notification flex items-center hidden sm:block justify-between">
                                <img src="/img/icon/right-grey.png">
                            </div>
                        </router-link>
                        <router-link to="/" class="notification flex items-center justify-between border-b border-light py-4 pl-3.5 pr-3.5 md:pr-8 bg-white hover:bg-lighter-grey">
                            <div class="notification flex items-center justify-between">
                                <div :class="read ? 'bg-green' : 'bg-transparent'" class="circle-notif-green mr-2.5 min-w-2 w-2 h-2 rounded-full"></div>
                                <div class="p-3 bg-light-grey rounded-full w-10 h-10 mr-4.5 hidden sm:block">
                                    <img src="/img/icon/bell-black.png">
                                </div>
                                <div>
                                    <p :class="read ? 'font-inter-700 ' : 'font-inter-400'" class="text-xs text-black">Notification title will be placed here. Marked as unread</p>
                                    <p class="font-inter-400 text-xs text-black">Month DD, YYYY • 8:00AM</p>
                                </div>
                            </div>
                            <div class="notification flex items-center hidden sm:block justify-between">
                                <img src="/img/icon/right-grey.png">
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
        title: 'Inbox'
    }),
    data () {
        return{
            read: true
        };
    },
    components: { PageLayout },
}
</script>