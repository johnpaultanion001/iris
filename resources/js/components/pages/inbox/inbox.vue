<template>
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-12 col-start-1 md:col-span-6 col md:col-start-2">
                <h1>{{ title }}</h1>
            </div>
            <div class="col-span-12 md:col-span-4 flex items-center justify-end flex-col md:flex-row">
                <button @click="readAll()" class="mt-1 md:mt-0 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-2 py-2.5 px-5 border border-white text-white rounded-full flex items-center justify-center">
                    Mark all as read
                </button>
            </div>
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard>
                    <div class="notifications py-2 rounded-2xl bg-white overflow-hidden">
                        <div v-for="(inb, index) in inbox.slice(0, limit)">
                            <div @click.prevent="markRead(inb.id)" :class="inbox.length == index + 1 ? 'border-0' : 'border-b border-light'"  class="notification flex items-center justify-between py-4 pl-3.5 pr-3.5 md:pr-8 bg-white hover:bg-lighter-grey">
                                <div class="notification flex items-center justify-between">
                                    <div :class="inb.isRead == 0 ? 'bg-green' : 'bg-transparent'" class="circle-notif-green mr-2.5 min-w-2 w-2 h-2 rounded-full"></div>
                                    <div class="p-3 bg-light-grey rounded-full w-10 h-10 mr-4.5 hidden sm:block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                            <path d="M7.00003 0C3.68632 0 1.00003 2.68629 1.00003 6V9.58579L0.292922 10.2929C0.00692448 10.5789 -0.0786313 11.009 0.0761497 11.3827C0.230931 11.7564 0.595567 12 1.00003 12H13C13.4045 12 13.7691 11.7564 13.9239 11.3827C14.0787 11.009 13.9931 10.5789 13.7071 10.2929L13 9.58579V6C13 2.68629 10.3137 0 7.00003 0Z" fill="#111827"/>
                                            <path d="M7 16C5.34315 16 4 14.6569 4 13H10C10 14.6569 8.65685 16 7 16Z" fill="#111827"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p :class="inb.isRead == 0 ? 'font-inter-700 ' : 'font-inter-400'" class="text-xs text-black">{{ inb.message }}</p>
                                        <p class="font-inter-400 text-xs text-black">{{ format_date(inb.created_at) }} • {{ format_time(inb.created_at) }}</p>
                                    </div>
                                </div>
                                <div class="notification flex items-center hidden sm:block justify-between">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" fill="none">
                                        <path d="M0.999999 1L8 8L1 15" stroke="#CED4DA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div v-if="inbox.length > limit" class="py-4 px-8 bg-white">
                            <button @click="loadmore()" class="text-blue font-inter-700 text-xs">LOAD MORE</button>
                        </div>
                    </div>
                </ContentCard>
            </div>
        </div>
    </PageLayout>
</template>

<script>

import PageLayout from '../../pageLayout.vue'
import axios from 'axios'
import moment from 'moment'

export default {
    setup: () => ({
        title: 'Inbox'
    }),
    data () {
        return{
            inbox: [],
            limit: 10
        };
    },
    components: { PageLayout },
    async mounted() {
        //Get Tickets
        this.getInbox();
    },
    methods: {
        //Get Reports
        async getInbox(){
            const response = await axios.get('api/v1/inboxes');
            this.inbox = response.data.data;
        },
        //Format Display Settings
        format_date(value){
            if (value) {
                return moment(String(value)).format('LL')
            }
        },
        format_time(value){
            if (value) {
                return moment(String(value)).format('h:mma')
            }
        },
        async markRead(id){
            await axios.post('/api/v1/inboxes/mark_read', {
                id: id,
                isRead: 1
            })
            .then((res) => {
                this.getInbox();
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
        },
        async readAll(){
            await axios.post('/api/v1/inboxes/mark_all_read', {
                isRead: 1
            })
            .then((res) => {
                this.getInbox();
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
        },
        loadmore(){
            this.limit = this.limit + 2
            this.getInbox();
        }
    }
}
</script>