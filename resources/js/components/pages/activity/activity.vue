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
                    Export
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none" class="ml-4">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 15C-2.41411e-08 14.4477 0.447715 14 1 14H13C13.5523 14 14 14.4477 14 15C14 15.5523 13.5523 16 13 16H1C0.447715 16 2.41411e-08 15.5523 0 15ZM3.29289 7.29289C3.68342 6.90237 4.31658 6.90237 4.70711 7.29289L6 8.58579L6 1C6 0.447716 6.44771 2.41411e-08 7 0C7.55228 -2.41411e-08 8 0.447715 8 1L8 8.58579L9.29289 7.29289C9.68342 6.90237 10.3166 6.90237 10.7071 7.29289C11.0976 7.68342 11.0976 8.31658 10.7071 8.70711L7.70711 11.7071C7.51957 11.8946 7.26522 12 7 12C6.73478 12 6.48043 11.8946 6.29289 11.7071L3.29289 8.70711C2.90237 8.31658 2.90237 7.68342 3.29289 7.29289Z" :fill="vendorID ? '#1267E5' : '#ffffff'"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-12">
                <ContentCard>
                    <div class="grid grid-cols-2 gap-2 pb-4">
                        <div class="col-span-1 flex items-center">
                            <div @click="filterItemNumberDropdown = !filterItemNumberDropdown" class="mr-1 py-1.5 px-2.5 cursor-pointer relative bg-white text-xxs text-black font-opensans-600 border border-light rounded flex items-center">
                                {{ perpage }} <img src="/img/icon/filter.svg" class="ml-1">
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
                                        <button @click="activityOrder = 'action'; activityASC = !activityASC; orderedTickets();" class="filter-btn">Action<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="activityOrder = 'activity'; activityASC = !activityASC; orderedTickets();" class="filter-btn">Activity<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="activityOrder = 'agency'; activityASC = !activityASC; orderedTickets();" class="filter-btn">Agency<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="activityOrder = 'name'; activityOrderArray = 'user'; activityASC = !activityASC; orderedTickets();" class="filter-btn">User<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="activityOrder = 'created_at'; activityASC = !activityASC; orderedTickets();" class="filter-btn">Date<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-light relative" v-for="(act, index) in orderedTickets()" ref="activities">
                                    <td class="w-12 min-w-44">
                                        <router-link :to="'activity/'+act.id">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="15" viewBox="0 0 21 15" fill="none" class="m-auto block">
                                            <path d="M10.5 9.5C11.6046 9.5 12.5 8.60457 12.5 7.5C12.5 6.39543 11.6046 5.5 10.5 5.5C9.39544 5.5 8.50001 6.39543 8.50001 7.5C8.50001 8.60457 9.39544 9.5 10.5 9.5Z" fill="#1267E5"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.957764 7.50004C2.23202 3.44291 6.02232 0.5 10.5 0.5C14.9776 0.5 18.7679 3.44288 20.0422 7.49996C18.7679 11.5571 14.9776 14.5 10.4999 14.5C6.02232 14.5 2.23204 11.5571 0.957764 7.50004ZM14.5 7.5C14.5 9.70914 12.7091 11.5 10.5 11.5C8.29087 11.5 6.50001 9.70914 6.50001 7.5C6.50001 5.29086 8.29087 3.5 10.5 3.5C12.7091 3.5 14.5 5.29086 14.5 7.5Z" fill="#1267E5"/>
                                            </svg>
                                        </router-link>
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
                                <img src="/img/icon/previous.svg">
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
                                <img src="/img/icon/next.svg">
                            </button>
                        </div>
                    </div>
                </ContentCard>
            </div>
        </div>
    </PageLayout>
    <Modal modalTitle="Filters" v-show="modalActive && showModal == 'filterModal'" @close="closeModal">
        <template v-slot:body>
            <form onsubmit="return false"  class="block">
                <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                    <div class="col-span-2">
                        <label for="productservice" class="text-base text-blue-grey text-xs font-inter-700">User Type</label>
                        <div class="mt-2 w-full secondary-input" style="padding: 4px 0 0 0">
                            <v-select :filter="fuseSearch" :options="roles" :get-option-label="option => option.name" placeholder="Choose" v-model="fRole" :reduce="roles => roles.value">
                                <template #option="{ name }" >
                                    {{ name }}
                                </template>
                            </v-select>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="relative w-full">
                            <label for="from" class="text-base text-blue-grey text-xs font-inter-700">Date From</label>
                            <input type="date" v-model="fFrom" placeholder="Month DD, YYYY" name="from" id="from" class="mt-2 w-full secondary-input"/>
                            <img src="/img/icon/date-blue.svg" class="date-img">
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="relative w-full">
                            <label for="to" class="text-base text-blue-grey text-xs font-inter-700">Date To</label>
                            <input type="date" v-model="fTo" placeholder="Month DD, YYYY" name="to" id="to" class="mt-2 w-full secondary-input"/>
                            <img src="/img/icon/date-blue.svg" class="date-img">
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="relative w-full">
                            <label for="from" class="text-base text-blue-grey text-xs font-inter-700">Time From</label>
                            <input type="time" v-model="fTFrom" placeholder="Month DD, YYYY" name="from" id="from" class="mt-2 w-full secondary-input"/>
                            <img src="/img/icon/clock-active.svg" class="date-img">
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="relative w-full">
                            <label for="to" class="text-base text-blue-grey text-xs font-inter-700">Time To</label>
                            <input type="time" v-model="fTTo" placeholder="Month DD, YYYY" name="to" id="to" class="mt-2 w-full secondary-input"/>
                            <img src="/img/icon/clock-active.svg" class="date-img">
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <label for="selectagencies" class="text-base text-blue-grey text-xs font-inter-700">Agencies</label>
                            <input type="text" v-model="filterSearchAgency" placeholder="Search" name="selectagencies" id="selectagencies" class="mt-4 w-full secondary-input" style="padding-left: 35px;"/>
                            <img src="/img/icon/search.svg" class="search-img">
                        </div>
                        <div v-for="(agency, index) in agencies" ref="agencies" class="my-4 flex items-center">
                            <input type="checkbox" v-model="fAgencyValue" :value="agency.id">
                            <img :src="agency.logo" class="w-15 h-15 mx-4 rounded-full object-contain border border-light">
                            <p class="font-inter-400 text-black font-base">{{ agency.agency }}</p>
                        </div>
                    </div>
                </div>
            </form>
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-between w-full">
                <button @click="resetFilter()" class="mt-2 text-blue font-opensans-600 text-sm block text-center hover:underline">
                    RESET FILTERS
                </button>
                <button @click="filterList()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Apply
                </button>
            </div>
        </template>
    </Modal>
