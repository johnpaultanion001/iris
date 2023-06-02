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
                <ContentCard class="py-4">
                    <div class="grid grid-cols-2 gap-2 pb-4 px-4">
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
                                        <img src="/img/icon/filter.svg" class="ml-1.5">
                                    </th>
                                    <th class="p-2.5">
                                        <button @click="rvendorsOrder = 'vendor_name'; rvendorsASC = !rvendorsASC; orderedTickets();" class="filter-btn">Vendor Name<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="rvendorsOrder = 'city'; rvendorsASC = !rvendorsASC; orderedTickets();" class="filter-btn">City<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="rvendorsOrder = 'no_of_tickets'; rvendorsASC = !rvendorsASC; orderedTickets();" class="filter-btn mx-auto">No. of Tickets<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="rvendorsOrder = 'no_of_violations'; rvendorsASC = !rvendorsASC; orderedTickets();" class="filter-btn mx-auto">No. of Violations<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="rvendorsOrder = 'updated_at'; rvendorsASC = !rvendorsASC; orderedTickets();" class="filter-btn">Date Updated<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="rvendorsOrder = 'created_at'; rvendorsASC = !rvendorsASC; orderedTickets();" class="filter-btn">Date Added<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-light relative" v-for="(rvendor, index) in orderedTickets()" ref="rvendors">
                                    <td class="w-12 min-w-44">
                                        <router-link :to="'/vendor-profile/'+rvendor.id">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="15" viewBox="0 0 21 15" fill="none" class="m-auto block">
                                            <path d="M10.5 9.5C11.6046 9.5 12.5 8.60457 12.5 7.5C12.5 6.39543 11.6046 5.5 10.5 5.5C9.39544 5.5 8.50001 6.39543 8.50001 7.5C8.50001 8.60457 9.39544 9.5 10.5 9.5Z" fill="#1267E5"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.957764 7.50004C2.23202 3.44291 6.02232 0.5 10.5 0.5C14.9776 0.5 18.7679 3.44288 20.0422 7.49996C18.7679 11.5571 14.9776 14.5 10.4999 14.5C6.02232 14.5 2.23204 11.5571 0.957764 7.50004ZM14.5 7.5C14.5 9.70914 12.7091 11.5 10.5 11.5C8.29087 11.5 6.50001 9.70914 6.50001 7.5C6.50001 5.29086 8.29087 3.5 10.5 3.5C12.7091 3.5 14.5 5.29086 14.5 7.5Z" fill="#1267E5"/>
                                            </svg>
                                        </router-link>
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxs">
                                        <p class="text-dark2 truncate">
                                            {{ rvendor.vendor_name }}
                                        </p>
                                        <p class="text-lighttext truncate">
                                            {{ rvendor.email }}
                                        </p>
                                    </td>
                                    <td class="p-2.5 font-opensans-700 text-xxxs text-dark2 whitespace-nowrap">
                                        {{ rvendor.city }}
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-center text-dark2">
                                       {{ rvendor.no_of_tickets }}
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-center text-dark2">
                                       {{ rvendor.no_of_violations }}
                                    </td>
                                    <td class="p-2.5 font-opensans-400 text-xxxs text-dark2" ref="rvendors">
                                        {{ format_date(rvendor.updated_at) }}
                                    </td>
                                    <td class="p-2.5 font-opensans-400 text-xxxs text-dark2" ref="rvendors">
                                        {{ format_date(rvendor.created_at) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-cont flex items-center justify-between px-4">
                        <p class="text-xxs text-lighttext m-0">Showing {{ (perpage * (pageNumber)) + 1 }} to {{ rvendors.length > (perpage * (pageNumber + 1)) ? (perpage * (pageNumber + 1)) : rvendors.length }} of {{ rvendors.length }} entries</p>
                        <div v-if="rvendors.length > perpage" class="flex items-center justify-end">
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
        <Modal modalTitle="Filters" v-show="modalActive && showModal == 'filterModal'" @close="closeModal">
            <template v-slot:body>
                <form onsubmit="return false"  class="block">
                    <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                        <div class="col-span-2">
                            <label for="city" class="text-base text-blue-grey text-xs font-inter-700">City</label>
                            <div class="mt-2 w-full secondary-input" style="padding: 4px 0 0 0">
                                <v-select :filter="fuseSearch" :options="cities" :get-option-label="(option) => option.name" placeholder="Choose" v-model="fCity" :reduce="cities => cities.name">
                                    <template #option="{ name }">
                                        {{ name }}
                                    </template>
                                </v-select>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="relative w-full">
                                <label for="from" class="text-base text-blue-grey text-xs font-inter-700">From</label>
                                <input type="date" v-model="fFrom" placeholder="Month DD, YYYY" name="from" id="from" class="mt-2 w-full secondary-input"/>
                                <img src="/img/icon/date-blue.svg" class="date-img">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="relative w-full">
                                <label for="to" class="text-base text-blue-grey text-xs font-inter-700">To</label>
                                <input type="date" v-model="fTill" placeholder="Month DD, YYYY" name="to" id="to" class="mt-2 w-full secondary-input"/>
                                <img src="/img/icon/date-blue.svg" class="date-img">
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
import vSelect from 'vue-select'
import Fuse from 'fuse.js'

export default {
    setup: () => ({
        title: 'Reported Vendors',
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
            responseFiltered: '',
            //Date Filter
            reDate: null,
            //Modal
            showModal: '',
            modalActive: false,
            modalTicketID: '',
            //Filter Modal
            isFiltering: false,
            fCity: '',
            fFrom: '',
            fTill: '',
            //Tickets
            rvendors: [],
            rvendorsOrder: 'created_at',
            rvendorsOrderArray: '',
            rvendorsASC: true,
            perpage: 10,
            pageNumber: 0,
            paginateTotal: 0,
            pageRange: 6,
            pageStart: 1,
            pageEnd: 5,
            //Cities
            filteredCities: [],
            vCity: null,
            cityDD: false,
            cities: [{name: 'Alaminos'}, {name: 'Angeles City'}, {name: 'Antipolo'}, {name: 'Bacolod'}, {name: 'Bacoor'}, {name: 'Bago'}, {name: 'Baguio'}, {name: 'Bais'}, {name: 'Balanga'}, {name: 'Baliwag'}, {name: 'Batac'}, {name: 'Batangas City'}, {name: 'Bayawan'}, {name: 'Baybay'}, {name: 'Bayugan'}, {name: 'Biñan'}, {name: 'Bislig'}, {name: 'Bogo'}, {name: 'Borongan'}, {name: 'Butuan'}, {name: 'Cabadbaran'}, {name: 'Cabanatuan'}, {name: 'Cabuyao'}, {name: 'Cadiz'}, {name: 'Cagayan de Oro'}, {name: 'Calaca'}, {name: 'Calamba'}, {name: 'Calapan'}, {name: 'Calbayog'}, {name: 'Caloocan'}, {name: 'Candon'}, {name: 'Canlaon'}, {name: 'Carcar'}, {name: 'Catbalogan'}, {name: 'Cauayan'}, {name: 'Cavite City'}, {name: 'Cebu City'}, {name: 'Cotabato City'}, {name: 'Dagupan'}, {name: 'Danao'}, {name: 'Dapitan'}, {name: 'Dasmariñas'}, {name: 'Davao City'}, {name: 'Digos'}, {name: 'Dipolog'}, {name: 'Dumaguete'}, {name: 'El Salvador'}, {name: 'Escalante'}, {name: 'Gapan'}, {name: 'General Santos'}, {name: 'General Trias'}, {name: 'Gingoog'}, {name: 'Guihulngan'}, {name: 'Himamaylan'}, {name: 'Ilagan'}, {name: 'Iligan'}, {name: 'Iloilo City'}, {name: 'Imus'}, {name: 'Iriga'}, {name: 'Isabela'}, {name: 'Kabankalan'}, {name: 'Kidapawan'}, {name: 'Koronadal'}, {name: 'La Carlota'}, {name: 'Lamitan'}, {name: 'Laoag'}, {name: 'Lapu-Lapu City'}, {name: 'Las Piñas'}, {name: 'Legazpi'}, {name: 'Ligao'}, {name: 'Lipa'}, {name: 'Lucena'}, {name: 'Maasin'}, {name: 'Mabalacat'}, {name: 'Makati'}, {name: 'Malabon'}, {name: 'Malaybalay'}, {name: 'Malolos'}, {name: 'Mandaluyong'}, {name: 'Mandaue'}, {name: 'Manila'}, {name: 'Marawi'}, {name: 'Marikina'}, {name: 'Masbate City'}, {name: 'Mati'}, {name: 'Meycauayan'}, {name: 'Muñoz'}, {name: 'Muntinlupa'}, {name: 'Naga'}, {name: 'Naga'}, {name: 'Navotas'}, {name: 'Olongapo'}, {name: 'Ormoc'}, {name: 'Oroquieta'}, {name: 'Ozamiz'}, {name: 'Pagadian'}, {name: 'Palayan'}, {name: 'Panabo'}, {name: 'Parañaque'}, {name: 'Pasay'}, {name: 'Pasig'}, {name: 'Passi'}, {name: 'Puerto Princesa'}, {name: 'Quezon City'}, {name: 'Roxas'}, {name: 'Sagay'}, {name: 'Samal'}, {name: 'San Carlos'}, {name: 'San Carlos'}, {name: 'San Fernando'}, {name: 'San Fernando'}, {name: 'San Jose'}, {name: 'San Jose del Monte'}, {name: 'San Juan'}, {name: 'San Pablo'}, {name: 'San Pedro'}, {name: 'Santa Rosa'}, {name: 'Santo Tomas'}, {name: 'Santiago'}, {name: 'Silay'}, {name: 'Sipalay'}, {name: 'Sorsogon City'}, {name: 'Surigao City'}, {name: 'Tabaco'}, {name: 'Tabuk'}, {name: 'Tacloban'}, {name: 'Tacurong'}, {name: 'Tagaytay'}, {name: 'Tagbilaran'}, {name: 'Taguig'}, {name: 'Tagum'}, {name: 'Talisay'}, {name: 'Talisay'}, {name: 'Tanauan'}, {name: 'Tandag'}, {name: 'Tangub'}, {name: 'Tanjay'}, {name: 'Tarlac City'}, {name: 'Tayabas'}, {name: 'Toledo'}, {name: 'Trece Martires'}, {name: 'Tuguegarao'}, {name: 'Urdaneta'}, {name: 'Valencia'}, {name: 'Valenzuela'}, {name: 'Victorias'}, {name: 'Vigan'}, {name: 'Zamboanga City'}],
        };
    },
    components: { PageLayout, ButtonCard, ContentCard, Modal, vSelect},
    async mounted() {
        //Get Tickets
        this.getRvendors(0);
    },
    watch: {
        filterSearch: function() {
            this.getRvendors(0);
            this.reDate = this.reformat_date(this.filterSearch);
        },
        perpage: function() {
            this.getRvendors(0);
        }
    },
    methods: {
        async filterList(){
            this.getRvendors(0)
            this.isFiltering = true

            await axios.post('api/v1/filter/vendors', {
                city: this.fCity,
                from: this.reformat_date(this.fFrom),
                till: this.reformat_date(this.fTill)
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
           this.getRvendors(0);
            this.isFiltering = false
            this.fCity = ''
            this.fFrom = ''
            this.fTo = ''
        },
        //Get Vendors
        async getRvendors(page){
            this.pageNumber = page;
            const response = await axios.get('api/v1/reported_vendors');

            //Filter Modal
            if(!this.isFiltering){
                this.responseFiltered = response.data.data
            }

            //Filter Search Ticket
            const vendorsdata = this.responseFiltered.filter((a) => {
                const theFilter = (
                    a.vendor_name.includes(this.filterSearch) || a.vendor_name.toLowerCase().includes(this.filterSearch) ||
                    a.email.includes(this.filterSearch) || a.email.toLowerCase().includes(this.filterSearch) ||
                    a.city.includes(this.filterSearch) || a.city.toLowerCase().includes(this.filterSearch) ||
                    a.no_of_tickets == this.filterSearch || a.no_of_violations == this.filterSearch ||
                    a.created_at.includes(this.reDate) || a.created_at.includes(this.filterSearch)||
                    a.updated_at.includes(this.reDate) || a.updated_at.includes(this.filterSearch)
                )
                return theFilter
            });

            this.rvendors = vendorsdata;
            //Pagination
            this.paginateTotal = Math.ceil(this.rvendors.length/this.perpage);
        },
        //Display Sorted Tickets
        orderedTickets() {
            if(this.rvendorsOrder == 'user'){
                if(this.rvendorsASC){
                    return this.rvendors.sort((a, b) => (a[this.rvendorsOrderArray]['0'][this.rvendorsOrder] > b[this.rvendorsOrderArray]['0'][this.rvendorsOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }else{
                    return this.rvendors.sort((a, b) => (a[this.rvendorsOrderArray]['0'][this.rvendorsOrder] < b[this.rvendorsOrderArray]['0'][this.rvendorsOrder] ? -1 : 1) ).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }
            }
            else if(this.rvendorsOrder == 'assigned_agencies'){
                if(this.rvendorsASC){
                    return this.rvendors.sort((a, b) => (a[this.rvendorsOrder]['0'] > b[this.rvendorsOrder]['0'] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }else{
                    return this.rvendors.sort((a, b) => (a[this.rvendorsOrder]['0'] < b[this.rvendorsOrder]['0'] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }
            }
            else{
                //normal sorting
                if(this.rvendorsASC){
                    return this.rvendors.sort((a, b) => (a[this.rvendorsOrder] > b[this.rvendorsOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }else{
                    return this.rvendors.sort((a, b) => (a[this.rvendorsOrder] < b[this.rvendorsOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
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
            this.paginateTotal = Math.ceil(this.rvendors.length/this.perpage);
        },
        //Cities Search
        fuseSearch(options, search) {
            const fuse = new Fuse(options, {
                keys: ['name'],
                shouldSort: true,
            })
            return search.length ? fuse.search(search).map(({ item }) => item): fuse.list
        },
    },
}
</script>
