<template>
    <AlertTop :alertIcon="'/img/icon/'+successIcon" :active="successAlert" :content="successMessage" v-if="successAlert" @close="closeAlert" />
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-11 md:col-span-6">
                <h1>{{ title }}</h1>
            </div>
            <div v-if="showFilterBtn" class="col-span-1 flex items-center justify-end">
                <button @click="showFilter = !showFilter" class="w-fit bg-transparent rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="5" height="17" viewBox="0 0 5 17" fill="none"><path d="M2.5 4.5C1.39543 4.5 0.5 3.60457 0.5 2.5C0.5 1.39543 1.39543 0.5 2.5 0.5C3.60457 0.5 4.5 1.39543 4.5 2.5C4.5 3.60457 3.60457 4.5 2.5 4.5Z" fill="#ffffff"></path><path d="M2.5 10.5C1.39543 10.5 0.5 9.60457 0.5 8.5C0.5 7.39543 1.39543 6.5 2.5 6.5C3.60457 6.5 4.5 7.39543 4.5 8.5C4.5 9.60457 3.60457 10.5 2.5 10.5Z" fill="#ffffff"></path><path d="M2.5 16.5C1.39543 16.5 0.5 15.6046 0.5 14.5C0.5 13.3954 1.39543 12.5 2.5 12.5C3.60457 12.5 4.5 13.3954 4.5 14.5C4.5 15.6046 3.60457 16.5 2.5 16.5Z" fill="#ffffff"></path></svg>
                </button>
            </div>
            <div v-if="showFilter" class="bg-white-25 sm:bg-transparent p-2.5 sm:p-0 rounded-lg col-span-12 xl:col-span-6 flex items-center justify-end flex-col md:flex-row flex-wrap">
                <button @click="openModal('filterModal')" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-center">
                    Filter
                </button>
                <button class="mt-1 md:mt-0 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-center">
                    Export
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none" class="ml-4">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 15C-2.41411e-08 14.4477 0.447715 14 1 14H13C13.5523 14 14 14.4477 14 15C14 15.5523 13.5523 16 13 16H1C0.447715 16 2.41411e-08 15.5523 0 15ZM3.29289 7.29289C3.68342 6.90237 4.31658 6.90237 4.70711 7.29289L6 8.58579L6 1C6 0.447716 6.44771 2.41411e-08 7 0C7.55228 -2.41411e-08 8 0.447715 8 1L8 8.58579L9.29289 7.29289C9.68342 6.90237 10.3166 6.90237 10.7071 7.29289C11.0976 7.68342 11.0976 8.31658 10.7071 8.70711L7.70711 11.7071C7.51957 11.8946 7.26522 12 7 12C6.73478 12 6.48043 11.8946 6.29289 11.7071L3.29289 8.70711C2.90237 8.31658 2.90237 7.68342 3.29289 7.29289Z" :fill="vendorID ? '#1267E5' : '#ffffff'"/>
                    </svg>
                </button>
                <router-link to="/create-user" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none" class="mr-2">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 0.75C5.91421 0.75 6.25 1.08579 6.25 1.5V5.25H10C10.4142 5.25 10.75 5.58579 10.75 6C10.75 6.41421 10.4142 6.75 10 6.75H6.25V10.5C6.25 10.9142 5.91421 11.25 5.5 11.25C5.08579 11.25 4.75 10.9142 4.75 10.5V6.75H1C0.585786 6.75 0.25 6.41421 0.25 6C0.25 5.58579 0.585786 5.25 1 5.25L4.75 5.25V1.5C4.75 1.08579 5.08579 0.75 5.5 0.75Z" fill="white"/>
                    </svg> Create
                </router-link>
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
                                        <button @click="userOrder = 'name'; activityASC = !activityASC; orderedUsers();" class="filter-btn">Name<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="userOrder = 'role'; activityASC = !activityASC; orderedUsers();" class="filter-btn">User Type<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="userOrder = 'email'; activityASC = !activityASC; orderedUsers();" class="filter-btn">Email<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="userOrder = 'agency'; userOrderArray = 'assigned_agency';  activityASC = !activityASC; orderedUsers();" class="filter-btn">Agency<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="userOrder = 'status'; activityASC = !activityASC; orderedUsers();" class="filter-btn">Status<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="userOrder = 'updated_at'; activityASC = !activityASC; orderedUsers();" class="filter-btn">Date Updated<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                    <th class="p-2.5 text-center">
                                        <button @click="userOrder = 'created_at'; activityASC = !activityASC; orderedUsers();" class="filter-btn">Date Created<img src="/img/icon/filter.svg" class="ml-1.5"></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-light relative" v-for="(user, index) in orderedUsers()" ref="users" style="height: 57px;">
                                    <td class="w-12 min-w-44">
                                        <router-link :to="'/profile/'+user.id">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="15" viewBox="0 0 21 15" fill="none" class="m-auto block">
                                            <path d="M10.5 9.5C11.6046 9.5 12.5 8.60457 12.5 7.5C12.5 6.39543 11.6046 5.5 10.5 5.5C9.39544 5.5 8.50001 6.39543 8.50001 7.5C8.50001 8.60457 9.39544 9.5 10.5 9.5Z" fill="#1267E5"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.957764 7.50004C2.23202 3.44291 6.02232 0.5 10.5 0.5C14.9776 0.5 18.7679 3.44288 20.0422 7.49996C18.7679 11.5571 14.9776 14.5 10.4999 14.5C6.02232 14.5 2.23204 11.5571 0.957764 7.50004ZM14.5 7.5C14.5 9.70914 12.7091 11.5 10.5 11.5C8.29087 11.5 6.50001 9.70914 6.50001 7.5C6.50001 5.29086 8.29087 3.5 10.5 3.5C12.7091 3.5 14.5 5.29086 14.5 7.5Z" fill="#1267E5"/>
                                            </svg>
                                        </router-link>
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
                    <div class="pagination-cont flex items-center justify-between px-4">
                        <p class="text-xxs text-lighttext m-0">Showing {{ (perpage * (pageNumber)) + 1 }} to {{ users.length > (perpage * (pageNumber + 1)) ? (perpage * (pageNumber + 1)) : users.length }} of {{ users.length }} entries</p>
                        <div v-if="users.length > perpage" class="flex items-center justify-end">
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
                        <div v-for="(user, index) in orderedUsers()" ref="users">
                            <div @click="openAction(user.id)" class="cursor-pointer relative h-15 border-b border-b-light px-6 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="5" height="17" viewBox="0 0 5 17" fill="none">
                                    <path d="M2.5 4.5C1.39543 4.5 0.5 3.60457 0.5 2.5C0.5 1.39543 1.39543 0.5 2.5 0.5C3.60457 0.5 4.5 1.39543 4.5 2.5C4.5 3.60457 3.60457 4.5 2.5 4.5Z" fill="#525F7F"/>
                                    <path d="M2.5 10.5C1.39543 10.5 0.5 9.60457 0.5 8.5C0.5 7.39543 1.39543 6.5 2.5 6.5C3.60457 6.5 4.5 7.39543 4.5 8.5C4.5 9.60457 3.60457 10.5 2.5 10.5Z" fill="#525F7F"/>
                                    <path d="M2.5 16.5C1.39543 16.5 0.5 15.6046 0.5 14.5C0.5 13.3954 1.39543 12.5 2.5 12.5C3.60457 12.5 4.5 13.3954 4.5 14.5C4.5 15.6046 3.60457 16.5 2.5 16.5Z" fill="#525F7F"/>
                                </svg>
                                <div v-if="actionActive && showAction == user.id" class="action-card shadow-secondary absolute rounded-lg bg-white">
                                    <router-link :to="'profile/'+user.id">
                                        <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                            <span class="w-5 mr-3 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" fill="none" class="mx-auto">
                                                <path d="M10 9.5C11.1046 9.5 12 8.60457 12 7.5C12 6.39543 11.1046 5.5 10 5.5C8.89544 5.5 8.00001 6.39543 8.00001 7.5C8.00001 8.60457 8.89544 9.5 10 9.5Z" fill="#525F7F"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.457764 7.50004C1.73202 3.44291 5.52232 0.5 9.99997 0.5C14.4776 0.5 18.2679 3.44288 19.5422 7.49996C18.2679 11.5571 14.4776 14.5 9.99995 14.5C5.52232 14.5 1.73204 11.5571 0.457764 7.50004ZM14 7.5C14 9.70914 12.2091 11.5 10 11.5C7.79087 11.5 6.00001 9.70914 6.00001 7.5C6.00001 5.29086 7.79087 3.5 10 3.5C12.2091 3.5 14 5.29086 14 7.5Z" fill="#525F7F"/>
                                                </svg>
                                            </span><span>View</span>
                                        </div>
                                    </router-link>
                                    <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center">
                                        <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.00300002 2.384L8 6.382L15.997 2.384C15.9674 1.87444 15.7441 1.39549 15.3728 1.04523C15.0016 0.694965 14.5104 0.499906 14 0.5H2C1.48958 0.499906 0.998447 0.694965 0.627178 1.04523C0.255908 1.39549 0.0326041 1.87444 0.00300002 2.384Z" fill="#525F7F"/>
                                        <path d="M16 4.618L8 8.618L0 4.618V10.5C0 11.0304 0.210714 11.5391 0.585786 11.9142C0.960859 12.2893 1.46957 12.5 2 12.5H14C14.5304 12.5 15.0391 12.2893 15.4142 11.9142C15.7893 11.5391 16 11.0304 16 10.5V4.618Z" fill="#525F7F"/>
                                        </svg>
                                        </span><span>Resend Invite</span>
                                    </div>
                                    <router-link :to="'/edit-user/'+user.id">
                                        <div class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                            <span class="w-5 mr-3 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="17" viewBox="0 0 14 17" fill="none" class="mx-auto">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 0.5C1.55228 0.5 2 0.947715 2 1.5V3.60125C3.27009 2.30489 5.04052 1.5 7 1.5C10.0494 1.5 12.641 3.44932 13.6014 6.16675C13.7855 6.68747 13.5126 7.25879 12.9918 7.44284C12.4711 7.62689 11.8998 7.35396 11.7157 6.83325C11.0289 4.88991 9.17547 3.5 7 3.5C5.36507 3.5 3.91204 4.28502 2.99935 5.5H6C6.55228 5.5 7 5.94772 7 6.5C7 7.05228 6.55228 7.5 6 7.5H1C0.447715 7.5 0 7.05228 0 6.5V1.5C0 0.947715 0.447715 0.5 1 0.5ZM1.00817 9.55716C1.52888 9.37311 2.1002 9.64604 2.28425 10.1668C2.97112 12.1101 4.82453 13.5 7 13.5C8.63493 13.5 10.088 12.715 11.0006 11.5L8 11.5C7.44772 11.5 7 11.0523 7 10.5C7 9.94771 7.44772 9.5 8 9.5H13C13.2652 9.5 13.5196 9.60536 13.7071 9.79289C13.8946 9.98043 14 10.2348 14 10.5V15.5C14 16.0523 13.5523 16.5 13 16.5C12.4477 16.5 12 16.0523 12 15.5V13.3987C10.7299 14.6951 8.95948 15.5 7 15.5C3.95059 15.5 1.35905 13.5507 0.398572 10.8332C0.214525 10.3125 0.487449 9.74121 1.00817 9.55716Z" fill="#525F7F"/>
                                            </svg>
                                            </span><span>Edit Profile</span>
                                        </div>
                                    </router-link>
                                    <div v-if="user.status == 'ACTIVE'" @click="openModal('deactivate'); modalUserID = user.id; modalUserName = user.name" class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16 8.5C16 12.9183 12.4183 16.5 8 16.5C3.58172 16.5 0 12.9183 0 8.5C0 4.08172 3.58172 0.5 8 0.5C12.4183 0.5 16 4.08172 16 8.5ZM11.4766 13.3907C10.4958 14.0892 9.29586 14.5 8 14.5C4.68629 14.5 2 11.8137 2 8.5C2 7.20414 2.41081 6.00423 3.1093 5.02339L11.4766 13.3907ZM12.8908 11.9765L4.52354 3.6092C5.50434 2.91077 6.7042 2.5 8 2.5C11.3137 2.5 14 5.18629 14 8.5C14 9.7958 13.5892 10.9957 12.8908 11.9765Z" fill="#525F7F"/>
                                            </svg>
                                        </span><span>Deactivate</span>
                                    </div>
                                    <div v-if="user.status == 'INACTIVE'" @click="openModal('activate'); modalUserID = user.id; modalUserName = user.name" class="cursor-pointer whitespace-nowrap py-3 px-4 flex items-center font-inter-400 text-black text-sm hover:bg-lighter">
                                        <span class="w-5 mr-3 text-center">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16 8.5C16 12.9183 12.4183 16.5 8 16.5C3.58172 16.5 0 12.9183 0 8.5C0 4.08172 3.58172 0.5 8 0.5C12.4183 0.5 16 4.08172 16 8.5ZM11.4766 13.3907C10.4958 14.0892 9.29586 14.5 8 14.5C4.68629 14.5 2 11.8137 2 8.5C2 7.20414 2.41081 6.00423 3.1093 5.02339L11.4766 13.3907ZM12.8908 11.9765L4.52354 3.6092C5.50434 2.91077 6.7042 2.5 8 2.5C11.3137 2.5 14 5.18629 14 8.5C14 9.7958 13.5892 10.9957 12.8908 11.9765Z" fill="#525F7F"/>
                                            </svg>
                                        </span><span>Activate</span>
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
            <form onsubmit="return false"  class="block">
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
                            <img src="/img/icon/date-blue.svg" class="date-img">
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="relative w-full">
                            <label for="to" class="text-base text-blue-grey text-xs font-inter-700">To</label>
                            <input type="date" v-model="fTo" placeholder="Month DD, YYYY" name="to" id="to" class="mt-2 w-full secondary-input"/>
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

    <Modal v-show="modalActive && showModal == 'deactivate'" @close="closeModal">
        <template v-slot:body>
            <img src="/img/icon/invite-modal.svg" class="mb-6">
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
            <img src="/img/icon/invite-modal.svg" class="mb-6">
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
                agencies: this.fAgencyValue.length ? this.fAgencyValue : null
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
          //Get Tickets
            this.getUsers(0);
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
                this.successIcon = 'like.svg';
                this.getUsers(0);
                this.closeModal();
            })
            .catch((error) => {
                this.successAlert = true;
                this.successMessage = 'Error occured. Please try again';
                this.successIcon = 'warning-red.svg';
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
                this.successIcon = 'like.svg';
                this.getUsers(0);
                this.closeModal();
            })
            .catch((error) => {
                this.successAlert = true;
                this.successMessage = 'Error occured. Please try again';
                this.successIcon = 'warning-red.svg';
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
