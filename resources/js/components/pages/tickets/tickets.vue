<template>
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-11 md:col-span-12 xl:col-span-6">
                <div class="ticket-tabs bg-grey p-1 rounded-xl flex">
                    <div @click="activeTab = 'All'" :class="activeTab === 'All' ? 'bg-white  shadow-third' : 'bg-transparent'" class="rounded-lg w-1/3 text-center">
                        <p class="text-xs sm:text-base truncate text-blue-grey font-inter-400 px-1 py-1.5">All</p>
                    </div>
                    <div @click="activeTab = 'My Agency'" :class="activeTab === 'My Agency' ? 'bg-white  shadow-third' : 'bg-transparent'" class="rounded-lg w-1/3 text-center">
                        <p class="text-xs sm:text-base truncate text-blue-grey font-inter-400 px-1 py-1.5">My Agency</p>
                    </div>
                    <div @click="activeTab = 'Following'" :class="activeTab === 'Following' ? 'bg-white  shadow-third' : 'bg-transparent'" class="rounded-lg w-1/3 text-center">
                        <p class="text-xs sm:text-base truncate text-blue-grey font-inter-400 px-1 py-1.5">Following (3)</p>
                    </div>
                </div>
            </div>
            <div v-if="showFilterBtn" class="col-span-1 flex items-center justify-end">
                <button @click="showFilter = !showFilter" class="w-fit bg-transparent rounded-lg">
                    <img src="/img/icon/filter-white.png" class="">
                </button>
            </div>
            <div v-if="showFilter" class="bg-white-25 sm:bg-transparent p-2.5 sm:p-0 rounded-lg col-span-12 xl:col-span-6 flex items-center justify-end flex-col md:flex-row flex-wrap">
                <button class="mt-1 md:mt-0 min-w-110 w-full md:w-fit text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-3.5 bg-white-25 text-white rounded-full flex items-center justify-center">
                    <img src="/img/icon/close-white.png" class="mr-4"> 3 Filters
                </button>
                <button class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-center">
                    Filter
                </button>
                <button class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-center">
                    Export <img src="/img/icon/export-white.png" class="ml-4">
                </button>
                <button class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    <img src="/img/icon/add-white.png" class="mr-2"> Create
                </button>
            </div>
        </div>
        <div class="mb-3 w-full overflow-auto flex items-center justify-start">
            <div :class="forReview ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
                <ButtonCard @click="forReview = !forReview" link="/tickets" arrow="false" cardTitle="For Review" value="10" icon="/img/icon/eye-active.png" />
            </div>
            <div :class="acknowledged ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
                <ButtonCard @click="acknowledged = !acknowledged" link="/tickets" arrow="false" cardTitle="Acknowledged" value="10" icon="/img/icon/like-active.png" />
            </div>
            <div :class="onGoing ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
                <ButtonCard @click="onGoing = !onGoing" link="/tickets" arrow="false" cardTitle="On-going" value="10" icon="/img/icon/clock-active.png" />
            </div>
            <div :class="resolved ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
                <ButtonCard @click="resolved = !resolved" link="/tickets" arrow="false" cardTitle="Resolved" value="10" icon="/img/icon/party-active.png" />
            </div>
            <div :class="invalid ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
                <ButtonCard @click="invalid = !invalid" link="/tickets" arrow="false" cardTitle="Invalid" value="10" icon="/img/icon/warning-active.png" />
            </div>
        </div>
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-12">
                <ContentCard cardTitle="Violations">
                    <div class="overflow-auto">
                        <table class="table-auto mb-5 w-full">
                            <thead>
                                <tr class="border-b border-light">
                                    <th class="p-2.5">
                                    </th>
                                    <th class="p-2.5">
                                    </th>
                                    <th class="p-2.5">
                                        <button class="filter-btn">Ticket No.<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button class="filter-btn">Reported By<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button class="filter-btn">Product/Service<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button class="filter-btn">Vendor Name<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button class="filter-btn">Complaint<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button class="filter-btn">Assigned Agency<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button class="filter-btn">Severity<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button class="filter-btn">Date Submitted<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-light">
                                    <td class="w-12 min-w-44"><img src="/img/icon/show-active.png" style="width: 20px; height: 15px;" class="m-auto block"></td>
                                    <td class="w-12 min-w-44"><img src="/img/icon/favorite-active.png" style="width: 11px; height: 17px;" class="m-auto block"></td>
                                    <td class="p-2.5 font-opensans-600 text-xxs text-dark2 text-center">12</td>
                                    <td class="p-2.5 font-opensans-600 text-xxs">
                                        <p class="text-dark2">Jesse Jacinto</p>
                                        <p class="text-lighttext">jesse@email.com</p>
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-dark2">Product Service Title</td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-dark2">VendorTech Inc.</td>
                                    <td class="p-2.5 font-opensans-400 text-xxxs text-dark2">
                                        <p class="ellipsis-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit elit, eu dignissim vitae cras. Integer consequat auctor sed condimentum justo, arcu non velit faucibus. Proin sit in elit ligula elit a. Ligula molestie maecenas a vestibulum.</p>
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-white">
                                        <span style="background: linear-gradient(237.38deg, #8A98EB 0%, #5E72E4 100%);" class="px-2 py-1 rounded-full mr-1 w-auto min-w-52">DOH</span>
                                        <span style="background-color: #0C9AB4;" class="px-2 py-1 rounded-full mr-1 w-auto min-w-52">PNP</span>
                                        <span style="background-color: #CEBA00" class="px-2 py-1 rounded-full mr-1 w-auto min-w-52">DA</span>
                                        <span style="background-color: #54A581" class="px-2 py-1 rounded-full mr-1">+2</span>
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-white text-center">
                                        <span style="background-color: #F2994A;" class="px-2 py-1 rounded mr-1 w-auto min-w-52">Medium</span>
                                    </td>
                                    <td class="p-2.5 font-opensans-400 text-xxxs text-dark2">May 27, 2023</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </ContentCard>
            </div>
        </div>
    </PageLayout>
</template>

<script>

import PageLayout from '../../pageLayout.vue'
import ButtonCard from '../../utilities/buttonCard.vue'
import ContentCard from '../../utilities/contentCard.vue'

export default {
    setup: () => ({
        title: 'Tickets'
    }),
    data () {
        return{
            //Filter Buttons
            forReview: true,
            acknowledged: false,
            onGoing: false,
            resolved: false,
            invalid: false,
            //Show filters mobile
            showFilter: true,
            showFilterBtn: true,
            //Tabs
            activeTab: 'All'
        };
    },
    components: { PageLayout, ButtonCard, ContentCard },
    mounted() {
        this.isMobile(); //hides filter menu on mobile
        window.addEventListener("resize", this.isMobile); //hides filter menu on mobile when resized
    },
    methods: {
        isMobile() {
            if( screen.width <= 768 ) {
                this.showFilter = false;
                this.showFilterBtn = true;
            }
            else {
                this.showFilter = true;
                this.showFilterBtn = false;
            }
        }
    },
}
</script>