</template>

<script>

import PageLayout from '../../pageLayout.vue'
import ButtonCard from '../../utilities/buttonCard.vue'
import ContentCard from '../../utilities/contentCard.vue'
import Modal from '../../utilities/modal.vue'
import clickOutSide from "@mahdikhashan/vue3-click-outside"
import axios from 'axios'
import moment from 'moment'
import vSelect from 'vue-select'
import Fuse from 'fuse.js'

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
            fRole: '',
            roles: [{name: 'Super Admin', value: 'SUPER_ADMIN'}, {name: 'Admin', value: 'ADMIN'}, {name: 'Moderator', value: 'MODERATOR'}],
            fAgencyValue: [],
            fFrom: '',
            fTo: '',
            fTFrom: '',
            fTTo: '',
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
    components: { PageLayout, ButtonCard, ContentCard, Modal, vSelect},
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
        async filterList(){
            this.getActivities(0);
            this.isFiltering = true

            await axios.post('api/v1/filter/activity', {
                role: this.fRole,
                agency: this.fAgencyValue,
                from: this.fFrom,
                to: this.fTo,
                tfrom: this.fTFrom,
                tto: this.fTTo,
            })
            .then((success) => {
                this.responseFiltered = success.data.data
                this.closeModal();
            })
            .catch((error) => {
                console.log(error)
            })
        },
        resetFilter(){
          this.getActivities(0);
          this.isFiltering = false
            this.fRole = ''
            this.fStatus = ''
            this.fAgencyValue = []
            this.fFrom = ''
            this.fTo = ''
            this.fTFrom = ''
            this.fTTo = ''
        },
        //Get Activities
        async getActivities(page){
            this.pageNumber = page;
            const response = await axios.get('api/v1/activities');

            //Filter Modal
            if(!this.isFiltering){
                this.responseFiltered = response.data.data
            }

            //Filter Search Ticket
            const activitiesdata = this.responseFiltered.filter((a) => {
                const theFilter = (
                    a.action.includes(this.filterSearch) || a.action.toLowerCase().includes(this.filterSearch) ||
                    a.activity.includes(this.filterSearch) || a.activity.toLowerCase().includes(this.filterSearch) ||
                    a['user']['name'].includes(this.filterSearch) || a['user']['role'].includes(this.filterSearch) ||
                    a['user']['name'].toLowerCase().includes(this.filterSearch) || a['user']['role'].toLowerCase().includes(this.filterSearch) ||
                    a.created_at.includes(this.reDate) || a.created_at.includes(this.filterSearch)
                )
                return theFilter
            });
            this.activities = activitiesdata;
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
        fuseSearch(options, search) {
            const fuse = new Fuse(options, {
                keys: ['name'],
                shouldSort: true,
            })
            return search.length ? fuse.search(search).map(({ item }) => item): fuse.list
        }
    },
}
</script>
