<template>
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-12 md:col-span-6">
                <h1>{{ title }}</h1>
            </div>
            <div class="col-span-12 md:col-span-6 flex items-center justify-end flex-col md:flex-row">
                <div @click="filterDaysDropdown = !filterDaysDropdown" class="cursor-pointer w-full md:w-fit relative bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-between">
                    {{ filterDays }} 
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none" class="ml-4">
                        <path d="M12.8334 1.5L7.00002 7.33333L1.16669 1.5" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div v-if="filterDaysDropdown" class="dropdown absolute border border-white rounded-b-lg bg-white shadow-secondary overflow-hidden">
                        <div to="/user-profile" class="py-3 px-5 text-sm font-opensans-600 flex items-center hover:bg-lighter">
                            <p class="font-inter-400 text-sm text-black">Last 10 Days</p>
                        </div>
                        <div to="/" class="py-3 px-5 text-sm font-opensans-600 flex items-center hover:bg-lighter">
                            <p class="font-inter-400 text-sm text-black">Last Week</p>
                        </div>
                    </div>
                </div>
                <button class="mt-1 md:mt-0 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-center">
                    Export 
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none" class="ml-4">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 15C-2.41411e-08 14.4477 0.447715 14 1 14H13C13.5523 14 14 14.4477 14 15C14 15.5523 13.5523 16 13 16H1C0.447715 16 2.41411e-08 15.5523 0 15ZM3.29289 7.29289C3.68342 6.90237 4.31658 6.90237 4.70711 7.29289L6 8.58579L6 1C6 0.447716 6.44771 2.41411e-08 7 0C7.55228 -2.41411e-08 8 0.447715 8 1L8 8.58579L9.29289 7.29289C9.68342 6.90237 10.3166 6.90237 10.7071 7.29289C11.0976 7.68342 11.0976 8.31658 10.7071 8.70711L7.70711 11.7071C7.51957 11.8946 7.26522 12 7 12C6.73478 12 6.48043 11.8946 6.29289 11.7071L3.29289 8.70711C2.90237 8.31658 2.90237 7.68342 3.29289 7.29289Z" fill="#FFFFFF"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-12 md:col-span-7">
                <ContentCard cardTitle="Complaints Trend">
                </ContentCard>
            </div>
            <div class="col-span-12 md:col-span-5">
                <ContentCard cardTitle="Tickets">
                    <div class="grid grid-cols-7 gap-4">
                        <div class="col-span-12 lg:col-span-3">
                            <router-link to="/tickets" class="cursor-pointer shadow-main rounded block text-center w-full p-3 bg-blue text-white font-opensans-600 text-sm">
                                View All Tickets
                            </router-link>
                        </div>
                        <div class="col-span-12 lg:col-span-4 pr-9">
                            <table class="table-auto mb-5 w-full">
                                <tbody>
                                    <tr class="border-b border-light" v-for="(dept, index) in alldept">
                                        <td class="flex items-center">
                                            <img v-if="index != 'others'" :src="'/img/agency_logos/'+index+'.png'" class="rounded-full w-10 py-2.5">
                                            <svg v-else xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none" class="rounded-full w-10 my-2.5">
                                                <circle cx="20" cy="20" r="19.5" fill="#F5F7FA" stroke="#1267E5"/>
                                                <path d="M13 20H13.01M20 20H20.01M27 20H27.01M14 20C14 20.5523 13.5523 21 13 21C12.4477 21 12 20.5523 12 20C12 19.4477 12.4477 19 13 19C13.5523 19 14 19.4477 14 20ZM21 20C21 20.5523 20.5523 21 20 21C19.4477 21 19 20.5523 19 20C19 19.4477 19.4477 19 20 19C20.5523 19 21 19.4477 21 20ZM28 20C28 20.5523 27.5523 21 27 21C26.4477 21 26 20.5523 26 20C26 19.4477 26.4477 19 27 19C27.5523 19 28 19.4477 28 20Z" stroke="#1267E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <p v-if="index != 'others'" class="p-2.5 text-center font-opensans-600 text-sm text-black">{{ index.toUpperCase() }}</p>
                                            <p v-else class="p-2.5 text-center font-opensans-600 text-sm text-black">Others</p>
                                        </td>
                                        <td class="p-2.5 text-right font-opensans-600 text-sm text-blue-grey">{{ dept }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </ContentCard>
            </div>
            <div class="col-span-12 md:col-span-6">
                <ContentCard cardTitle="Platforms">
                    <div class="platforms pt-2.5 mb-5">
                        <div class="platform py-2">
                            <div class="flex items-center justify-between mt-1.5 mb-2">
                                <div class="flex items-center mb-1">
                                    <!-- <img src="/img/icon/settings.png" class=""> -->
                                    <p class="text-sm font-opensans-600 text-blue-grey ml-1">Facebook</p>
                                </div>
                                <div>
                                    <p class="text-sm font-opensans-600 text-blue-grey">{{ Math.round((alltickets.filter((a) => (a.platform.toLowerCase() == 'facebook')).length / alltickets.length) * 100)/1 }}%</p>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="w-full bg-light rounded-lg h-2">
                                    <div :style="'width:'+ ((alltickets.filter((a) => (a.platform.toLowerCase() == 'facebook')).length / alltickets.length) * 100) + '%'" class="bg-black rounded-lg h-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="platform py-2">
                            <div class="flex items-center justify-between mt-1.5 mb-2">
                                <div class="flex items-center mb-1">
                                    <!-- <img src="/img/icon/settings.png" class=""> -->
                                    <p class="text-sm font-opensans-600 text-blue-grey ml-1">Twitter</p>
                                </div>
                                <div>
                                    <p class="text-sm font-opensans-600 text-blue-grey">{{ Math.round((alltickets.filter((a) => (a.platform.toLowerCase() == 'twitter')).length / alltickets.length) * 100)/1 }}%</p>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="w-full bg-light rounded-lg h-2">
                                    <div :style="'width:'+ ((alltickets.filter((a) => (a.platform.toLowerCase() == 'twitter')).length / alltickets.length) * 100) + '%'" class="bg-black rounded-lg h-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="platform py-2">
                            <div class="flex items-center justify-between mt-1.5 mb-2">
                                <div class="flex items-center mb-1">
                                    <!-- <img src="/img/icon/settings.png" class=""> -->
                                    <p class="text-sm font-opensans-600 text-blue-grey ml-1">Reddit</p>
                                </div>
                                <div>
                                    <p class="text-sm font-opensans-600 text-blue-grey">{{ Math.round((alltickets.filter((a) => (a.platform.toLowerCase() == 'reddit')).length / alltickets.length) * 100)/1 }}%</p>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="w-full bg-light rounded-lg h-2">
                                    <div :style="'width:'+ ((alltickets.filter((a) => (a.platform.toLowerCase() == 'reddit')).length / alltickets.length) * 100) + '%'" class="bg-black rounded-lg h-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="platform py-2">
                            <div class="flex items-center justify-between mt-1.5 mb-2">
                                <div class="flex items-center mb-1">
                                    <!-- <img src="/img/icon/settings.png" class=""> -->
                                    <p class="text-sm font-opensans-600 text-blue-grey ml-1">Youtube</p>
                                </div>
                                <div>
                                    <p class="text-sm font-opensans-600 text-blue-grey">{{ Math.round((alltickets.filter((a) => (a.platform.toLowerCase() == 'youtube')).length / alltickets.length) * 100)/1 }}%</p>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="w-full bg-light rounded-lg h-2">
                                    <div :style="'width:'+ ((alltickets.filter((a) => (a.platform.toLowerCase() == 'youtube')).length / alltickets.length) * 100) + '%'" class="bg-black rounded-lg h-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="platform py-2">
                            <div class="flex items-center justify-between mt-1.5 mb-2">
                                <div class="flex items-center mb-1">
                                    <!-- <img src="/img/icon/settings.png" class=""> -->
                                    <p class="text-sm font-opensans-600 text-blue-grey ml-1">Testing</p>
                                </div>
                                <div>
                                    <p class="text-sm font-opensans-600 text-blue-grey">{{ Math.round((alltickets.filter((a) => (a.platform.toLowerCase() == 'testing')).length / alltickets.length) * 100)/1 }}%</p>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="w-full bg-light rounded-lg h-2">
                                    <div :style="'width:'+ ((alltickets.filter((a) => (a.platform.toLowerCase() == 'testing')).length / alltickets.length) * 100) + '%'" class="bg-black rounded-lg h-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </ContentCard>
            </div>
            <div class="col-span-12 md:col-span-6">
                <ContentCard cardTitle="Violations">
                    <table class="table-auto mb-5 w-full">
                        <thead>
                            <tr class="border-b border-light">
                                <th class="p-2.5">
                                    <button class="filter-btn">Violation<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                </th>
                                <th class="p-2.5 text-center">
                                    <button class="filter-btn m-auto">Frequency<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-light" v-for="items in allviolations">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">{{ items.violation }}</td>
                                <td class="p-2.5 text-center font-opensans-600 text-xxs">{{ items.frequency }}</td>
                            </tr>
                        </tbody>
                    </table>
                </ContentCard>
            </div>
        </div>
        <div class="pt-8 pb-2">
            <p class="font-opensans-600 text-xs text-blue-grey">Ticket Status</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-3">
            <div class="col-span-2 md:col-span-1">
                <ButtonCard link="/tickets/FOR_REVIEW" arrow="true" cardTitle="For Review" :value="alltickets.filter((a) => (a.status == 'FOR_REVIEW')).length">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.80002 8.7999C8.80002 7.47442 9.87454 6.3999 11.2 6.3999C12.5255 6.3999 13.6 7.47442 13.6 8.7999C13.6 10.1254 12.5255 11.1999 11.2 11.1999C10.537 11.1999 9.9386 10.9326 9.50297 10.497C9.06734 10.0613 8.80002 9.46298 8.80002 8.7999Z" fill="#1267E6"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 19.5999C15.302 19.5999 19.6 15.3018 19.6 9.9999C19.6 4.69797 15.302 0.399902 10 0.399902C4.69809 0.399902 0.400024 4.69797 0.400024 9.9999C0.400024 15.3018 4.69809 19.5999 10 19.5999ZM11.2 3.9999C8.54906 3.9999 6.40002 6.14894 6.40002 8.7999C6.40002 9.68956 6.64278 10.5236 7.06478 11.2381L4.3515 13.9514C3.88287 14.42 3.88287 15.1798 4.3515 15.6484C4.82013 16.1171 5.57992 16.1171 6.04855 15.6484L8.76184 12.9351C9.47637 13.3572 10.3104 13.5999 11.2 13.5999C13.851 13.5999 16 11.4509 16 8.7999C16 6.14894 13.851 3.9999 11.2 3.9999Z" fill="#1267E6"/>
                    </svg> 
                </ButtonCard>
            </div>
            <div class="col-span-2 md:col-span-1">
                <ButtonCard link="/tickets/ACKNOWLEDGED" arrow="true" cardTitle="Acknowledged" :value="alltickets.filter((a) => (a.status == 'ACKNOWLEDGED')).length"  icon="/img/icon/warning-blue.svg">
                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.90835 1.71849C8.82588 0.0873266 11.1744 0.0873257 12.0919 1.71849L18.7883 13.6231C19.6882 15.223 18.5321 17.1998 16.6965 17.1998H3.30376C1.46818 17.1998 0.312066 15.223 1.21198 13.6231L7.90835 1.71849ZM11.2 13.5999C11.2 14.2626 10.6628 14.7999 10 14.7999C9.33728 14.7999 8.80002 14.2626 8.80002 13.5999C8.80002 12.9372 9.33728 12.3999 10 12.3999C10.6628 12.3999 11.2 12.9372 11.2 13.5999ZM10 3.9999C9.33728 3.9999 8.80002 4.53716 8.80002 5.1999V8.7999C8.80002 9.46264 9.33728 9.9999 10 9.9999C10.6628 9.9999 11.2 9.46264 11.2 8.7999V5.1999C11.2 4.53716 10.6628 3.9999 10 3.9999Z" fill="#1267E6"/>
                    </svg>
                </ButtonCard>
            </div>
            <div class="col-span-2 md:col-span-1">
                <ButtonCard link="/tickets/ON_GOING" arrow="true" cardTitle="On-going" :value="alltickets.filter((a) => (a.status == 'ON_GOING')).length"  icon="/img/icon/flag.svg">
                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.599976 4.2001C0.599976 2.21187 2.21175 0.600098 4.19997 0.600098H16.2C16.6545 0.600098 17.07 0.856901 17.2733 1.26344C17.4765 1.66998 17.4327 2.15648 17.16 2.5201L14.1 6.6001L17.16 10.6801C17.4327 11.0437 17.4765 11.5302 17.2733 11.9368C17.07 12.3433 16.6545 12.6001 16.2 12.6001H4.19997C3.53723 12.6001 2.99997 13.1374 2.99997 13.8001V17.4001C2.99997 18.0628 2.46271 18.6001 1.79997 18.6001C1.13723 18.6001 0.599976 18.0628 0.599976 17.4001V4.2001Z" fill="#1267E6"/>
                    </svg>
                </ButtonCard>
            </div>
            <div class="col-span-2 md:col-span-1">
                <ButtonCard link="/tickets/RESOLVED" arrow="true" cardTitle="Resolved" :value="alltickets.filter((a) => (a.status == 'RESOLVED')).length"  icon="/img/icon/penalties.svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99997 0.399902C10.6627 0.399902 11.2 0.937161 11.2 1.5999V3.18746L15.9453 5.0856L17.8633 4.12659C18.4561 3.8302 19.1769 4.07047 19.4733 4.66325C19.7697 5.25602 19.5294 5.97683 18.9366 6.27322L17.4568 7.01311L19.5426 13.5167C19.6873 13.9677 19.5531 14.4615 19.2003 14.7774C18.3518 15.5367 17.2286 15.9999 16 15.9999C14.7714 15.9999 13.6481 15.5367 12.7997 14.7774C12.4468 14.4615 12.3127 13.9677 12.4573 13.5167L14.5157 7.09862L11.2 5.77234V17.1999H13.6C14.2627 17.1999 14.8 17.7372 14.8 18.3999C14.8 19.0626 14.2627 19.5999 13.6 19.5999H6.39997C5.73723 19.5999 5.19997 19.0626 5.19997 18.3999C5.19997 17.7372 5.73723 17.1999 6.39997 17.1999H8.79997V5.77234L5.48427 7.09862L7.54264 13.5167C7.68727 13.9677 7.55315 14.4615 7.20027 14.7774C6.35186 15.5367 5.22857 15.9999 3.99998 15.9999C2.77138 15.9999 1.6481 15.5367 0.799685 14.7774C0.446804 14.4615 0.312682 13.9677 0.45731 13.5167L2.54311 7.01311L1.06332 6.27322C0.470551 5.97683 0.230283 5.25602 0.526669 4.66325C0.823056 4.07047 1.54386 3.8302 2.13664 4.12659L4.05464 5.0856L8.79997 3.18746V1.5999C8.79997 0.937161 9.33723 0.399902 9.99997 0.399902ZM3.99998 10.3293L3.01809 13.3908C3.31759 13.5253 3.64961 13.5999 3.99998 13.5999C4.35034 13.5999 4.68236 13.5253 4.98186 13.3908L3.99998 10.3293ZM16 10.3293L15.0181 13.3908C15.3176 13.5253 15.6496 13.5999 16 13.5999C16.3503 13.5999 16.6823 13.5253 16.9818 13.3908L16 10.3293Z" fill="#1267E6"/>
                    </svg>
                </ButtonCard>
            </div>
            <div class="col-span-2 md:col-span-1">
                <ButtonCard link="/tickets/INVALID" arrow="true" cardTitle="Invalid" :value="alltickets.filter((a) => (a.status == 'INVALID')).length"  icon="/img/icon/invalid-blue.svg">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.6 9.9999C19.6 15.3018 15.3019 19.5999 9.99999 19.5999C4.69806 19.5999 0.399994 15.3018 0.399994 9.9999C0.399994 4.69797 4.69806 0.399902 9.99999 0.399902C15.3019 0.399902 19.6 4.69797 19.6 9.9999ZM14.1719 15.8687C12.9949 16.7069 11.555 17.1999 9.99999 17.1999C6.02354 17.1999 2.79999 13.9764 2.79999 9.9999C2.79999 8.44487 3.29297 7.00497 4.13116 5.82798L14.1719 15.8687ZM15.869 14.1717L5.82824 4.13094C7.00521 3.29283 8.44504 2.7999 9.99999 2.7999C13.9764 2.7999 17.2 6.02345 17.2 9.9999C17.2 11.5549 16.7071 12.9947 15.869 14.1717Z" fill="#1267E6"/>
                    </svg>
                </ButtonCard>
            </div>
        </div>
    </PageLayout>
</template>

<style scoped>
.dropdown{
    right: -1px;
    left: -1px;
    top: 36px;
}
</style>

<script>

import PageLayout from '../../pageLayout.vue'
import ContentCard from '../../utilities/contentCard.vue'
import ButtonCard from '../../utilities/buttonCard.vue'
import axios from 'axios'

export default {
    setup: () => ({
        title: 'Dashboard'
    }),
    data () {
        return{
            filterDays: 'Last 30 Days',
            filterDaysDropdown: false,
            alltickets: [],
            allviolations: [],
            alldept: null,
        };
    },
    async mounted() {
        //Get All Tickets for getting length
        this.getAllTickets();
        this.getAllViolations();
        this.getAllDepartment();
    },
    components: { PageLayout, ContentCard, ButtonCard },
    methods: {
        //Tickets
        async getAllTickets(){
            const response = await axios.get('api/v1/tickets');
            this.alltickets = response.data.data;
        },
        //Violations
        async getAllViolations(){
            const response = await axios.get('api/v1/dashboard_violation');
            this.allviolations = response.data.data;
        },
        //Department
        async getAllDepartment(){
            const response = await axios.get('api/v1/count_ticket_status');
            this.alldept = response.data.agencies;
        },
    }
}
</script>
