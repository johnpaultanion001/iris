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
                        <div v-for="(report, index) in reports.slice(0, limit)">
                            <div @click.prevent="markRead(report.id)" :class="reports.length == index +1 ? 'border-0' : 'border-b border-light'" class="notification flex items-center justify-between  py-3 pl-3.5 pr-3.5 md:pr-8 bg-white hover:bg-lighter-grey">
                                <div class="notification flex items-center justify-between">
                                    <div class="p-3">
                                        <p :class="report.isRead == 0 ? 'font-inter-700 ' : 'font-inter-400'" class="text-base text-black">{{ report.title }}</p>
                                        <p class="font-inter-400 text-xs" style="color: #757575">{{ report.description }}</p>
                                    </div>
                                </div>
                                <div v-if="report.file" class="notification flex items-center hidden sm:block justify-between">
                                    <a :href="report.file" download>
                                        <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5 38C29.7173 38 38 29.7173 38 19.5C38 9.28273 29.7173 1 19.5 1C9.28273 1 1 9.28273 1 19.5C1 29.7173 9.28273 38 19.5 38Z" stroke="#1267E5"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 27C12 26.4477 12.4477 26 13 26H25C25.5523 26 26 26.4477 26 27C26 27.5523 25.5523 28 25 28H13C12.4477 28 12 27.5523 12 27ZM15.2929 19.2929C15.6834 18.9024 16.3166 18.9024 16.7071 19.2929L18 20.5858L18 13C18 12.4477 18.4477 12 19 12C19.5523 12 20 12.4477 20 13L20 20.5858L21.2929 19.2929C21.6834 18.9024 22.3166 18.9024 22.7071 19.2929C23.0976 19.6834 23.0976 20.3166 22.7071 20.7071L19.7071 23.7071C19.5196 23.8946 19.2652 24 19 24C18.7348 24 18.4804 23.8946 18.2929 23.7071L15.2929 20.7071C14.9024 20.3166 14.9024 19.6834 15.2929 19.2929Z" fill="#1267E5"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div v-if="reports.length > limit" class="py-4 px-8 bg-white">
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

export default {
    setup: () => ({
        title: 'Reports'
    }),
    data () {
        return{
            reports: [],
            limit: 10
        };
    },
    components: { PageLayout },
    async mounted() {
        //Get Tickets
        this.getReports();
    },
    methods: {
        //Get Reports
        async getReports(){
            const response = await axios.get('api/v1/reports');
            this.reports = response.data.data;
        },
        async markRead(id){
            await axios.post('/api/v1/reports/mark_read', {
                id: id,
                isRead: 1
            })
            .then((res) => {
                this.getReports();
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
        },
        async readAll(){
            await axios.post('/api/v1/reports/mark_all_read', {
                isRead: 1
            })
            .then((res) => {
                this.getReports();
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
        },
        loadmore(){
            this.limit = this.limit + 2
            this.getReports();
        }
    }
}
</script>