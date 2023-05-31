<template>
    <AlertTop :alertIcon="'/img/icon/'+successIcon" :active="successAlert" :content="successMessage" v-if="successAlert" @close="closeAlert" />
    <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
        <div class="col-span-11 md:col-span-12 xl:col-span-6">
            <div class="ticket-tabs bg-grey p-1 rounded-xl flex">
                <div v-if="userRole == 'SUPER_ADMIN'" @click="activeTab = 'All'; getTickets(activeStatus, 0); getAllTickets();" :class="activeTab === 'All' ? 'bg-white  shadow-third' : 'bg-transparent'" class="rounded-lg w-1/3 text-center">
                    <p class="text-xs sm:text-base truncate text-blue-grey font-inter-400 px-1 py-1.5">All</p>
                </div>
                <div @click="activeTab = 'My Agency'; getTickets(activeStatus, 0); getAllTickets();" :class="activeTab === 'My Agency' ? 'bg-white  shadow-third' : 'bg-transparent', userRole == 'SUPER_ADMIN' ? 'w-1/3' : 'w-1/2'" class="rounded-lg text-center">
                    <p class="text-xs sm:text-base truncate text-blue-grey font-inter-400 px-1 py-1.5">My Agency</p>
                </div>
                <div @click="activeTab = 'Following'; getTickets(activeStatus, 0); getAllTickets();" :class="activeTab === 'Following' ? 'bg-white  shadow-third' : 'bg-transparent', userRole == 'SUPER_ADMIN' ? 'w-1/3' : 'w-1/2'" class="rounded-lg text-center">
                    <p class="text-xs sm:text-base truncate text-blue-grey font-inter-400 px-1 py-1.5">Following ({{ alltickets.filter((a) => (a.isFollow == 1)).length }})</p>
                </div>
            </div>
        </div>
        <div v-if="showFilterBtn" class="col-span-1 flex items-center justify-end">
            <button @click="showFilter = !showFilter" class="w-fit bg-transparent rounded-lg">
                <img src="/img/icon/filter-white.png" class="">
            </button>
        </div>
        <div v-if="showFilter" class="bg-white-25 sm:bg-transparent p-2.5 sm:p-0 rounded-lg col-span-12 xl:col-span-6 flex items-center justify-end flex-col md:flex-row flex-wrap">
            <button :class="vendorID ?  'bg-greygreygrey text-blue' : 'bg-white-25 text-white'" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-3.5 rounded-full flex items-center justify-center">
                <img :src="vendorID ? '/img/icon/close-blue.png' : '/img/icon/close-white.png'" class="mr-4"> 3 Filters
            </button>
            <button @click="openModal('filterModal')" :class="vendorID ?  'border-blue text-blue' : 'border-white text-white'" class="border mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 rounded-lg flex items-center justify-center">
                Filter
            </button>
            <button :class="vendorID ?  'border-blue text-blue' : 'border-white text-white'" class="border mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 rounded-lg flex items-center justify-center">
                Export <img :src="vendorID ? '/img/icon/export-blue.png' : '/img/icon/export-white.png'"  class="ml-4">
            </button>
            <router-link to="/create-ticket" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                <img src="/img/icon/add-white.png" class="mr-2"> Create
            </router-link>
        </div>
    </div>
    <div class="scroll-style w-full overflow-auto flex items-center justify-start pb-3">
        <div :class="activeStatus == 'FOR_REVIEW' ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
            <ButtonCard @click="getTickets('FOR_REVIEW', 0)" link="" arrow="false" cardTitle="For Review" :value="alltickets.filter((a) => (a.status == 'FOR_REVIEW')).length" icon="/img/icon/eye-active.svg" />
        </div>
        <div :class="activeStatus == 'ACKNOWLEDGED' ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
            <ButtonCard @click="getTickets('ACKNOWLEDGED', 0)" link="" arrow="false" cardTitle="Acknowledged" :value="alltickets.filter((a) => (a.status == 'ACKNOWLEDGED')).length" icon="/img/icon/like-active.svg" />
        </div>
        <div :class="activeStatus == 'ON_GOING' ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
            <ButtonCard @click="getTickets('ON_GOING', 0)" link="" arrow="false" cardTitle="On-going" :value="alltickets.filter((a) => (a.status == 'ON_GOING')).length" icon="/img/icon/clock-active.svg" />
        </div>
        <div :class="activeStatus == 'RESOLVED' ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
            <ButtonCard @click="getTickets('RESOLVED', 0)" link="" arrow="false" cardTitle="Resolved" :value="alltickets.filter((a) => (a.status == 'RESOLVED')).length" icon="/img/icon/party-active.svg" />
        </div>
        <div :class="activeStatus == 'INVALID' ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
            <ButtonCard @click="getTickets('INVALID', 0)" link="" arrow="false" cardTitle="Invalid" :value="alltickets.filter((a) => (a.status == 'INVALID')).length" icon="/img/icon/warning-active.svg" />
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
                                </th>
                                <th class="p-2.5">
                                    <button @click="ticketsOrder = 'ticket_no'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Ticket No.<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                </th>
                                <th class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'first_name'; ticketsOrderArray = 'reported_by'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Reported By<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                </th>
                                <th class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'product_service'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Product/Service<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                </th>
                                <th v-if="colVendor != 'off'" class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'vendor_name'; ticketsOrderArray = 'vendor'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Vendor Name<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                </th>
                                <th class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'complaint'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Complaint<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                </th>
                                <th class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'assigned_agencies'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Assigned Agency<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                </th>
                                <th v-if="colSeverity != 'off'" class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'severity'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Severity<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                </th>
                                <th class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'created_at'; ticketsOrderArray = 'reported_by'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Date Submitted<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                </th>
                            </tr>
                        </thead>
                        <tbody v-for="(ticket, index) in orderedTickets()" ref="tickets">
                            <tr class="border-b border-light relative">
                                <td class="w-12 min-w-44">
                                    <router-link :to="'/ticket-information/'+ticket.ticket_no"><img src="/img/icon/show-active.png" style="width: 20px; height: 15px;" class="m-auto block"></router-link>
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
                                <td class="p-2.5 font-opensans-600 text-xxxs text-dark2 ellipsis-2" style="height: 41px">
                                    {{ ticket.product_service }}
                                </td>
                                <td v-if="colVendor != 'off'" class="p-2.5 font-opensans-600 text-xxxs text-dark2" v-for="(item, index) in ticket.vendor" ref="tickets">
                                    <p class="ellipsis-2">{{ item.vendor_name }}</p> 
                                </td>
                                <td class="p-2.5 font-opensans-400 text-xxxs text-dark2">
                                    <p class="ellipsis-2">{{ ticket.complaint }}</p>
                                </td>
                                <td class="p-2.5 font-opensans-600 text-xxxs text-white flex items-center whitespace-nowrap">
                                    <div class="flex items-center whitespace-nowrap" v-for="(item, index) in ticket.assigned_agencies" ref="tickets">
                                        <div class="whitespace-nowrap" ref="tickets">
                                            <span v-if="index <= 3" :style="'background-color:'+ item.color +';'" class="px-2 py-1 rounded-full mr-1 inline-block text-center w-auto min-w-52">{{ item.code }}</span>
                                            <span v-if="index == 3" style="background-color: #54A581" class="px-2 py-1 rounded-full mr-1 inline-block text-center">+{{ ticket.assigned_agencies.length - 4 }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td v-if="colSeverity != 'off'" class="p-2.5 font-opensans-600 text-xxxs text-white text-center">
                                    <span :style="ticket.severity === 'LOW' ? 'background-color: #FFD600;' : '' || ticket.severity === 'MEDIUM' ? 'background-color: #F2994A;' : '' || ticket.severity === 'HIGH' ? 'background-color: #FA3A0E;' : ''"  class="px-2 py-1 rounded mr-1 w-auto min-w-52">
                                        {{ ticket.severity }}
                                    </span>
                                </td>
                                <td class="p-2.5 font-opensans-400 text-xxxs text-dark2" ref="tickets">
                                    {{ format_date(ticket.date_submitted) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination-cont flex items-center justify-between">
                    <p class="text-xxs text-lighttext m-0">Showing {{ (perpage * (pageNumber)) + 1 }} to {{ tickets.length > (perpage * (pageNumber + 1)) ? (perpage * (pageNumber + 1)) : tickets.length }} of {{ tickets.length }} entries</p>
                    <div v-if="tickets.length > perpage" class="flex items-center justify-end">
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
                    <div v-for="(ticket, index) in orderedTickets()" ref="tickets">
                        <div @click="openAction(ticket.ticket_no)" class="cursor-pointer relative h-15 border-b border-b-light px-6 flex items-center">
                            <img src="/img/icon/action.png" class="">
                            <div v-if="actionActive && showAction == ticket.ticket_no" class="action-card shadow-secondary absolute rounded-lg bg-white">
                                <router-link :to="'ticket/'+ticket.ticket_no">
                                    <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center"><img src="/img/icon/view.png" class="mx-auto"></span><span>View</span>
                                    </div>
                                </router-link>
                                <div @click.prevent="modalTicketID = ticket.ticket_no; ticket.isFollow ? openModal('unfollow') : openModal('follow')" class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                    <span class="w-5 mr-3 text-center"><img src="/img/icon/unfollow.png" class="mx-auto"></span><span>{{ ticket.isFollow ? 'Unfollow' : 'Follow' }}</span>
                                </div>
                                <div @click.prevent="modalTicketID = ticket.ticket_no; openModal('ticketStatusModal')" class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                    <span class="w-5 mr-3 text-center"><img src="/img/icon/status.png" class="mx-auto"></span><span>Update Ticket Status</span>
                                </div>
                                <router-link v-if="activeStatus != 'RESOLVED' && activeStatus != 'INVALID'" :to="'ticket/'+ticket.ticket_no">
                                    <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center"><img src="/img/icon/edit.png" class="mx-auto"></span><span>Edit Ticket</span>
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </ContentCard>
        </div>
    </div>
    <Modal v-show="modalActive && showModal == 'follow'" @close="closeModal">
        <template v-slot:body>
            <img src="/img/icon/follow-modal.png" class="mb-6">
            <h5 class="font-exo-600 text-xl text-dark2 mb-4">Follow Ticket #{{ modalTicketID }}</h5>
            <p class="font-inter-400 text-lg text-dark2 mb-11">By following this ticket you’ll be notified about any updates.</p> 
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Cancel
                </button>
                <button @click="followTicket(modalTicketID, pageNumber)" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Follow Ticket
                </button>
            </div>
        </template>
    </Modal>
    <Modal v-show="modalActive && showModal == 'unfollow'" @close="closeModal">
        <template v-slot:body>
            <img src="/img/icon/unfollow-modal.png" class="mb-6">
            <h5 class="font-exo-600 text-xl text-dark2 mb-4">Follow Ticket #{{ modalTicketID }}</h5>
            <p class="font-inter-400 text-lg text-dark2 mb-11">By unfollowing this ticket you’ll no longer be notified about any updates.                   </p> 
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Cancel
                </button>
                <button @click="unfollowTicket(modalTicketID, pageNumber)" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Unfollow Ticket
                </button>
            </div>
        </template>
    </Modal>
    <Modal modalTitle="Filters" v-show="modalActive && showModal == 'filterModal'" @close="closeModal">
        <template v-slot:body>
            <form class="block">
                <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                    <div class="col-span-2"> 
                        <label for="productservice" class="text-base text-blue-grey text-xs font-inter-700">Product/Service</label>
                        <div class="relative w-full">
                            <div class="mt-2 w-full secondary-input" style="padding: 4px 0 0 0">
                                <v-select :filter="fuseSearch" :options="products" :get-option-label="option => option.product_service" placeholder="Choose" v-model="fProductSevice" :reduce="products => products.product_service">
                                    <template #option="{ product_service }" >
                                        {{ product_service }} 
                                    </template>
                                </v-select>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="seveirty" class="text-base text-blue-grey text-xs font-inter-700">Product/Service</label>
                        <div class="relative w-full">
                            <div class="mt-2 w-full secondary-input" style="padding: 4px 0 0 0">
                                <v-select :filter="fuseSearch" :options="severities" :get-option-label="option => option.name" placeholder="Choose" v-model="fSeverity" :reduce="severities => severities.name">
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
                            <input type="text" v-model="fFrom" placeholder="Month DD, YYYY" name="from" id="from" class="mt-2 w-full secondary-input"/>
                            <img src="/img/icon/date-blue.png" class="date-img">
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="relative w-full">
                            <label for="to" class="text-base text-blue-grey text-xs font-inter-700">To</label>
                            <input type="text" v-model="fTo" placeholder="Month DD, YYYY" name="to" id="to" class="mt-2 w-full secondary-input"/>
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
    <Modal modalTitle="Ticket Status" v-show="modalActive && showModal == 'ticketStatusModal'" @close="closeModal">
        <template v-slot:body>
            <form class="block">
                <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                    <div class="col-span-2">
                        <p class="text-black font-inter-400 text-sm">Once updated, we’ll automatically send a notification to the assigned agencies & customer</p>
                    </div>
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <div class="flex items-center justify-start my-3">
                                <input type="radio" v-model="currentTicketStatus" value="FOR_REVIEW" id="foereview" class="mr-2.5"/>
                                <label for="foereview" class="text-base text-blue-grey text-xs font-inter-700">For Review</label>
                            </div>
                            <div class="flex items-center justify-start my-3">
                                <input type="radio" v-model="currentTicketStatus" value="ACKNOWLEDGED" id="acknowledged" class="mr-2.5"/>
                                <label for="acknowledged" class="text-base text-blue-grey text-xs font-inter-700">Acknowledged</label>
                            </div>
                            <div class="flex items-center justify-start my-3">
                                <input type="radio" v-model="currentTicketStatus" value="ON_GOING" id="ongoing" class="mr-2.5"/>
                                <label for="ongoing" class="text-base text-blue-grey text-xs font-inter-700">On-going</label>
                            </div>
                            <div class="flex items-center justify-start my-3">
                                <input type="radio" v-model="currentTicketStatus" value="RESOLVED" id="resolved" class="mr-2.5"/>
                                <label for="resolved" class="text-base text-blue-grey text-xs font-inter-700">Resolved <span class="text-blue font-opensans-400">(0/2)</span></label>
                            </div>
                            <div class="flex items-center justify-start my-3">
                                <input type="radio" v-model="currentTicketStatus" value="INVALID" id="invalid" class="mr-2.5"/>
                                <label for="invalid" class="text-base text-blue-grey text-xs font-inter-700">Invalid</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <label for="statusComment" class="text-base text-blue-grey text-xs font-inter-700">Status Update Comments</label>
                            <textarea type="text" v-model="statusComment" placeholder="Write comment" name="statusComment" id="statusComment" class="mt-2 w-full main-textarea"></textarea>
                        </div>
                        <div v-if="currentTicketStatus == 'RESOLVED' || currentTicketStatus == 'INVALID'" class="info-warning mt-4 flex w-full rounded border border-light bg-greygrey p-4">
                            <div class="block mr-4"><img src="/img/icon/info.png"></div>
                            <p class="font-inter-400 text-black text-sm">Once you update this ticket to <b class="font-opensans-700">{{ currentTicketStatus }}</b>, you can no longer update the information</p>
                        </div>
                    </div>
                </div>
            </form>
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Close
                </button>
                <button @click.prevent="updateTicketStatus(modalTicketID, pageNumber)" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Update
                </button>
            </div>
        </template>
    </Modal>
</template>

<script>

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
        title: 'Tickets',
    }),
    directives: {
        clickOutSide,
    },
    props: ['vendorID', 'colVendor', 'colSeverity'],
    data () {
        return{
            //Filter Buttons
            activeStatus: 'FOR_REVIEW',
            filterStatus: this.$route.params.status,
            //Show filters mobile
            showFilter: true,
            showFilterBtn: true,
            //Tabs
            activeTab: '',
            myAgency: 'DTI',
            //Filter item number
            filterItemNumberDropdown: false,
            filterSearch: '',
            reDate: null,
            responseFiltered: '',
            //Actions
            showAction: '',
            actionActive: false,
            //Modal
            showModal: '',
            modalActive: false,
            modalTicketID: '',
            successAlert: false,
            successMessage: '',
            successIcon: null,
            //Filter Modal
            fProductSevice: '',
            fSeverity: '',
            severities: [{name: 'Low', value: 'LOW'}, {name: 'Medium', value: 'MEDIUM'}, {name: 'High', value: 'HIGH'}], 
            fAgencyValue: [],
            fFrom: '',
            fTo: '',
            isFiltering: '',
            //Agencies
            agencies: [],
            filterSearchAgency: '',
            //Tickets
            alltickets: [],
            tickets: [],
            ticketsOrder: 'ticket_no',
            ticketsOrderArray: '',
            ticketsASC: true,
            perpage: 10,
            pageNumber: 0,
            paginateTotal: 0,
            pageRange: 6,
            pageStart: 1,
            pageEnd: 5,
            //Update Status
            currentTicketStatus: null,
            statusComment: null,
            //User
            userAgencyCode: "",
            userRole: "",
            //Products Services
            products: [],
        };
    },
    components: { ButtonCard, ContentCard, Modal, AlertTop, vSelect},
    async mounted() {
        this.isMobile(); //hides filter menu on mobile
        window.addEventListener("resize", this.isMobile); //hides filter menu on mobile when resized

        //Get Tickets
        this.getTickets(this.activeStatus, 0);
        //Get current user
        this.getUser();
        //Get All Tickets for getting length
        this.getAllTickets();
        //Get All Products Services
        this.getProducts();

        //if has ticket status on URL 
        if(this.filterStatus){
            this.activeStatus = this.filterStatus
        }
    },
    watch: {
        filterSearch: function() {
            this.getTickets(this.activeStatus, 0);
            this.reDate = this.reformat_date(this.filterSearch);
        },
        filterSearchAgency: function() {
            this.getAgencies();
        },
        perpage: function() {
            this.getTickets(this.activeStatus, 0);
        }
    },
    methods: {
        async getUser(){
            const response = await axios.get('api/v1/profile');
            //Filter User Data
            this.userAgencyCode = response.data.data.assigned_agencies.code;
            this.userRole = response.data.data.role;

            if(response.data.data.role == 'SUPER_ADMIN'){
                this.activeTab = 'All'
            }else{
                this.activeTab = 'My Agency'
            }
        },
        resetFilter(){
            this.isFiltering = false
            this.fProductSevice = ''
            this.fSeverity = ''
            this.fAgencyValue = []
            this.fFrom = ''
            this.fTo = ''
        },
        async filterList(){
            this.getTickets(this.activeStatus, 0)
            this.isFiltering = true

            await axios.post('api/v1/filter/tickets', {
                product_service: this.fProductSevice,
                severity: this.fSeverity,
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
        //Get Tickets
        async getTickets(val, page){
            this.pageNumber = page;
            this.activeStatus = val;
            const response = await axios.get('api/v1/tickets');

            //Filter Modal
            if(!this.isFiltering){
                this.responseFiltered = response.data.data
            }

            //Filter Search Ticket
            const ticketsdata = this.responseFiltered.filter((a) => {
                const theFilter = (
                    a['ticket_no'] == this.filterSearch ||
                    a.severity.toLowerCase().includes(this.filterSearch.toLowerCase()) ||
                    a.product_service.toLowerCase().includes(this.filterSearch.toLowerCase()) || 
                    a.complaint.toLowerCase().includes(this.filterSearch.toLowerCase()) ||
                    a['reported_by']['0']['first_name'].toLowerCase().includes(this.filterSearch.toLowerCase()) || 
                    a['reported_by']['0']['last_name'].toLowerCase().includes(this.filterSearch.toLowerCase()) ||
                    a['vendor']['0']['vendor_name'].toLowerCase().includes(this.filterSearch.toLowerCase()) || 
                    a['vendor']['0']['email'].toLowerCase().includes(this.filterSearch.toLowerCase()) ||
                    a['agencies'].toLowerCase().includes(this.filterSearch.toLowerCase()) ||
                    // a['assigned_agencies']['0']['code'].toLowerCase().includes(this.filterSearch.toLowerCase()) ||
                    a.date_submitted.includes(this.reDate) || a.date_submitted.includes(this.filterSearch)
                )
                return theFilter
            });
            
            // console.log( this.tickets = responseFiltered.filter((a) => (a.agencies.data == "DA")))
            //Filter Tab and Status
            if(this.activeTab == 'All'){
                this.tickets = ticketsdata.filter((a) => (a.status == this.activeStatus && (this.vendorID ? a['vendor']['0']['id'] == this.vendorID : true)));
            }else if(this.activeTab == 'My Agency'){
                this.tickets = ticketsdata.filter((a) => (a.status == this.activeStatus && a.agencies.includes(this.userAgencyCode) && (this.vendorID ? a['vendor']['0']['id'] == this.vendorID : true)));
            }else if(this.activeTab == 'Following'){
                this.tickets = ticketsdata.filter((a) => (a.status == this.activeStatus && a.isFollow == 1 && (this.vendorID ? a['vendor']['0']['id'] == this.vendorID : true)));
            }
            //Pagination
            this.paginateTotal = Math.ceil(this.tickets.length/this.perpage);
        },
        async getAllTickets(){
            const response = await axios.get('api/v1/tickets');
            const ticketdata = response.data.data;

            
            if(this.activeTab == 'All'){
                this.alltickets = ticketdata.filter((a) => (this.vendorID ? a['vendor']['0']['id'] == this.vendorID : true));
            }else if(this.activeTab == 'My Agency'){
                this.alltickets = ticketdata.filter((a) => (a.agencies.includes(this.userAgencyCode) && (this.vendorID ? a['vendor']['0']['id'] == this.vendorID : true)));
            }else if(this.activeTab == 'Following'){
                this.alltickets = ticketdata.filter((a) => (a.isFollow == 1 && (this.vendorID ? a['vendor']['0']['id'] == this.vendorID : true)));
            }
        },
        //Get Agencies
        async getAgencies(){
            this.pageNumber = 0;
            const response = await axios.get('api/v1/agencies');
            //Filter Agencies Ticket
            this.agencies = response.data.data.filter((a) => (a.agency.includes(this.filterSearchAgency) ||  a.agency.toLowerCase().includes(this.filterSearchAgency)));
        },
        //Get Product Services
        async getProducts(){
            this.pageNumber = 0;
            const response = await axios.get('api/v1/ticket/product_service');
            //Filter Products
            this.products = response.data.data;
        },
        //Follow Ticket
        async followTicket(ticketID, page) {
            await axios.post('/api/v1/ticket/update_follow', {
                ticket_id: ticketID,
                isFollow: 1
            })
            .then((res) => {
                this.closeModal();
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Following Ticket #' + this.modalTicketID;
                this.successIcon = 'favorite-active.png';
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
            //Refresh Data
            this.getTickets(this.activeStatus, page);
            this.orderedTickets();
        },
        //Unfollow Ticket
        async unfollowTicket(ticketID, page) {
            await axios.post('/api/v1/ticket/update_follow', {
                ticket_id: ticketID,
                isFollow: 0
            })
            .then((res) => {
                this.closeModal();
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Unfollowing Ticket #' + this.modalTicketID;
                this.successIcon = 'unfollow.png';
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
            //Refresh Data
            this.getTickets(this.activeStatus, page);
            this.orderedTickets();
        },
        async updateTicketStatus(ticketID, page){
            await axios.post('/api/v1/ticket/update_status', {
                ticket_id: ticketID,
                status: this.currentTicketStatus,
                comment: this.statusComment
            })
            .then((res) => {
                this.closeModal();
                //Reset Data
                this.statusComment = null;
                this.currentTicketStatus = null;
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Ticket #' + this.modalTicketID + ' is updated';
                this.successIcon = 'like.png';
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
            //Refresh Data
            this.getTickets(this.activeStatus, page);
            this.orderedTickets();
        },
        //Alert
        async closeAlert() {
            this.successAlert = false
        },
        //Display Sorted Tickets
        orderedTickets() {
            if(this.ticketsOrder == 'vendor_name' || this.ticketsOrder == 'first_name' || this.ticketsOrder == 'created_at'){
                if(this.ticketsASC){
                    return this.tickets.sort((a, b) => (a[this.ticketsOrderArray]['0'][this.ticketsOrder] > b[this.ticketsOrderArray]['0'][this.ticketsOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }else{
                    return this.tickets.sort((a, b) => (a[this.ticketsOrderArray]['0'][this.ticketsOrder] < b[this.ticketsOrderArray]['0'][this.ticketsOrder] ? -1 : 1) ).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }
            }
            else if(this.ticketsOrder == 'assigned_agencies'){
                if(this.ticketsASC){
                    return this.tickets.sort((a, b) => (a[this.ticketsOrder] > b[this.ticketsOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }else{
                    return this.tickets.sort((a, b) => (a[this.ticketsOrder] < b[this.ticketsOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }
            }
            else{
                //normal sorting
                if(this.ticketsASC){
                    return this.tickets.sort((a, b) => (a[this.ticketsOrder] > b[this.ticketsOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
                }else{
                    return this.tickets.sort((a, b) => (a[this.ticketsOrder] < b[this.ticketsOrder] ? -1 : 1)).slice(this.pageNumber*this.perpage,this.pageNumber*this.perpage+this.perpage)
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
            this.paginateTotal = Math.ceil(this.tickets.length/this.perpage);
        },
        //Roles Search
        fuseSearch(options, search) {
            const fuse = new Fuse(options, {
                keys: ['name', 'product_service'],
                shouldSort: true,
            })
            return search.length ? fuse.search(search).map(({ item }) => item): fuse.list
        }
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