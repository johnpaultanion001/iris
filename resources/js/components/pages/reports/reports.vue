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
                                    <a :href="report.file" download><img src="/img/icon/download.png"></a>
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