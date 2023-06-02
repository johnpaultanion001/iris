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
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none" class="mr-4">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.292893 0.792893C0.683417 0.402369 1.31658 0.402369 1.70711 0.792893L6 5.08579L10.2929 0.792893C10.6834 0.402369 11.3166 0.402369 11.7071 0.792893C12.0976 1.18342 12.0976 1.81658 11.7071 2.20711L7.41421 6.5L11.7071 10.7929C12.0976 11.1834 12.0976 11.8166 11.7071 12.2071C11.3166 12.5976 10.6834 12.5976 10.2929 12.2071L6 7.91421L1.70711 12.2071C1.31658 12.5976 0.683417 12.5976 0.292893 12.2071C-0.0976311 11.8166 -0.0976311 11.1834 0.292893 10.7929L4.58579 6.5L0.292893 2.20711C-0.0976311 1.81658 -0.0976311 1.18342 0.292893 0.792893Z" :fill="vendorID ? '#1267E5' : '#ffffff'"/>
                </svg>
                3 Filters
            </button>
            <button @click="openModal('filterModal')" :class="vendorID ?  'border-blue text-blue' : 'border-white text-white'" class="border mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 rounded-lg flex items-center justify-center">
                Filter
            </button>
            <button :class="vendorID ?  'border-blue text-blue' : 'border-white text-white'" class="border mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 rounded-lg flex items-center justify-center">
                Export 
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none" class="ml-4">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 15C-2.41411e-08 14.4477 0.447715 14 1 14H13C13.5523 14 14 14.4477 14 15C14 15.5523 13.5523 16 13 16H1C0.447715 16 2.41411e-08 15.5523 0 15ZM3.29289 7.29289C3.68342 6.90237 4.31658 6.90237 4.70711 7.29289L6 8.58579L6 1C6 0.447716 6.44771 2.41411e-08 7 0C7.55228 -2.41411e-08 8 0.447715 8 1L8 8.58579L9.29289 7.29289C9.68342 6.90237 10.3166 6.90237 10.7071 7.29289C11.0976 7.68342 11.0976 8.31658 10.7071 8.70711L7.70711 11.7071C7.51957 11.8946 7.26522 12 7 12C6.73478 12 6.48043 11.8946 6.29289 11.7071L3.29289 8.70711C2.90237 8.31658 2.90237 7.68342 3.29289 7.29289Z" :fill="vendorID ? '#1267E5' : '#ffffff'"/>
                </svg>
            </button>
            <router-link to="/create-ticket" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue hover:bg-blue text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none" class="mr-2">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 0.75C5.91421 0.75 6.25 1.08579 6.25 1.5V5.25H10C10.4142 5.25 10.75 5.58579 10.75 6C10.75 6.41421 10.4142 6.75 10 6.75H6.25V10.5C6.25 10.9142 5.91421 11.25 5.5 11.25C5.08579 11.25 4.75 10.9142 4.75 10.5V6.75H1C0.585786 6.75 0.25 6.41421 0.25 6C0.25 5.58579 0.585786 5.25 1 5.25L4.75 5.25V1.5C4.75 1.08579 5.08579 0.75 5.5 0.75Z" fill="white"/>
                </svg> Create
            </router-link>
        </div>
    </div>
    <div class="scroll-style w-full overflow-auto flex items-center justify-start pb-3">
        <div :class="activeStatus == 'FOR_REVIEW' ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
            <ButtonCard @click="getTickets('FOR_REVIEW', 0)" link="" arrow="false" cardTitle="For Review" :value="alltickets.filter((a) => (a.status == 'FOR_REVIEW')).length" :active="activeStatus == 'FOR_REVIEW' ? 'true' : 'false'">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.80002 8.7999C8.80002 7.47442 9.87454 6.3999 11.2 6.3999C12.5255 6.3999 13.6 7.47442 13.6 8.7999C13.6 10.1254 12.5255 11.1999 11.2 11.1999C10.537 11.1999 9.9386 10.9326 9.50297 10.497C9.06734 10.0613 8.80002 9.46298 8.80002 8.7999Z" fill="#1267E6"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 19.5999C15.302 19.5999 19.6 15.3018 19.6 9.9999C19.6 4.69797 15.302 0.399902 10 0.399902C4.69809 0.399902 0.400024 4.69797 0.400024 9.9999C0.400024 15.3018 4.69809 19.5999 10 19.5999ZM11.2 3.9999C8.54906 3.9999 6.40002 6.14894 6.40002 8.7999C6.40002 9.68956 6.64278 10.5236 7.06478 11.2381L4.3515 13.9514C3.88287 14.42 3.88287 15.1798 4.3515 15.6484C4.82013 16.1171 5.57992 16.1171 6.04855 15.6484L8.76184 12.9351C9.47637 13.3572 10.3104 13.5999 11.2 13.5999C13.851 13.5999 16 11.4509 16 8.7999C16 6.14894 13.851 3.9999 11.2 3.9999Z" fill="#1267E6"/>
                </svg> 
            </ButtonCard>
        </div>
        <div :class="activeStatus == 'ACKNOWLEDGED' ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
            <ButtonCard @click="getTickets('ACKNOWLEDGED', 0)" link="" arrow="false" cardTitle="Acknowledged" :value="alltickets.filter((a) => (a.status == 'ACKNOWLEDGED')).length" :active="activeStatus == 'ACKNOWLEDGED' ? 'true' : 'false'">
                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.90835 1.71849C8.82588 0.0873266 11.1744 0.0873257 12.0919 1.71849L18.7883 13.6231C19.6882 15.223 18.5321 17.1998 16.6965 17.1998H3.30376C1.46818 17.1998 0.312066 15.223 1.21198 13.6231L7.90835 1.71849ZM11.2 13.5999C11.2 14.2626 10.6628 14.7999 10 14.7999C9.33728 14.7999 8.80002 14.2626 8.80002 13.5999C8.80002 12.9372 9.33728 12.3999 10 12.3999C10.6628 12.3999 11.2 12.9372 11.2 13.5999ZM10 3.9999C9.33728 3.9999 8.80002 4.53716 8.80002 5.1999V8.7999C8.80002 9.46264 9.33728 9.9999 10 9.9999C10.6628 9.9999 11.2 9.46264 11.2 8.7999V5.1999C11.2 4.53716 10.6628 3.9999 10 3.9999Z" fill="#1267E6"/>
                </svg>
            </ButtonCard>
        </div>
        <div :class="activeStatus == 'ON_GOING' ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
            <ButtonCard @click="getTickets('ON_GOING', 0)" link="" arrow="false" cardTitle="On-going" :value="alltickets.filter((a) => (a.status == 'ON_GOING')).length" :active="activeStatus == 'ON_GOING' ? 'true' : 'false'">
                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.599976 4.2001C0.599976 2.21187 2.21175 0.600098 4.19997 0.600098H16.2C16.6545 0.600098 17.07 0.856901 17.2733 1.26344C17.4765 1.66998 17.4327 2.15648 17.16 2.5201L14.1 6.6001L17.16 10.6801C17.4327 11.0437 17.4765 11.5302 17.2733 11.9368C17.07 12.3433 16.6545 12.6001 16.2 12.6001H4.19997C3.53723 12.6001 2.99997 13.1374 2.99997 13.8001V17.4001C2.99997 18.0628 2.46271 18.6001 1.79997 18.6001C1.13723 18.6001 0.599976 18.0628 0.599976 17.4001V4.2001Z" fill="#1267E6"/>
                </svg>
            </ButtonCard>
        </div>
        <div :class="activeStatus == 'RESOLVED' ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
            <ButtonCard @click="getTickets('RESOLVED', 0)" link="" arrow="false" cardTitle="Resolved" :value="alltickets.filter((a) => (a.status == 'RESOLVED')).length" :active="activeStatus == 'RESOLVED' ? 'true' : 'false'">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99997 0.399902C10.6627 0.399902 11.2 0.937161 11.2 1.5999V3.18746L15.9453 5.0856L17.8633 4.12659C18.4561 3.8302 19.1769 4.07047 19.4733 4.66325C19.7697 5.25602 19.5294 5.97683 18.9366 6.27322L17.4568 7.01311L19.5426 13.5167C19.6873 13.9677 19.5531 14.4615 19.2003 14.7774C18.3518 15.5367 17.2286 15.9999 16 15.9999C14.7714 15.9999 13.6481 15.5367 12.7997 14.7774C12.4468 14.4615 12.3127 13.9677 12.4573 13.5167L14.5157 7.09862L11.2 5.77234V17.1999H13.6C14.2627 17.1999 14.8 17.7372 14.8 18.3999C14.8 19.0626 14.2627 19.5999 13.6 19.5999H6.39997C5.73723 19.5999 5.19997 19.0626 5.19997 18.3999C5.19997 17.7372 5.73723 17.1999 6.39997 17.1999H8.79997V5.77234L5.48427 7.09862L7.54264 13.5167C7.68727 13.9677 7.55315 14.4615 7.20027 14.7774C6.35186 15.5367 5.22857 15.9999 3.99998 15.9999C2.77138 15.9999 1.6481 15.5367 0.799685 14.7774C0.446804 14.4615 0.312682 13.9677 0.45731 13.5167L2.54311 7.01311L1.06332 6.27322C0.470551 5.97683 0.230283 5.25602 0.526669 4.66325C0.823056 4.07047 1.54386 3.8302 2.13664 4.12659L4.05464 5.0856L8.79997 3.18746V1.5999C8.79997 0.937161 9.33723 0.399902 9.99997 0.399902ZM3.99998 10.3293L3.01809 13.3908C3.31759 13.5253 3.64961 13.5999 3.99998 13.5999C4.35034 13.5999 4.68236 13.5253 4.98186 13.3908L3.99998 10.3293ZM16 10.3293L15.0181 13.3908C15.3176 13.5253 15.6496 13.5999 16 13.5999C16.3503 13.5999 16.6823 13.5253 16.9818 13.3908L16 10.3293Z" fill="#1267E6"/>
                </svg>
            </ButtonCard>
        </div>
        <div :class="activeStatus == 'INVALID' ? 'opacity-100' : 'opacity-40'" class="mr-3 min-w-160 w-1/5">
            <ButtonCard @click="getTickets('INVALID', 0)" link="" arrow="false" cardTitle="Invalid" :value="alltickets.filter((a) => (a.status == 'INVALID')).length" :active="activeStatus == 'INVALID' ? 'true' : 'false'">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.6 9.9999C19.6 15.3018 15.3019 19.5999 9.99999 19.5999C4.69806 19.5999 0.399994 15.3018 0.399994 9.9999C0.399994 4.69797 4.69806 0.399902 9.99999 0.399902C15.3019 0.399902 19.6 4.69797 19.6 9.9999ZM14.1719 15.8687C12.9949 16.7069 11.555 17.1999 9.99999 17.1999C6.02354 17.1999 2.79999 13.9764 2.79999 9.9999C2.79999 8.44487 3.29297 7.00497 4.13116 5.82798L14.1719 15.8687ZM15.869 14.1717L5.82824 4.13094C7.00521 3.29283 8.44504 2.7999 9.99999 2.7999C13.9764 2.7999 17.2 6.02345 17.2 9.9999C17.2 11.5549 16.7071 12.9947 15.869 14.1717Z" fill="#1267E6"/>
                </svg>
            </ButtonCard>
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
                                </th>
                                <th class="p-2.5">
                                </th>
                                <th class="p-2.5">
                                    <button @click="ticketsOrder = 'ticket_no'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Ticket No.<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                </th>
                                <th class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'first_name'; ticketsOrderArray = 'reported_by'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Reported By<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                </th>
                                <th class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'product_service'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Product/Service<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                </th>
                                <th v-if="colVendor != 'off'" class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'vendor_name'; ticketsOrderArray = 'vendor'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Vendor Name<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                </th>
                                <th class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'complaint'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Complaint<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                </th>
                                <th class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'assigned_agencies'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Assigned Agency<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                </th>
                                <th v-if="colSeverity != 'off'" class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'severity'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Severity<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                </th>
                                <th class="p-2.5 text-center">
                                    <button @click="ticketsOrder = 'created_at'; ticketsOrderArray = 'reported_by'; ticketsASC = !ticketsASC; orderedTickets();" class="filter-btn">Date Submitted<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                </th>
                                <th class="p-2.5 text-center">
                                    <div style="width: 18px;"></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody v-for="(ticket, index) in orderedTickets()" ref="tickets">
                            <tr class="border-b border-light relative">
                                <td class="w-12 min-w-44">
                                    <router-link :to="'/ticket-information/'+ticket.ticket_no">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="15" viewBox="0 0 21 15" fill="none" class="m-auto block">
                                        <path d="M10.5 9.5C11.6046 9.5 12.5 8.60457 12.5 7.5C12.5 6.39543 11.6046 5.5 10.5 5.5C9.39544 5.5 8.50001 6.39543 8.50001 7.5C8.50001 8.60457 9.39544 9.5 10.5 9.5Z" fill="#1267E5"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.957764 7.50004C2.23202 3.44291 6.02232 0.5 10.5 0.5C14.9776 0.5 18.7679 3.44288 20.0422 7.49996C18.7679 11.5571 14.9776 14.5 10.4999 14.5C6.02232 14.5 2.23204 11.5571 0.957764 7.50004ZM14.5 7.5C14.5 9.70914 12.7091 11.5 10.5 11.5C8.29087 11.5 6.50001 9.70914 6.50001 7.5C6.50001 5.29086 8.29087 3.5 10.5 3.5C12.7091 3.5 14.5 5.29086 14.5 7.5Z" fill="#1267E5"/>
                                        </svg>
                                    </router-link>
                                </td>
                                <td class="w-12 min-w-44">
                                    <svg v-if="ticket.isFollow == true" @click.prevent="modalTicketID = ticket.ticket_no; openModal('unfollow')" class="cursor-pointer m-auto block" xmlns="http://www.w3.org/2000/svg" width="11" height="17" viewBox="0 0 11 17" fill="none">
                                        <path d="M0.5 2.5C0.5 1.39543 1.39543 0.5 2.5 0.5H8.5C9.60457 0.5 10.5 1.39543 10.5 2.5V16.5L5.5 14L0.5 16.5V2.5Z" fill="#1267E5"/>
                                    </svg>
                                    <svg v-if="ticket.isFollow == false" @click.prevent="modalTicketID = ticket.ticket_no; openModal('follow')" class="cursor-pointer m-auto block" xmlns="http://www.w3.org/2000/svg" width="11" height="17" viewBox="0 0 11 17" fill="none">
                                        <path d="M5.27639 13.5528L1 15.691V2.5C1 1.67157 1.67157 1 2.5 1H8.5C9.32843 1 10 1.67157 10 2.5V15.691L5.72361 13.5528L5.5 13.441L5.27639 13.5528Z" stroke="#1267E5"/>
                                    </svg>
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
                                <td class="p-2.5 font-opensans-400 text-xxxs text-dark2">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination-cont flex items-center justify-between px-4">
                    <p class="text-xxs text-lighttext m-0">Showing {{ (perpage * (pageNumber)) + 1 }} to {{ tickets.length > (perpage * (pageNumber + 1)) ? (perpage * (pageNumber + 1)) : tickets.length }} of {{ tickets.length }} entries</p>
                    <div v-if="tickets.length > perpage" class="flex items-center justify-end">
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
                <div v-click-out-side="closeAction" style="top: 103px;" class="action-btn absolute right-0 bg-white shadow-secondary">
                    <!-- <div class="py-5 border-b border-b-light px-6 flex items-center">
                    </div> -->
                    <div v-for="(ticket, index) in orderedTickets()" ref="tickets">
                        <div @click="openAction(ticket.ticket_no)" class="cursor-pointer relative h-15 border-b border-b-light px-6 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="5" height="17" viewBox="0 0 5 17" fill="none">
                                <path d="M2.5 4.5C1.39543 4.5 0.5 3.60457 0.5 2.5C0.5 1.39543 1.39543 0.5 2.5 0.5C3.60457 0.5 4.5 1.39543 4.5 2.5C4.5 3.60457 3.60457 4.5 2.5 4.5Z" fill="#525F7F"/>
                                <path d="M2.5 10.5C1.39543 10.5 0.5 9.60457 0.5 8.5C0.5 7.39543 1.39543 6.5 2.5 6.5C3.60457 6.5 4.5 7.39543 4.5 8.5C4.5 9.60457 3.60457 10.5 2.5 10.5Z" fill="#525F7F"/>
                                <path d="M2.5 16.5C1.39543 16.5 0.5 15.6046 0.5 14.5C0.5 13.3954 1.39543 12.5 2.5 12.5C3.60457 12.5 4.5 13.3954 4.5 14.5C4.5 15.6046 3.60457 16.5 2.5 16.5Z" fill="#525F7F"/>
                            </svg>
                            <div v-if="actionActive && showAction == ticket.ticket_no" class="action-card shadow-secondary absolute rounded-lg bg-white">
                                <router-link :to="'ticket/'+ticket.ticket_no">
                                    <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" fill="none" class="mx-auto">
                                            <path d="M10 9.5C11.1046 9.5 12 8.60457 12 7.5C12 6.39543 11.1046 5.5 10 5.5C8.89544 5.5 8.00001 6.39543 8.00001 7.5C8.00001 8.60457 8.89544 9.5 10 9.5Z" fill="#525F7F"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.457764 7.50004C1.73202 3.44291 5.52232 0.5 9.99997 0.5C14.4776 0.5 18.2679 3.44288 19.5422 7.49996C18.2679 11.5571 14.4776 14.5 9.99995 14.5C5.52232 14.5 1.73204 11.5571 0.457764 7.50004ZM14 7.5C14 9.70914 12.2091 11.5 10 11.5C7.79087 11.5 6.00001 9.70914 6.00001 7.5C6.00001 5.29086 7.79087 3.5 10 3.5C12.2091 3.5 14 5.29086 14 7.5Z" fill="#525F7F"/>
                                            </svg>
                                        </span><span>View</span>
                                    </div>
                                </router-link>
                                <div @click.prevent="modalTicketID = ticket.ticket_no; ticket.isFollow ? openModal('unfollow') : openModal('follow')" class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                    <span class="w-5 mr-3 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="17" viewBox="0 0 10 17" fill="none" class="mx-auto">
                                        <path d="M0 2.5C0 1.39543 0.895431 0.5 2 0.5H8C9.10457 0.5 10 1.39543 10 2.5V16.5L5 14L0 16.5V2.5Z" fill="#525F7F"/>
                                        </svg>
                                    </span><span>{{ ticket.isFollow ? 'Unfollow' : 'Follow' }}</span>
                                </div>
                                <div @click.prevent="modalTicketID = ticket.ticket_no; openModal('ticketStatusModal')" class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                    <span class="w-5 mr-3 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="17" viewBox="0 0 14 17" fill="none" class="mx-auto">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 0.5C1.55228 0.5 2 0.947715 2 1.5V3.60125C3.27009 2.30489 5.04052 1.5 7 1.5C10.0494 1.5 12.641 3.44932 13.6014 6.16675C13.7855 6.68747 13.5126 7.25879 12.9918 7.44284C12.4711 7.62689 11.8998 7.35396 11.7157 6.83325C11.0289 4.88991 9.17547 3.5 7 3.5C5.36507 3.5 3.91204 4.28502 2.99935 5.5H6C6.55228 5.5 7 5.94772 7 6.5C7 7.05228 6.55228 7.5 6 7.5H1C0.447715 7.5 0 7.05228 0 6.5V1.5C0 0.947715 0.447715 0.5 1 0.5ZM1.00817 9.55716C1.52888 9.37311 2.1002 9.64604 2.28425 10.1668C2.97112 12.1101 4.82453 13.5 7 13.5C8.63493 13.5 10.088 12.715 11.0006 11.5L8 11.5C7.44772 11.5 7 11.0523 7 10.5C7 9.94771 7.44772 9.5 8 9.5H13C13.2652 9.5 13.5196 9.60536 13.7071 9.79289C13.8946 9.98043 14 10.2348 14 10.5V15.5C14 16.0523 13.5523 16.5 13 16.5C12.4477 16.5 12 16.0523 12 15.5V13.3987C10.7299 14.6951 8.95948 15.5 7 15.5C3.95059 15.5 1.35905 13.5507 0.398572 10.8332C0.214525 10.3125 0.487449 9.74121 1.00817 9.55716Z" fill="#525F7F"/>
                                        </svg>
                                    </span><span>Update Ticket Status</span>
                                </div>
                                <router-link v-if="activeStatus != 'RESOLVED' && activeStatus != 'INVALID'" :to="'/edit-ticket/'+ticket.ticket_no">
                                    <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none" class="mx-auto">
                                            <path d="M10.5858 1.08579C11.3668 0.304738 12.6332 0.304738 13.4142 1.08579C14.1953 1.86683 14.1953 3.13316 13.4142 3.91421L12.6213 4.70711L9.79289 1.87868L10.5858 1.08579Z" fill="#525F7F"/>
                                            <path d="M8.37868 3.29289L0 11.6716V14.5H2.82842L11.2071 6.12132L8.37868 3.29289Z" fill="#525F7F"/>
                                            </svg>
                                        </span><span>Edit Ticket</span>
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
            <img src="/img/icon/follow-modal.svg" class="mb-6">
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
            <img src="/img/icon/unfollow-modal.svg" class="mb-6">
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
            <form onsubmit="return false"  class="block">
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
                            <img src="/img/icon/date-blue.svg" class="date-img">
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="relative w-full">
                            <label for="to" class="text-base text-blue-grey text-xs font-inter-700">To</label>
                            <input type="text" v-model="fTo" placeholder="Month DD, YYYY" name="to" id="to" class="mt-2 w-full secondary-input"/>
                            <img src="/img/icon/date-blue.svg" class="date-img">
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
    <Modal modalTitle="Ticket Status" v-show="modalActive && showModal == 'ticketStatusModal'" @close="closeModal">
        <template v-slot:body>
            <form onsubmit="return false"  class="block">
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
                this.successIcon = 'favorite-active.svg';
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
                this.successIcon = 'unfollow.svg';
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
                this.successIcon = 'like.svg';
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