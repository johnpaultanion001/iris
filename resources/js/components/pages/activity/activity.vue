<template>
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-12 md:col-span-6">
                <h1>{{ title }}</h1>
            </div>
            <div class="col-span-12 md:col-span-6 flex items-center justify-end flex-col md:flex-row">
                <button @click="openModal('filterModal')" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-center">
                    Filter
                </button>
                <button class="mt-1 md:mt-0 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-center">
                    Export <img src="/img/icon/export-white.png" class="ml-4">
                </button>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-12">
                <ContentCard>
                    <div class="grid grid-cols-2 gap-2 pb-4">
                        <div class="col-span-1 flex items-center">
                            <div @click="filterItemNumberDropdown = !filterItemNumberDropdown" class="mr-1 py-1.5 px-2.5 cursor-pointer relative bg-white text-xxs text-black font-opensans-600 border border-light rounded flex items-center">
                                {{ perpage }} <img src="/img/icon/filter.png" class="ml-1">
                                <div v-if="filterItemNumberDropdown" style="top:28px;right:-1px;left:-1px;" class="z-9 dropdown absolute border border-light rounded-b-lg bg-white shadow-secondary overflow-hidden">
                                    <div @click="perpage = 10" class="py-1.5 px-1 flex items-center hover:bg-lighter">
                                        <p class="w-full font-inter-400 text-xxs text-center text-black">10</p>
                                    </div>
                                    <div @click="perpage = 15" class="py-1.5 px-1 flex items-center hover:bg-lighter">
                                        <p class="w-full font-inter-400 text-xxs text-center text-black">15</p>
                                    </div>
                                    <div @click="perpage = 20" class="py-1.5 px-1 flex items-center hover:bg-lighter">
                                        <p class="w-full font-inter-400 text-xxs text-center text-black">20</p>
                                    </div>
                                    <div @click="perpage = 25" class="py-1.5 px-1 flex items-center hover:bg-lighter">
                                        <p class="w-full font-inter-250 text-xxs text-center text-black">40</p>
                                    </div>
                                    <div @click="perpage = 30" class="py-1.5 px-1 flex items-center hover:bg-lighter">
                                        <p class="w-full font-inter-400 text-xxs text-center text-black">30</p>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xxs text-lighttext m-0">entries per page</p>
                        </div>
                        <div class="col-span-1 flex justify-end relative">
                            <input v-model="filterSearch"  type="text" class="py-1.5 px-3 text-xxs rounded-lg border border-light focus-visible:border-blue-grey" placeholder="Search">
                        </div>
                    </div>
                    <div class="scroll-style overflow-auto mb-4">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="border-b border-light">
                                    <th class="p-2.5">
                                    </th>
                                    <th class="p-2.5">
                                        <button @click="activityOrder = 'action'; activityASC = !activityASC; orderedTickets();" class="filter-btn">Action<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="activityOrder = 'activity'; activityASC = !activityASC; orderedTickets();" class="filter-btn">Activity<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="activityOrder = 'agency'; activityASC = !activityASC; orderedTickets();" class="filter-btn">Agency<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="activityOrder = 'name'; activityOrderArray = 'user'; activityASC = !activityASC; orderedTickets();" class="filter-btn">User<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="activityOrder = 'created_at'; activityASC = !activityASC; orderedTickets();" class="filter-btn">Date<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-light relative" v-for="(act, index) in orderedTickets()" ref="activities">
                                    <td class="w-12 min-w-44">
                                        <router-link :to="'activity/'+act.id"><img src="/img/icon/show-active.png" style="width: 20px; height: 15px;" class="m-auto block"></router-link>
                                    </td>
                                    <td class="p-2.5 font-opensans-700 text-xxxs text-dark2">
                                        {{ act.action }}
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-dark2">
                                        <p class="ellipsis-2">{{ act.activity }}</p> 
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-white flex items-center whitespace-nowrap">
                                        <div class="flex items-center whitespace-nowrap" v-for="(item, index) in act.assigned_agencies" ref="activities">
                                            <div class="whitespace-nowrap" ref="activities">
                                                <span v-if="index <= 3" :style="'background-color:'+ item.color +';'" class="px-2 py-1 rounded-full mr-1 inline-block text-center w-auto min-w-52">{{ item.code }}</span>
                                                <span v-if="index == 3" style="background-color: #54A581" class="px-2 py-1 rounded-full mr-1 inline-block text-center">+{{ act.assigned_agencies.length - 4 }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxs">
                                        <p class="text-dark2 truncate">
                                            {{ act.user.name }}
                                        </p>
                                        <p class="text-lighttext truncate">
                                            {{ act.user.role }}
                                        </p>
                                    </td>
                                    <td class="p-2.5 font-opensans-400 text-xxxs text-dark2" ref="activities">
                                        {{ format_date(act.created_at) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-cont flex items-center justify-between">
                        <p class="text-xxs text-lighttext m-0">Showing {{ (perpage * (pageNumber)) + 1 }} to {{ activities.length > (perpage * (pageNumber + 1)) ? (perpage * (pageNumber + 1)) : activities.length }} of {{ activities.length }} entries</p>
                        <div v-if="activities.length > perpage" class="flex items-center justify-end">
                            <button @click="pageNumber >  0 ? updatePageNumber(pageNumber - 1) : null" :class="pageNumber >  0 ? 'bg-white hover:bg-lightergrey' : 'opacity-40 bg-lightergrey hover:bg-lightergrey'" class="mx-1 b-white hover:bg-lightergrey w-9 h-9 border border-lightgrey flex items-center justify-center rounded-full">
                                <img src="/img/icon/previous.png">
                            </button>
                            <button @click="updatePageNumber(0)" :class="pageNumber == 0 ? 'bg-blue hover:bg-blue text-white border-blue' : 'b-white hover:bg-lightergrey text-darkgrey border-lightergrey'" class="mx-1 font-inter-400 text-sm w-9 h-9 border flex items-center justify-center rounded-full">
                                1
                            </button>
                            <p v-if="pageNumber > (pageRange/2)">...</p>
                            <div v-for="pageIndex in paginateTotal" @click.prevent="updatePageNumber(pageIndex - 1)">
                                <button v-if="(pageIndex > pageStart && pageIndex < pageEnd && pageIndex != 1 && pageIndex != paginateTotal)" :class="(pageIndex - 1) == pageNumber ? 'bg-blue hover:bg-blue text-white border-blue' : 'b-white hover:bg-lightergrey text-darkgrey border-lightergrey'" class="mx-1 font-inter-400 text-sm w-9 h-9 border flex items-center justify-center rounded-full">
                                    {{ pageIndex }}
                                </button>
                            </div>
                            <p v-if="pageNumber < (paginateTotal - (pageRange/2))">...</p>
                            <button @click="updatePageNumber(paginateTotal - 1)" :class="pageNumber == (paginateTotal - 1) ? 'bg-blue hover:bg-blue text-white border-blue' : 'b-white hover:bg-lightergrey text-darkgrey border-lightergrey'" class="mx-1 font-inter-400 text-sm w-9 h-9 border flex items-center justify-center rounded-full">
                                {{ paginateTotal }}
                            </button>
                            <button @click="(paginateTotal - 1) > pageNumber ? updatePageNumber(pageNumber + 1) : null" :class="(paginateTotal - 1) > pageNumber ? 'bg-white hover:bg-lightergrey' : 'opacity-40 bg-lightergrey hover:bg-lightergrey'" class="mx-1 b-white hover:bg-lightergrey w-9 h-9 border border-lightergrey flex items-center justify-center rounded-full">
                                <img src="/img/icon/next.png">
                            </button>
                        </div>
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
import Modal from '../../utilities/modal.vue'
import clickOutSide from "@mahdikhashan/vue3-click-outside"
import axios from 'axios'
import moment from 'moment'

export default {
    setup: () => ({
        title: 'Activity',
    }),
    directives: {
        clickOutSide,
    },
    data () {
        return{
            //Show filters mobile
            showFilter: true,
            showFilterBtn: true,
            //Filter item number
            filterItemNumberDropdown: false,
            filterSearch: '',
            //Date Filter
            reDate: null,
            //Modal
            showModal: '',
            modalActive: false,
            modalTicketID: '',
            //Filter Modal
            dropdownToggle: '',
            //Agencies
            agencies: [],
            filterSearchAgency: '',
            //Tickets
            activities: [],
            activityOrder: 'created_at',
            activityOrderArray: '',
            activityASC: true,
            perpage: 10,
            pageNumber: 0,
            paginateTotal: 0,
            pageRange: 6,
            pageStart: 1,
            pageEnd: 5,
        };
    },
    components: { PageLayout, ButtonCard, ContentCard, Modal},
    async mounted() {
        //Get Tickets
        this.getActivities(0);
    },
    watch: {
        filterSearch: function() {
            this.getActivities(0);
            this.reDate = this.reformat_date(this.filterSearch);
        },
        filterSearchAgency: function() {
            this.getAgencies();
        },
        perpage: function() {
            this.getActivities(0);
        }
    },
    methods: {
        //Get Tickets
        async getActivities(page){
            this.pageNumber = page;
            const response = await axios.get('api/v1/activities');
            //Filter Search Ticket
            const responseFiltered = response.data.data.filter((a) => {
                const theFilter = (
                    a.action.includes(this.filterSearch) || a.action.toLowerCase().includes(this.filterSearch) ||
                    a.activity.includes(this.filterSearch) || a.activity.toLowerCase().includes(this.filterSearch) ||
                    a['user']['name'].includes(this.filterSearch) || a['user']['role'].includes(this.filterSearch) ||
                    a['user']['name'].toLowerCase().includes(this.filterSearch) || a['user']['role'].toLowerCase().includes(this.filterSearch) ||
                    a.created_at.includes(this.reDate) || a.created_at.includes(this.filterSearch)
                )
                return theFilter
            });
            this.activities = responseFiltered;
            //Pagination
            this.paginateTotal = Math.ceil(this.activities.length/this.perpage);
        },
        //Get Agencies
        async getAgencies(){
            this.pageNumber = 0;
            const response = await axios.get('api/v1/agencies');
            //Filter Agencies Ticket
            this.agencies = response.data.data.filter((a) => (a.agency.includes(this.filterSearchAgency) ||  a.agency.toLowerCase().includes(this.filterSearchAgency)));
        },
        //Display Sorted Tickets
        orderedTickets() {
            if(this.activityOrder == 'name'){
                if(this.activityASC){
                    return this.activities.sort((a, b) => (a[this.activityOrderArray][this.activityOrder] > b[this.activityOrderArray][this.activityOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }else{
                    return this.activities.sort((a, b) => (a[this.activityOrderArray][this.activityOrder] < b[this.activityOrderArray][this.activityOrder] ? -1 : 1) ).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }
            }
            else if(this.activityOrder == 'agency'){
                if(this.activityASC){
                    return this.activities.sort((a, b) => (a[this.activityOrder] > b[this.activityOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }else{
                    return this.activities.sort((a, b) => (a[this.activityOrder] < b[this.activityOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }
            }
            else{
                //normal sorting
                if(this.activityASC){
                    return this.activities.sort((a, b) => (a[this.activityOrder] > b[this.activityOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }else{
                    return this.activities.sort((a, b) => (a[this.activityOrder] < b[this.activityOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }
            }
        },
        //Format Display Settings
        format_date(value){
            if (value) {
                return moment(String(value)).format('LL')
            }
        },
        reformat_date(value){
            if (value) {
                return moment(String(value)).format('YYYY-MM-DD')
            }
        },
        //Modals
        openModal(itemID){
            document.querySelector('body').style.overflow = 'hidden';
            this.showModal = itemID;
            this.modalActive = true;
        },
        closeModal() {
            if(this.modalActive == true){
                document.querySelector('body').style.overflow = 'auto';
                this.modalActive = false;
            }
        },
        //Dropdown
        dropdownToggle(name){
            this.dropdownToggle = name;
        },
        //Pagination
        setPaginate(i) {
            if (this.pageNumber == 1) {
                return i < this.perpage;
            }
            else {
                return (i >= (this.perpage * (this.pageNumber - 1)) && i < (this.pageNumber * this.perpage));
            }
        },
        setStatus(status) {
            this.status_filter = status;
            this.$nextTick(function () {
                this.updatePaginate();
            });
        },
        updatePageNumber(i) {
            this.pageNumber = i;
            this.pageStart = i - this.pageRange/2;
            this.pageEnd = i + this.pageRange/2;
        },
        updatePaginate() {
            this.pageNumber = 1;
            this.paginateTotal = Math.ceil(this.activities.length/this.perpage);
        },
    },
}
</script>