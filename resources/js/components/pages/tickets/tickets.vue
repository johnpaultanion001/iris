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
                <button @click="openModal('filterModal')" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-center">
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
                <ContentCard>
                    <div class="grid grid-cols-2 gap-2 pb-4">
                        <div class="col-span-1 flex items-center">
                            <div @click="filterItemNumberDropdown = !filterItemNumberDropdown" class="mr-1 py-1.5 px-2.5 cursor-pointer relative bg-white text-xxs text-black font-opensans-600 border border-light rounded flex items-center">
                                {{ filterItemNumber }} <img src="/img/icon/filter.png" class="ml-1">
                                <div v-if="filterItemNumberDropdown" style="top:28px;right:-1px;left:-1px;" class="z-9 dropdown absolute border border-light rounded-b-lg bg-white shadow-secondary overflow-hidden">
                                    <div to="/user-profile" class="py-1.5 px-1 flex items-center hover:bg-lighter">
                                        <p class="w-full font-inter-400 text-xxs text-center text-black">20</p>
                                    </div>
                                    <div to="/" class="py-1.5 px-1 flex items-center hover:bg-lighter">
                                        <p class="w-full font-inter-400 text-xxs text-center text-black">50</p>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xxs text-lighttext m-0">entries per page</p>
                        </div>
                        <div class="col-span-1 flex justify-end relative">
                            <input type="text" class="py-1.5 px-3 text-xxs rounded-lg border border-light focus-visible:border-blue-grey" placeholder="Search">
                        </div>
                    </div>
                    <div class="overflow-auto">
                        <table class="table-auto mb-5 w-full">
                            <thead>
                                <tr class="border-b border-light">
                                    <th class="p-2.5">
                                    </th>
                                    <th class="p-2.5">
                                    </th>
                                    <th class="p-2.5">
                                        <button @click="ticketsOrder = 'ticket_no'; orderedTickets()" class="filter-btn">Ticket No.<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="ticketsOrder = 'first_name'; ticketsOrderArray = 'reported_by'; orderedTickets()" class="filter-btn">Reported By<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="ticketsOrder = 'product_service'; orderedTickets()" class="filter-btn">Product/Service<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="ticketsOrder = 'vendor_name'; ticketsOrderArray = 'vendor'; orderedTickets()" class="filter-btn">Vendor Name<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="ticketsOrder = 'complaint'; orderedTickets()" class="filter-btn">Complaint<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="ticketsOrder = 'assigned_agency'; orderedTickets()" class="filter-btn">Assigned Agency<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="ticketsOrder = 'severity'; orderedTickets()" class="filter-btn">Severity<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="ticketsOrder = 'created_at'; ticketsOrderArray = 'reported_by'; orderedTickets()" class="filter-btn">Date Submitted<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-for="(ticket, index) in orderedTickets()" ref="tickets">
                                <tr class="border-b border-light relative">
                                    <td class="w-12 min-w-44">
                                        <router-link :to="'ticket/'+ticket.ticket_no"><img src="/img/icon/show-active.png" style="width: 20px; height: 15px;" class="m-auto block"></router-link>
                                    </td>
                                    <td class="w-12 min-w-44">
                                        <img @click.prevent="modalTicketID = ticket.ticket_no; ticket.isFollow ? openModal('unfollow') : openModal('follow')" :src="ticket.isFollow ? '/img/icon/favorite-active.png' : '/img/icon/favorite.png'" style="width: 11px; height: 17px;" class="cursor-pointer m-auto block">
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxs text-dark2 text-center ellipsis-2">
                                        {{ ticket.ticket_no }}
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxs">
                                        <p class="text-dark2 truncate" v-for="(item, index) in ticket.reported_by" ref="tickets">
                                            {{ item.first_name }} {{ item.last_name }}
                                        </p>
                                        <p class="text-lighttext truncate" v-for="(item, index) in ticket.reported_by" ref="tickets">
                                            {{ item.email }}
                                        </p>
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-dark2 ellipsis-2">
                                        {{ ticket.product_service }}
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-dark2" v-for="(item, index) in ticket.vendor" ref="tickets">
                                        <p class="ellipsis-2">{{ item.vendor_name }}</p> 
                                    </td>
                                    <td class="p-2.5 font-opensans-400 text-xxxs text-dark2">
                                        <p class="ellipsis-2">{{ ticket.complaint }}</p>
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-white flex items-center whitespace-nowrap">
                                        <div class="flex items-center whitespace-nowrap" v-for="(item, index) in ticket.assigned_agencies" ref="tickets">
                                            <div class="whitespace-nowrap" v-for="(agency, index) in item" ref="tickets">
                                                <span v-if="index <= 3" :style="'background-color:'+ agency.color +';'" class="px-2 py-1 rounded-full mr-1 inline-block text-center w-auto min-w-52">{{ agency.code }}</span>
                                            </div>
                                        </div>
                                        <span style="background-color: #54A581" class="px-2 py-1 rounded-full mr-1 inline-block text-center">+2</span>
                                    </td>
                                    <td class="p-2.5 font-opensans-600 text-xxxs text-white text-center">
                                        <span :style="ticket.severity === 'LOW' ? 'background-color: #FFD600;' : '' || ticket.severity === 'MEDIUM' ? 'background-color: #F2994A;' : '' || ticket.severity === 'HIGH' ? 'background-color: #FA3A0E;' : ''"  class="px-2 py-1 rounded mr-1 w-auto min-w-52">
                                            {{ ticket.severity }}
                                        </span>
                                    </td>
                                    <td class="p-2.5 font-opensans-400 text-xxxs text-dark2" v-for="(item, index) in ticket.reported_by" ref="tickets">
                                        {{ format_date(item.created_at) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div v-click-out-side="closeAction" style="top: 62px;" class="action-btn absolute right-0 bg-white shadow-secondary">
                        <div class="py-5 border-b border-b-light px-6 flex items-center">
                        </div>
                        <div v-for="(ticket, index) in orderedTickets()" ref="tickets">
                            <div @click="openAction(ticket.ticket_no)" class="cursor-pointer relative h-15 border-b border-b-light px-6 flex items-center">
                                <img src="/img/icon/action.png" class="">
                                <div v-if="actionActive && showAction == ticket.ticket_no" class="action-card shadow-secondary absolute rounded-lg bg-white">
                                    <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center"><img src="/img/icon/view.png" class="mx-auto"></span><span>View</span>
                                    </div>
                                    <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center"><img src="/img/icon/unfollow.png" class="mx-auto"></span><span>Unfollow</span>
                                    </div>
                                    <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center"><img src="/img/icon/status.png" class="mx-auto"></span><span>Update Ticket Status</span>
                                    </div>
                                    <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center"><img src="/img/icon/edit.png" class="mx-auto"></span><span>Edit Ticket</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </ContentCard>
            </div>
        </div>
        <Modal v-show="modalActive && showModal == 'follow'" @close="closeModal">
            <template v-slot:body>
                {{ modalTicketID }}
            </template>
            <template v-slot:footer>
                <button @click="followTicket(modalTicketID)" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Follow Ticket
                </button>
            </template>
        </Modal>
        <Modal v-show="modalActive && showModal == 'unfollow'" @close="closeModal">
            <template v-slot:body>
                {{ modalTicketID }}
            </template>
            <template v-slot:footer>
                <button @click="unfollowTicket(modalTicketID)" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Unfollow Ticket
                </button>
            </template>
        </Modal>
        <Modal modalTitle="Filters" v-show="modalActive && showModal == 'filterModal'" @close="closeModal">
            <template v-slot:body>
                <!-- <form class="block" @submit.prevent="submitLogin">
                    <div class="block pt-4 pb-2">
                    <label for="username" class="text-base text-blue-grey text-xs font-inter-700">Username</label>
                    <input type="email" v-model="username" name="username" id="username" class="mt-1 w-full main-input"/>
                    </div>
                    <div class="block relative py-2">
                        <label for="password" class="text-base text-blue-grey text-xs font-inter-700">Password</label>
                        <input v-if="showPassword" type="text" name="password" id="password" class="mt-1 w-full main-input" v-model="password"/>
                        <input v-else type="password" name="password" id="password" class="mt-1 w-full main-input" v-model="password"/>
                        <button type="button" class="show-icon" @click="{this.showPassword = !this.showPassword;}">
                            <img src="/img/icon/show.png" class="w-5">
                        </button>
                        <button v-if="showPassword" type="button" class="show-icon" @click="{this.showPassword = !this.showPassword;}">
                            <img src="/img/icon/show-active.png" class="w-5">
                        </button>
                    </div>
                    <div class="flex items-center pt-2 pb-4">
                        <input type="checkbox" id="remember-me" class="switch-toggle" name="remember-me">
                        <label for="remember-me" class="ml-2 text-blue-grey text-xs font-inter-400">Remember me</label>
                    </div>
                    <div class="block py-4">
                        <input type="submit" id="" value="Login" class="cursor-pointer shadow-main rounded-lg w-full p-3 bg-blue text-white font-opensans-600 text-sm">
                    </div>
                    <div class="block pb-1 w-full">
                        <router-link to="/reset-password" class="mt-2 text-blue font-opensans-600 text-sm block text-center hover:underline">Forgot Password</router-link>
                    </div>
                </form> -->
            </template>
            <template v-slot:footer>
                foot
            </template>
        </Modal>

    </PageLayout>
</template>

<script>

import PageLayout from '../../pageLayout.vue'
import ButtonCard from '../../utilities/buttonCard.vue'
import ContentCard from '../../utilities/contentCard.vue'
import Modal from '../../utilities/modal.vue'
import clickOutSide from "@mahdikhashan/vue3-click-outside";
import axios from 'axios'
import moment from 'moment'

export default {
    setup: () => ({
        title: 'Tickets'
    }),
  directives: {
    clickOutSide,
  },
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
            activeTab: 'All',
            //Filter item number
            filterItemNumber: '10',
            filterItemNumberDropdown: false,
            //Actions
            showAction: '',
            actionActive: false,
            //Modal
            showModal: '',
            modalActive: false,
            modalTicketID: '',
            //Tickets
            tickets: [],
            ticketsOrder: 'ticket_no',
            ticketsOrderArray: '',
            ticketsASC: true,
        };
    },
    components: { PageLayout, ButtonCard, ContentCard, Modal},
    async mounted() {
        this.isMobile(); //hides filter menu on mobile
        window.addEventListener("resize", this.isMobile); //hides filter menu on mobile when resized

        //Get Tickets
        const response = await axios.get('api/v1/tickets');
        this.tickets = response.data.data;
    },
    methods: {
        format_date(value){
            if (value) {
                return moment(String(value)).format('LL')
            }
        },
        computed: {
            watchableParams () {
            return {...this.tickets}
            }
        },
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
        orderedTickets() {
            if(this.ticketsOrder == 'vendor_name' || this.ticketsOrder == 'first_name' || this.ticketsOrder == 'created_at'){
                if(this.ticketsASC){
                    this.ticketsASC = false;
                    return this.tickets.sort((a, b) => (a[this.ticketsOrderArray]['0'][this.ticketsOrder] > b[this.ticketsOrderArray]['0'][this.ticketsOrder] ? -1 : 1));
                }else{
                    this.ticketsASC = true;
                    return this.tickets.sort((a, b) => (a[this.ticketsOrderArray]['0'][this.ticketsOrder] < b[this.ticketsOrderArray]['0'][this.ticketsOrder] ? -1 : 1) );
                }
            }else if(this.ticketsOrder == 'assigned_agencies'){
                if(this.ticketsASC){
                    this.ticketsASC = false;
                    return this.tickets.sort((a, b) => (a.assigned_agencies['0'].length > b.assigned_agencies['0'].length ? -1 : 1));
                }else{
                    this.ticketsASC = true;
                    return this.tickets.sort((a, b) => (a.assigned_agencies['0'].length < b.assigned_agencies['0'].length ? -1 : 1) );
                }
            }else{
                //normal sorting
                if(this.ticketsASC){
                    this.ticketsASC = false;
                    return this.tickets.sort((a, b) => (a[this.ticketsOrder] > b[this.ticketsOrder] ? -1 : 1) );
                }else{
                    this.ticketsASC = true;
                    return this.tickets.sort((a, b) => (a[this.ticketsOrder] < b[this.ticketsOrder] ? -1 : 1) );
                }
            }
        },
        async followTicket(ticketID) {
            await axios.post('/api/v1/ticket/update_follow', {
                ticket_id: ticketID,
                isFollow: 1
            })
            .then((res) => {
                this.closeModal();
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
            //Refresh Data
            const response = await axios.get('api/v1/tickets');
            this.tickets = response.data.data;
        },
        async unfollowTicket(ticketID) {
            await axios.post('/api/v1/ticket/update_follow', {
                ticket_id: ticketID,
                isFollow: 0
            })
            .then((res) => {
                this.closeModal();
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
            //Refresh Data
            const response = await axios.get('api/v1/tickets');
            this.tickets = response.data.data;
        },
    },
}
</script>

<style scope>
.action-card {
    top: 40px;
    right: 30px;
    width: fit-content;
    min-width: 204px;
    z-index: 9;
}
</style>