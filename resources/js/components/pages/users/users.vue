<template>
    <AlertTop :alertIcon="'/img/icon/'+successIcon" :active="successAlert" :content="successMessage" v-if="successAlert" @close="closeAlert" />
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-12 md:col-span-6">
                <h1>{{ title }}</h1>
            </div>
            <div v-if="showFilterBtn" class="col-span-1 flex items-center justify-end">
                <button @click="showFilter = !showFilter" class="w-fit bg-transparent rounded-lg">
                    <img src="/img/icon/filter-white.png" class="">
                </button>
            </div>
            <div v-if="showFilter" class="bg-white-25 sm:bg-transparent p-2.5 sm:p-0 rounded-lg col-span-12 xl:col-span-6 flex items-center justify-end flex-col md:flex-row flex-wrap">
                <button @click="openModal('filterModal')" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-center">
                    Filter
                </button>
                <button class="mt-1 md:mt-0 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-center">
                    Export <img src="/img/icon/export-white.png" class="ml-4">
                </button>
                <router-link to="/create-user" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    <img src="/img/icon/add-white.png" class="mr-2"> Create
                </router-link>
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
                                        <button @click="userOrder = 'name'; activityASC = !activityASC; orderedUsers();" class="filter-btn">Name<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="userOrder = 'role'; activityASC = !activityASC; orderedUsers();" class="filter-btn">User Type<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="userOrder = 'email'; activityASC = !activityASC; orderedUsers();" class="filter-btn">Email<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="userOrder = 'agency'; userOrderArray = 'assigned_agency';  activityASC = !activityASC; orderedUsers();" class="filter-btn">Agency<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="userOrder = 'status'; activityASC = !activityASC; orderedUsers();" class="filter-btn">Status<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="userOrder = 'updated_at'; activityASC = !activityASC; orderedUsers();" class="filter-btn">Date Updated<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="userOrder = 'created_at'; activityASC = !activityASC; orderedUsers();" class="filter-btn">Date Created<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-light relative" v-for="(user, index) in orderedUsers()" ref="users" style="height: 57px;">
                                    <td class="w-12 min-w-44">
                                        <router-link :to="'/profile/'+user.id"><img src="/img/icon/show-active.png" style="width: 20px; height: 15px;" class="m-auto block"></router-link>
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-dark2">
                                        {{ user.name }}
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-dark2">
                                        {{ user.role }}
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-dark2">
                                        {{ user.email }}
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-white">
                                        <div class="flex items-center whitespace-nowrap">
                                            <div class="whitespace-nowrap">
                                                <span :style="'background-color:'+ user.assigned_agencies.color +';'" class="px-2 py-1 rounded-full mr-1 inline-block text-center w-auto min-w-52">{{ user.assigned_agencies.code }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-white">
                                        <div class="flex items-center whitespace-nowrap">
                                            <div class="whitespace-nowrap">
                                                <span v-if="user.status == 'ACTIVE'" class="px-2 py-1 rounded-full mr-1 inline-block text-center w-auto min-w-52" style="background-color:#54DAA1;">{{ user.status }}</span>
                                                <span v-if="user.status == 'INACTIVE'" class="px-2 py-1 rounded-full mr-1 inline-block text-center w-auto min-w-52" style="background-color: #F2994A;">{{ user.status }}</span>
                                                <span v-if="user.status == 'DEACTIVATED'" class="px-2 py-1 rounded-full mr-1 inline-block text-center w-auto min-w-52" style="background-color: #FA3A0E;">{{ user.status }}</span>
                                                <span v-if="user.status == 'NONE'" class="px-2 py-1 rounded-full mr-1 inline-block text-center w-auto min-w-52" style="background-color: #CED4DA;">{{ user.status }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2.5 font-opensans-400 text-xxxs text-dark2" ref="users">
                                        {{ format_date(user.updated_at) }}
                                    </td>
                                    <td class="p-2.5 font-opensans-400 text-xxxs text-dark2" ref="users">
                                        {{ format_date(user.created_at) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-cont flex items-center justify-between">
                        <p class="text-xxs text-lighttext m-0">Showing {{ (perpage * (pageNumber)) + 1 }} to {{ users.length > (perpage * (pageNumber + 1)) ? (perpage * (pageNumber + 1)) : users.length }} of {{ users.length }} entries</p>
                        <div v-if="users.length > perpage" class="flex items-center justify-end">
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
                    <div v-click-out-side="closeAction" style="top: 62px;" class="action-btn absolute right-0 bg-white shadow-secondary">
                        <div class="py-5 border-b border-b-light px-6 flex items-center">
                        </div>
                        <div v-for="(user, index) in orderedUsers()" ref="users">
                            <div @click="openAction(user.id)" class="cursor-pointer relative h-15 border-b border-b-light px-6 flex items-center">
                                <img src="/img/icon/action.png" class="">
                                <div v-if="actionActive && showAction == user.id" class="action-card shadow-secondary absolute rounded-lg bg-white">
                                    <router-link :to="'profile/'+user.id">
                                        <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                            <span class="w-5 mr-3 text-center"><img src="/img/icon/view.png" class="mx-auto"></span><span>View</span>
                                        </div>
                                    </router-link>
                                    <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center"><img src="/img/icon/invite.png" class="mx-auto"></span><span>Resend Invite</span>
                                    </div>
                                    <router-link :to="'profile/'+user.id">
                                        <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                            <span class="w-5 mr-3 text-center"><img src="/img/icon/edit.png" class="mx-auto"></span><span>Edit Profile</span>
                                        </div>
                                    </router-link>
                                    <div v-if="user.status == 'ACTIVE'" @click="openModal('deactivate'); modalUserID = user.id; modalUserName = user.name" class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center"><img src="/img/icon/deactivate.png" class="mx-auto"></span><span>Deactivate</span>
                                    </div>
                                    <div v-if="user.status == 'INACTIVE'" @click="openModal('activate'); modalUserID = user.id; modalUserName = user.name" class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center"><img src="/img/icon/deactivate.png" class="mx-auto"></span><span>Activate</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </ContentCard>
            </div>
        </div>
    </PageLayout>
    <Modal modalTitle="Filters" v-show="modalActive && showModal == 'filterModal'" @close="closeModal">
        <template v-slot:body>
            <form class="block">
                <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                    <div class="col-span-2">
                        <label for="productservice" class="text-base text-blue-grey text-xs font-inter-700">User Type</label>
                        <div class="relative w-full">
                            <div class="mt-2 w-full secondary-input" style="padding: 4px 0 0 0">
                                <v-select :filter="fuseSearch" :options="roles" :get-option-label="option => option.name" placeholder="Choose" v-model="fRole" :reduce="roles => roles.value">
                                    <template #option="{ name }" >
                                        {{ name }} 
                                    </template>
                                </v-select>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="seveirty" class="text-base text-blue-grey text-xs font-inter-700">Account Status</label>
                        <div class="relative w-full">
                            <div class="mt-2 w-full secondary-input" style="padding: 4px 0 0 0">
                                <v-select :filter="fuseSearch" :options="status" :get-option-label="(option) => option.name" placeholder="Choose" v-model="fStatus" :reduce="status => status.value">
                                    <template #option="{ name }" >
                                        {{ name }} 
                                    </template>
                                </v-select>
                            </div>
                        </div>
                    </div> 
                    <div class="col-span-1">
                        <div class="relative w-full">
                            <label for="from" class="text-base text-blue-grey text-xs font-inter-700">From</label>
                            <input type="date" v-model="fFrom" placeholder="Month DD, YYYY" name="from" id="from" class="mt-2 w-full secondary-input"/>
                            <img src="/img/icon/date-blue.png" class="date-img">
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="relative w-full">
                            <label for="to" class="text-base text-blue-grey text-xs font-inter-700">To</label>
                            <input type="date" v-model="fTo" placeholder="Month DD, YYYY" name="to" id="to" class="mt-2 w-full secondary-input"/>
                            <img src="/img/icon/date-blue.png" class="date-img">
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <label for="selectagencies" class="text-base text-blue-grey text-xs font-inter-700">Agencies</label>
                            <input type="text" v-model="filterSearchAgency" placeholder="Search" name="selectagencies" id="selectagencies" class="mt-4 w-full secondary-input" style="padding-left: 35px;"/>
                            <img src="/img/icon/search.png" class="search-img">
                        </div>
                        <div v-for="(agency, index) in agencies" ref="agencies" class="my-4 flex items-center">
                            <input type="checkbox" v-model="fAgencyValue" :value="agency.id">
                            <img :src="'/img/' + agency.logo" class="w-15 h-15 mx-4 rounded-full">
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
    
    <Modal v-show="modalActive && showModal == 'deactivate'" @close="closeModal">
        <template v-slot:body>
            <img src="/img/icon/invite-modal.png" class="mb-6">
            <h5 class="font-exo-600 text-xl text-dark2 mb-4">Deactivate {{ modalUserName }}</h5>
            <p class="font-inter-400 text-lg text-dark2 mb-11">Once you deactivate this account, the user can no longer access the system. Do you wish to continue?</p> 
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal()" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Cancel
                </button>
                <button @click="deactivate(modalUserID)" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-red text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Yes, Deactive
                </button>
            </div>
        </template>
    </Modal>
    
    <Modal v-show="modalActive && showModal == 'activate'" @close="closeModal">
        <template v-slot:body>
            <img src="/img/icon/invite-modal.png" class="mb-6">
            <h5 class="font-exo-600 text-xl text-dark2 mb-4">Activate {{ modalUserName }}</h5>
            <p class="font-inter-400 text-lg text-dark2 mb-11">Once you activate this account, the user can access the system. Do you wish to continue?</p> 
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal()" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Cancel
                </button>
                <button @click="activate(modalUserID)" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-green text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Yes, Active
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
import AlertTop from '../../utilities/alertTop.vue'
import Fuse from 'fuse.js'
import vSelect from 'vue-select'

export default {
    setup: () => ({
        title: 'Users',
    }),
    directives: {
        clickOutSide,
    },
    data () {
        return{
            //Filter item number
            filterItemNumberDropdown: false,
            filterSearch: '',
            //Date Filter
            reDate: null,
            //Show filters mobile
            showFilter: true,
            showFilterBtn: true,
            //Actions
            showAction: '',
            actionActive: false,
            //Modal
            showModal: '',
            modalActive: false,
            modalUserID: null,
            modalUserName: null,
            successAlert: false,
            successMessage: '',
            successIcon: null,
            //Filter Modal
            fRole: '',
            roles: [{name: 'Super Admin', value: 'SUPER_ADMIN'}, {name: 'Admin', value: 'ADMIN'}, {name: 'Moderator', value: 'MODERATOR'}], 
            fStatus: '',
            status: [{name: 'Active', value: 'ACTIVE'}, {name: 'Inactive', value: 'INACTIVE'}], 
            fAgencyValue: [],
            fFrom: '',
            fTo: '',
            responseFiltered: '',
            isFiltering: false,
            //Agencies
            agencies: [],
            filterSearchAgency: '',
            //Tickets
            users: [],
            userOrder: 'created_at',
            userOrderArray: '',
            activityASC: true,
            perpage: 10,
            pageNumber: 0,
            paginateTotal: 0,
            pageRange: 6,
            pageStart: 1,
            pageEnd: 5,
        };
    },
    components: { PageLayout, ButtonCard, ContentCard, Modal, AlertTop, vSelect},
    async mounted() {
        this.isMobile(); //hides filter menu on mobile
        window.addEventListener("resize", this.isMobile); //hides filter menu on mobile when resized

        //Get Tickets
        this.getUsers(0);
    },
    watch: {
        filterSearch: function() {
            this.getUsers(0);
            this.reDate = this.reformat_date(this.filterSearch);
        },
        filterSearchAgency: function() {
            this.getAgencies();
        },
        perpage: function() {
            this.getUsers(0);
        }
    },
    methods: {
        async filterList(){
            this.getUsers(0)
            this.isFiltering = true

            await axios.post('api/v1/filter/users', {
                user_type: this.fRole,
                account_status: this.fStatus,
                from: this.reformat_date(this.fFrom),
                till: this.reformat_date(this.fTill),
                agencies: this.fAgencyValue
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
            this.isFiltering = false
            this.fRole = ''
            this.fStatus = ''
            this.fAgencyValue = []
            this.fFrom = ''
            this.fTo = ''
        },
        //Get Users
        async getUsers(page){
            this.pageNumber = page;
            const response = await axios.get('api/v1/all_users');

            //Filter Modal
            if(!this.isFiltering){
                this.responseFiltered = response.data.data
            }

            //Filter Search Ticket
            const usersdata = this.responseFiltered.filter((a) => {
                const theFilter = (
                    a.name.toLowerCase().includes(this.filterSearch.toLowerCase()) ||
                    a.email.toLowerCase().includes(this.filterSearch.toLowerCase()) ||
                    a.role.toLowerCase().includes(this.filterSearch.toLowerCase()) ||
                    a.agency.toLowerCase().includes(this.filterSearch.toLowerCase()) ||
                    a.updated_at.includes(this.reDate) || a.updated_at.includes(this.filterSearch) ||
                    a.created_at.includes(this.reDate) || a.created_at.includes(this.filterSearch)
                )
                return theFilter
            });

            this.users = usersdata

            //Pagination
            this.paginateTotal = Math.ceil(this.users.length/this.perpage);
        },
        //Get Agencies
        async getAgencies(){
            this.pageNumber = 0;
            const response = await axios.get('api/v1/agencies');
            //Filter Agencies Ticket
            this.agencies = response.data.data.filter((a) => (a.agency.includes(this.filterSearchAgency) ||  a.agency.toLowerCase().includes(this.filterSearchAgency)));
        },
        //Display Sorted Tickets
        orderedUsers() {
            if(this.userOrder == 'user'){
                if(this.activityASC){
                    return this.users.sort((a, b) => (a[this.userOrderArray]['0'][this.userOrder] > b[this.userOrderArray]['0'][this.userOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }else{
                    return this.users.sort((a, b) => (a[this.userOrderArray]['0'][this.userOrder] < b[this.userOrderArray]['0'][this.userOrder] ? -1 : 1) ).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }
            }
            else if(this.userOrder == 'assigned_agencies'){
                if(this.activityASC){
                    return this.users.sort((a, b) => (a[this.userOrder]['0'] > b[this.userOrder]['0'] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }else{
                    return this.users.sort((a, b) => (a[this.userOrder]['0'] < b[this.userOrder]['0'] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }
            }
            else{
                //normal sorting
                if(this.activityASC){
                    return this.users.sort((a, b) => (a[this.userOrder] > b[this.userOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }else{
                    return this.users.sort((a, b) => (a[this.userOrder] < b[this.userOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }
            }
        },
        //Format Mobile Display Settings
        isMobile() {
            if( screen.width <= 768 ) {
                this.showFilter = false;
                this.showFilterBtn = true;
            }
            else {
                this.showFilter = true;
                this.showFilterBtn = false;
            }
        },
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
        //Alert
        async closeAlert() {
            this.successAlert = false
        },
        //Modals
        openAction(itemID) {
            this.showAction = itemID;
            this.actionActive = true
        },
        closeAction() {
            if(this.actionActive == true){
                this.actionActive = false
            }
        },
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
            this.paginateTotal = Math.ceil(this.users.length/this.perpage);
        },
        //Deactivate
        async deactivate(id) {
            await axios.post('api/v1/user/account_status', {
                user_id: id,
                status: 'INACTIVE',
            })
            .then((success) => {
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'User successfully deactivated '+this.modalUserName;
                this.successIcon = 'like.png';
                this.getUsers(0);
                this.closeModal();
            })
            .catch((error) => {
                this.successAlert = true;
                this.successMessage = 'Error occured. Please try again';
                this.successIcon = 'warning-red.png';
            })
        },
        async activate(id) {
            await axios.post('api/v1/user/account_status', {
                user_id: id,
                status: 'ACTIVE',
            })
            .then((success) => {
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'User successfully activated '+this.modalUserName;
                this.successIcon = 'like.png';
                this.getUsers(0);
                this.closeModal();      
            })
            .catch((error) => {
                this.successAlert = true;
                this.successMessage = 'Error occured. Please try again';
                this.successIcon = 'warning-red.png';
            })
        },
        //Roles Search
        fuseSearch(options, search) {
            const fuse = new Fuse(options, {
                keys: ['name', 'value'],
                shouldSort: true,
            })
            return search.length ? fuse.search(search).map(({ item }) => item): fuse.list
        }
    },
}
</script>